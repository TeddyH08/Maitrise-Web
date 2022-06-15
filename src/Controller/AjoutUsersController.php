<?php

    namespace App\Controller;

    use App\Entity\Users;
    use App\Entity\Roles;
    use App\Form\InscriptionType;
    use Doctrine\ORM\EntityManagerInterface;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
    use Symfony\Component\Form\FormTypeInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
    use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
    

    class AjoutUsersController extends AbstractController {

        /**
         * @Route("/ajout_users", name="ajout_users")
         * @return Response
         */
        public function index(
            Request $request,
            EntityManagerInterface $manager,
            UserPasswordHasherInterface $passwordHasher
            ): Response
        {
            $users = new Users();
            $form = $this->createForm(InscriptionType::class, $users);

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $plaintextPassword = $users->getPassword();
                $hashedPassword = $passwordHasher->hashPassword(
                    $users,
                    $plaintextPassword
                );
                $users->setPassword($hashedPassword);

                if ($users->getRolesUsers()->getNameRoles() == 'Client') {
                    $users->setRoles(['ROLE_USER']);
                }
                if ($users->getRolesUsers()->getNameRoles() == 'Admin') {
                    $users->setRoles(['ROLE_ADMIN']);
                }

                $manager->persist($users);
                $manager->flush();
    
                $this->addFlash(
                    'success',
                    'L\'utilisateur a bien été inscrit.'
                );

                return $this->redirectToRoute('admin');
            }

            return $this->render('pages/admin/ajoutusers.html.twig', [
                "form" => $form->createView()
            ]);
        }
    }