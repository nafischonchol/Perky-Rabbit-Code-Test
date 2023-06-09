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

    function allDesc()
    {
        return $this->modelName::with("category")->orderBy("created_at","desc")->get();
    }

    function categoryWiseProduct($category_id)
    {
        return Product::where('category_id', $category_id)->get();
    }



}
