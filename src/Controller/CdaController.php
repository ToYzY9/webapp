<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
final class CdaController
{
    // Routes Mise en place depuis routes.yaml
    public function index(): Response
    {
        return new Response("Test");
    }
    
    #[Route('/cda_annotation/{name}', name: 'app_cda_cda_annotation')]
    public function cdaAnnotation(string $name): Response
    {
        return new Response("Bonjour ". $name ."!");
    }
}
