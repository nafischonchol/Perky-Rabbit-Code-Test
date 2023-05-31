<?php

namespace App\Services;

use App\Repositories\Interface\IStockRepository;
use App\Repositories\Interface\ICategoryRepository;
use App\Repositories\Interface\IProductRepository;
use Log;

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

    function history()
    {
        return $this->stockRepo->allDesc();
    }

    function getCategories()
    {
        return $this->catRepo->all();
    }

    function productWiseStock($product_id)
    {
        Log::info($product_id);
        if ($product_id === null)
            throw new \Exception("Product id is null");
        return $this->stockRepo->productWiseStock($product_id);
    }

    function store($formData)
    {
        $dataToInsert = [];
        foreach ($formData as $row)
        {
            if( $row['quantity'] == null)
                throw new \Exception("Quantity can't be null!");
            if($row['productId'] == null)
                throw new \Exception("Product id can't be null!");

            $dataToInsert[] = [
                'product_id' => $row['productId'],
                'qty' => $row['quantity'],
                'sign' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $this->stockRepo->multipleStore($dataToInsert);
    }

    function delete($stock_id)
    {
        return $this->stockRepo->delete($stock_id);
    }
}
