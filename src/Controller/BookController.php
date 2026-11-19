<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\BookService;

final class BookController extends AbstractController
{

    function __construct(private BookService $bookService) {}


    #[Route('/books', name: 'app_books')]
    public function index(): Response
    {
        $books = $this->bookService->getAllBooks();
        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }

    #[Route('/books/{id}', name: 'app_book_show')]
    public function show(int $id): Response
    {
        $book = $this->bookService->getBookById($id);
        // dd($book);
        return $this->render('book/show.html.twig', [
            'book'=> $book
        ]);
    }

    #[Route('/books/search/{title}', name: 'app_book_search')]
    public function showBookByTitle(string $title): Response
    {
        $books = $this->bookService->getBookByTitle($title);
        // dd($books);
        return $this->render('book/index.html.twig', [
            'books'=> $books
        ]);
    }
}
