<?php

namespace App\Services;

use App\Repositories\Interface\IProductRepository;
use App\Repositories\Interface\ICategoryRepository;
use Log;

class ProductService
{
    protected $productRepo;
    protected $catRepo;

    public function __construct(IProductRepository $productRepo,ICategoryRepository $catRepo)
    {
        $this->productRepo = $productRepo;
        $this->catRepo = $catRepo;

    }

    function all()
    {
        return $this->productRepo->allDesc();
    }

    function productInfo($id)
    {
        return $this->productRepo->get($id);
    }
    function store($data)
    {
        return $this->productRepo->store($data);
    }

    function categoryWiseProduct($category_id)
    {
        if ($category_id === null)
            throw new \Exception("Category id is null");
        return $this->productRepo->categoryWiseProduct($category_id);
    }

    function getCategories()
    {
        return $this->catRepo->all();
    }

    function delete($stock_id)
    {
        return $this->productRepo->delete($stock_id);
    }
}
