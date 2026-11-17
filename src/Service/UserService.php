<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService {
    function __construct(private UserRepository $userRepo) {}

    function getAllUsers(): array {
        return $this->userRepo->findAll() ?? [];
    }
    function getUserById(int $id): ?User {
        return $this->userRepo->find($id);
    }
}
