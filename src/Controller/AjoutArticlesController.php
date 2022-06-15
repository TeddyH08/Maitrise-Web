<?php

    namespace App\Controller;

    use App\Entity\Articles;
    use App\Form\ArticlesType;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Form\FormTypeInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    

    class AjoutArticlesController extends AbstractController {

        /**
         * @Route("/ajout_articles", name="ajout_articles")
         * @return Response
         */
        public function index(
            Request $request,
            EntityManagerInterface $manager
            ): Response
        {
            $articles = new Articles();
            $form = $this->createForm(ArticlesType::class, $articles);

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                

                $manager->persist($articles);
                $manager->flush();
    
                $this->addFlash(
                    'success',
                    'L\'article a bien été créé.'
                );

                return $this->redirectToRoute('admin');
            }

            return $this->render('pages/admin/ajoutarticle.html.twig', [
                "form" => $form->createView()
            ]);
        }
    }