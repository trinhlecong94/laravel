<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Comment;
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

    public function pagination()
    {
        return Product::with('categories')->paginate(9);
    }

    public function findById($id)
    {
        return Product::with('categories','images','comments','promotions','sizes','colors')->get()->find($id);
    }


}
