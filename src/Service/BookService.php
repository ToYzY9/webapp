<?php
namespace App\Service;

use App\Entity\Book;
use App\Repository\BookRepository;
class BookService {
    function __construct(private BookRepository $bookRepo) {}

    function getAllBooks(): array {
        return $this->bookRepo->findAll() ?? [];
    }
    function getBookById(int $id): ?Book {
        return $this->bookRepo->find($id);
    }
}
