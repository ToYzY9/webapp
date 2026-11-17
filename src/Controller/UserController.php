<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\UserService;

final class UserController extends AbstractController
{

    function __construct(private UserService $userService) {}

    #[Route('/users', name: 'app_users')]
    public function showAllUsers(): Response
    {
        $users = $this->userService->getAllUsers();
        // dd($users);
        return $this->render('user/showAllUsers.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/users/{id}', name: 'app_user', requirements: ['id' => '\d+'])]
    public function showUserById(int $id): Response
    {
        $user = $this->userService->getUserById($id);
        // dd($users);
        return $this->render('user/showUserId.html.twig', [
            'user' => $user,
        ]);
    }


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
