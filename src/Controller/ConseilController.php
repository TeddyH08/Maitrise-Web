<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class ConseilController extends AbstractController {

        /**
         * @Route("/conseils", name="conseils")
         * @return Response
         */
        public function index(): Response {
            return $this->render('pages/conseil.html.twig');
        }
    }