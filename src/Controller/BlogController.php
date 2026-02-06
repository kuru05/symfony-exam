<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    public function list(): Response
    {
        return $this->render('blog/list.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    public function show(int $id): Response
    {
        return $this->render('blog/show.html.twig', [
            'id' => $id,
        ]);
    }
}
