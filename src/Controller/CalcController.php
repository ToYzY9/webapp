<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CalcController extends AbstractController
{
    #[Route('/calc', name: 'app_calc')]
    public function calculatrice(): Response
    {
        return $this->render('calc/index.html.twig', [
            'controller_name' => 'CalcController',
        ]);
    }
}
