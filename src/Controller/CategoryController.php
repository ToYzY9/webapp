<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CategoryService;

final class CategoryController extends AbstractController
{
    function __construct(private CategoryService $catService) {}

    #[Route('/categories', name: 'app_categories')]
    public function showAllCategories(): Response
    {
        $categories = $this->catService->getAllCategories();
        // dd($categories);
        return $this->render('category/showAllCategories.html.twig', [
            'categories' => $categories,
        ]);
    }
    #[Route('/categories/{id}', name: 'app_category_show')]
    public function showCategorieById(int $id): Response
    {
        $category = $this->catService->getCategoryById($id);
        // dd($categorie);
        return $this->render('category/showCategorieId.html.twig', [
            'category' => $category,
        ]);
    }
}
