<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormedeboxeController extends AbstractController
{
    #[Route('/formedeboxe', name: 'app_formedeboxe')]
    public function index(): Response
    {
        return $this->render('formedeboxe/index.html.twig', [
            'controller_name' => 'FormedeboxeController',
        ]);
    }
}
