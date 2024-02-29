<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BeaController extends AbstractController
{
    #[Route('/bea', name: 'app_bea')]
    public function index(): Response
    {
        return $this->render('bea/index.html.twig', [
            'controller_name' => 'BeaController',
        ]);
    }
}
