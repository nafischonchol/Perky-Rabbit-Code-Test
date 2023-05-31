<?php
namespace App\Repositories;
use App\Repositories\Interface\IProductRepository;
use App\Models\Product;

class ProductRepository extends Repository implements IProductRepository
{
    private $modelName;
    public function __construct()
    {
        $this->modelName = 'App\Models\Product';
        parent::__construct($this->modelName);
    }

}
