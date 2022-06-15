<?php

    namespace App\Controller;

    use App\Entity\Projets;
    use App\Form\ProjetsType;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Form\FormTypeInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
    use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
    

    class AjoutProjetController extends AbstractController {

        /**
         * @Route("/ajout_projets", name="ajout_projets")
         * @return Response
         */
        public function index(
            Request $request,
            EntityManagerInterface $manager
            ): Response
        {
            $projets = new Projets();
            $form = $this->createForm(ProjetsType::class, $projets);

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                

                $manager->persist($projets);
                $manager->flush();
    
                $this->addFlash(
                    'success',
                    'Le projet a bien été créé.'
                );

                return $this->redirectToRoute('admin');
            }

            return $this->render('pages/admin/ajoutprojets.html.twig', [
                "form" => $form->createView()
            ]);
        }
    }