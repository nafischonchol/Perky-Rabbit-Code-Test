<?php

namespace App\Services;

use App\Repositories\Interface\IProductRepository;

class ProductService
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function categoryWiseProduct($category_id)
    {
        if ($category_id === null)
            throw new \Exception("Category id is null");
        return $this->productRepo->categoryWiseProduct($category_id);
    }
}
