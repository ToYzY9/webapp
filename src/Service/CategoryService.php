<?php
namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
class CategoryService {
    function __construct(private CategoryRepository $catRepo) {}

    function getAllCategories(): array {
        return $this->catRepo->findAll() ?? [];
    }
    function getCategoryById(int $id): ?Category {
        return $this->catRepo->find($id);
    }
}
