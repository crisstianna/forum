<?php

namespace App\Controller;
use App\Entity\Threads;
use App\Repository\ThreadsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function index(ThreadsRepository $repo)
    {
        $threads = $repo->findAll();
        return $this->render('forum/index.html.twig', [
            'threads' => $threads,
        ]);
    }

    /**
     * @Route("/detail", name="detail")
     */
    public function detail(Threads $thread) {
        return $this->render('/forum/detail.html.twig', [
            'thread' => $thread
        ]);
    }
}

