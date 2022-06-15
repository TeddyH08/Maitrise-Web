<?php
    namespace App\Controller;

    use App\Entity\Users;
    use App\Repository\UsersRepository;
    use App\Repository\ProjetsRepository;
    use App\Repository\ArticlesRepository;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class AdminController extends AbstractController {

        /**
         * @var UsersRepository
         * @var ProjetsRepository
         * @var ArticlesRepository
         */
        private $repository_users;
        private $repository_projets;
        private $repository_articles;

        public function __construct(UsersRepository $repository_users, ProjetsRepository $repository_projets, ArticlesRepository $repository_articles){
            $this->repository_users = $repository_users;
            $this->repository_projets = $repository_projets;
            $this->repository_articles = $repository_articles;
        }

        

        /**
         * @Route("/admin", name="admin")
         * @return Response
         */
        #[IsGranted('ROLE_ADMIN')]
        public function index(): Response {
            $utilisateurs = $this->repository_users->findAll();
            $projets = $this->repository_projets->findAll();
            $articles = $this->repository_articles->findAll();

            return $this->render('pages/admin.html.twig', [
                "utilisateurs" => $utilisateurs,
                "projets" => $projets,
                "articles" => $articles
            ]);
        }
    }