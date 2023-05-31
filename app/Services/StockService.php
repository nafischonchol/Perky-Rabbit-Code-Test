<?php

namespace App\Services;

use App\Repositories\Interface\IStockRepository;
use App\Repositories\Interface\ICategoryRepository;

class StockService
{
    protected $stockRepo;
    protected $catRepo;


    public function __construct(IStockRepository $stockRepo,ICategoryRepository $catRepo)
    {
        $this->stockRepo = $stockRepo;
        $this->catRepo = $catRepo;
    }

    function getCategories()
    {
        return $this->catRepo->all();
    }
}
