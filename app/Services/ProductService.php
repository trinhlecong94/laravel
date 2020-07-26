<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Comment;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function pagination()
    {
        return Product::with('category')->paginate(9);
    }

    public function findById($id)
    {
        return Product::with('category','images','comments','promotions','sizes','color')->get()->find($id);
    }

    public function findByCategory($id)
    {
        return Product::with('category')->where('category_id', $id)->paginate(9);
    }

}
