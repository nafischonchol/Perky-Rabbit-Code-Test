<?php
namespace App\Repositories;
use App\Repositories\Interface\IStockRepository;
use App\Models\Stock;

class StockRepository extends Repository implements IStockRepository
{
    private $modelName;
    public function __construct()
    {
        $this->modelName = 'App\Models\Stock';
        parent::__construct($this->modelName);
    }

}
