<?php
    namespace App\Controller;

    use App\Entity\Projets;
    use App\Repository\ProjetsRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class RealisationController extends AbstractController {

        /**
         * @var ProjetsRepository
         */
        private $repository;

        public function __construct(ProjetsRepository $repository){
            $this->repository = $repository;
        }

        
        /**
         * @Route("/realisations", name="realisations")
         * @return Response
         */
        public function index(): Response {
            $projets = $this->repository->findAll();

            return $this->render('pages/realisation.html.twig', [
                "projets" => $projets
            ]);
        }
    }