<?php

namespace App\Services;

use App\Repositories\Interface\IStockRepository;
use App\Repositories\Interface\ICategoryRepository;
use App\Repositories\Interface\IProductRepository;

class StockService
{
    protected $stockRepo;
    protected $catRepo;
    protected $productRepo;

    public function __construct(IStockRepository $stockRepo,ICategoryRepository $catRepo,
    IProductRepository $productRepo)
    {
        $this->stockRepo = $stockRepo;
        $this->catRepo = $catRepo;
        $this->productRepo = $productRepo;

    }

    function getCategories()
    {
        return $this->catRepo->all();
    }

    function productWiseStock($product_id)
    {
        if ($product_id === null)
            throw new \Exception("Product id is null");
        return $this->stockRepo->productWiseStock($product_id);
    }
}
