<?php
    namespace App\Controller;

    use App\Entity\Articles;
    use App\Repository\ArticlesRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class ConseilController extends AbstractController {

        /**
         * @var ArticlesRepository
         */
        private $repository;

        public function __construct(ArticlesRepository $repository){
            $this->repository = $repository;
        }


        /**
         * @Route("/conseils", name="conseils")
         * @return Response
         */
        public function index(): Response {
            $articles = $this->repository->findAll();

            return $this->render('pages/conseil.html.twig', [
                "articles" => $articles
            ]);
        }

        /**
         * @Route("/conseils/{slug}-{id}", name="conseils.show", requirements={"slug": "[a-z0-9\-]*"})
         * @return Response
         */
        public function show($slug, $id): Response {
            $articles = $this->repository->find($id);
            return $this->render('pages/show.html.twig', [
                "articles" => $articles
            ]);
        }
    }