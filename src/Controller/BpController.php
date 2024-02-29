<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BpController extends AbstractController
{
    #[Route('/bp', name: 'app_bp')]
    public function index(): Response
    {
        return $this->render('bp/index.html.twig', [
            'controller_name' => 'BpController',
        ]);
    }
}
