<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends AbstractController
{
    public function profile(string $name): Response
    {
        // $name = "Alice Martin";
        $age = 25;
        $city = "Marseille";
        return $this->render('user/index.html.twig', [
            'name' => $name,
            'age' => $age,
            'city' => $city,
        ]);
    }
}
