<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use App\DTO\UserListDTO;

class UserService {
    function __construct(private UserRepository $userRepo) {}

    // Get all user version with Entity User and natif Method of repository
    function getAllUsers(): array {
        return $this->userRepo->findAll() ?? [];
    }

    // Get all user version with DTO and custom Method of repository
    function getAllUsersWithDTO(): array {
        return $this->userRepo->findAllUserListDTO() ?? [];
    }

    // Get user by id version with Entity User and natif Method of repository
    function getUserById(int $id): ?User {
        return $this->userRepo->find($id);
    }

    // Get user by id version with DTO and custom Method of repository
    function getUserListDTOById(int $id): ?UserListDTO {
        return $this->userRepo->findOneUserListDTOById($id);
    }


}
