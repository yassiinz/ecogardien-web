<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'Homeecogardien')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('composant',name:"composant")]
    public function test(): Response{
        return new Response(
           $this->renderView("home/component/nav_bar_composant.twig").
            $this->renderView('home/component/contenu.twig')
        );
    }
}
