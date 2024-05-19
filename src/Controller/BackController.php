<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    #[Route('/back', name: 'backEcogardien')]
    public function indexb(): Response
    {
        return $this->render('base1.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }
}
