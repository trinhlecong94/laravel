<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{

    private $productRepository;

    /**
     * UserController constructor.
     * 
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function find($id)
    {
        return $this->productRepository->findById($id);
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function pagination()
    {
        return Product::with('categories')->paginate(9);
    }


}
