<?php

namespace App\Controller;

use App\DTO\UserToUserDTOWrapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\UserService;

final class UserController extends AbstractController
{

    function __construct(private UserService $userService) {}

    // Route qui utilise juste l'entité user avec une méthode native du Repository
    #[Route('/users', name: 'app_users')]
    public function showAllUsers(): Response
    {
        $users = $this->userService->getAllUsers();
        return $this->render('user/showAllUsers.html.twig', [
            'users' => $users,
        ]);
    }
    // Route qui utilise un service DTO avec une méthode custom créer dans le Repository
    #[Route('/users-dto', name: 'app_users_dto')]
    public function showAllUsersV2(): Response
    {
        $users = $this->userService->getAllUsersWithDTO();
        return $this->render('user/showAllUsersDto.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/users/{id}', name: 'app_user', requirements: ['id' => '\d+'])]
    public function showUserById(int $id): Response
    {
        $user = $this->userService->getUserById($id);
        return $this->render('user/showUserId.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/users/dto/{id}', name: 'app_user_dto', requirements: ['id' => '\d+'])]
    public function showUserListDTOById(int $id): Response
    {
        $user = $this->userService->getUserById($id);
        if ($user) {
            UserToUserDTOWrapper::wrapUserToUserListDot($user);
        }
        return $this->render('user/showUserDtoId.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/users/dtoV2/{id}', name: 'app_user_dtoV2', requirements: ['id' => '\d+'])]
    public function showUserListDTOByIdV2(int $id): Response
    {
        $user = $this->userService->getUserById($id);
        return $this->render('user/showUserDtoId.html.twig', [
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
