<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class RealisationController extends AbstractController {

        /**
         * @Route("/realisation", name="realisation")
         * @return Response
         */
        public function index(): Response {
            return $this->render('pages/realisation.html.twig');
        }
    }