<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AeroboxeController extends AbstractController
{
    #[Route('/aeroboxe', name: 'app_aeroboxe')]
    public function index(): Response
    {
        return $this->render('aeroboxe/index.html.twig', [
            'controller_name' => 'AeroboxeController',
        ]);
    }
}
