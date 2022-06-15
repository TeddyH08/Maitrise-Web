<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class ConnexionController extends AbstractController {

        /**
         * @Route("/connexion", name="connexion.index")
         * @return Response
         */
        public function index(): Response {
            return $this->render('pages/connexion.html.twig', [
                'controller_name' => 'ConnexionController'
            ]);
        }

        /**
         * @Route("/deconnexion", name="connexion.logout")
         * @return Response
         */
        public function logout() {

        }
    }