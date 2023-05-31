<?php

namespace App\Services;

use App\Repositories\Interface\IProductRepository;
use Log;

class ProductService
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function all()
    {
        return $this->productRepo->all();
    }

    function categoryWiseProduct($category_id)
    {
        if ($category_id === null)
            throw new \Exception("Category id is null");
        return $this->productRepo->categoryWiseProduct($category_id);
    }
}
