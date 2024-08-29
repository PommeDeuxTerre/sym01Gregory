<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicController extends AbstractController
{
    #[Route(
      path:'/',
      name: 'homepage'
    )]
    public function index(): Response
    {
        return $this->render('public/index.html.twig');
    }

    #[Route(
      path:'/page/{id}',
      name: 'page',
      defaults: ["id"=>1],
      requirements: ["id"=>"\d+"]
    )]
    public function page(int $id): Response
    {
        return $this->render('public/page.html.twig', [
            'nb_page' => $id,
        ]);
    }

    #[Route(
      path:'/page/haha',
      name: 'error',
    )]
    public function error(): Response
    {
        $response = $this->render('public/error.html.twig', [
        ]);
        $response->setStatusCode(418);
        return $response;
    }

    #[Route(
      path:'/contact',
      name: 'contact',
    )]
    public function contact(): Response
    {
        return $this->render('public/contact.html.twig', [
        ]);
    }
}
