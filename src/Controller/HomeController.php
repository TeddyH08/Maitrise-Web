<?php
    namespace App\Controller;

    use App\Entity\Projets;
    use App\Repository\ProjetsRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class HomeController extends AbstractController {

        /**
         * @var ProjetsRepository
         */
        private $repository;

        public function __construct(ProjetsRepository $repository){
            $this->repository = $repository;
        }

        
        /**
         * @Route("/index", name="index")
         * @return Response
         */
        public function index(): Response {
            $projets = $this->repository->findAll();

            return $this->render('pages/home.html.twig', [
                "projets" => $projets
            ]);
        }
    }