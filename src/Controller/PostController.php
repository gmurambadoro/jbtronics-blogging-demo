<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use App\Settings\PaginationSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/post', name: 'app_post_', methods: ['GET'])]
final class PostController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(
        PostRepository $postRepository,
        PaginatorInterface $paginator,
        Request $request,
        SettingsManagerInterface $settingsManager): Response
    {
        /** @var PaginationSettings $paginationSettings */
        $paginationSettings = $settingsManager->get(PaginationSettings::class);

        return $this->render('post/index.html.twig', [
            'posts' => $paginator->paginate(
                target: $postRepository->getPostsQuery(),
                page: $request->query->getInt('page', 1),
                limit: $paginationSettings->postsPerPage, // these settings are being read from the file system
            ),
        ]);
    }

    #[Route('/view/{id}', name: 'view', methods: ['GET'])]
    public function view(Post $post): Response
    {
        return $this->render('post/view.html.twig', [
            'post' => $post,
        ]);
    }
}
