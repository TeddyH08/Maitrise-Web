<?php
    namespace App\Controller;

    use App\Entity\Projets;
    use App\Entity\Users;
    use App\Repository\ProjetsRepository;
    use App\Repository\UsersRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class HomeController extends AbstractController {

        /**
         * @var ProjetsRepository
         * @var UsersRepository
         */
        private $repository_projet;
        private $repository_user;

        public function __construct(ProjetsRepository $repository_projet, UsersRepository $repository_user){
            $this->repository_projet = $repository_projet;
            $this->repository_user = $repository_user;
        }

        
        /**
         * @Route("/index", name="index")
         * @return Response
         */
        public function index(): Response {
            $projets = $this->repository_projet->findAll();
            $users = $this->repository_user->findAll();

            return $this->render('pages/home.html.twig', [
                "projets" => $projets,
                "users" => $users
            ]);
        }
    }