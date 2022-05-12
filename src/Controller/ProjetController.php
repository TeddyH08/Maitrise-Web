<?php
    namespace App\Controller;

    use App\Entity\Projets;
    use App\Repository\ProjetsRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class ProjetController extends AbstractController {
        /**
         * @Route("/projet", name="projet")
         * @return Response
         */
        public function index(): Response {
            return $this->render('pages/projet.html.twig');
        }
    }