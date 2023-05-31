<?php
namespace App\Repositories;
use App\Repositories\Interface\IStockRepository;
use App\Models\Stock;
use DB;

class StockRepository extends Repository implements IStockRepository
{
    private $modelName;
    public function __construct()
    {
        $this->modelName = 'App\Models\Stock';
        parent::__construct($this->modelName);
    }
    function allDesc()
    {
        $stocks = DB::table('stocks')
        ->select('stocks.*', 'products.name as productName','products.price', 'categories.name as categoryName')
        ->leftJoin('products', 'stocks.product_id', '=', 'products.id')
        ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->get();
        return $stocks;
    }

    function productWiseStock($product_id)
    {
        $data = Stock::selectRaw('SUM(sign * qty) as quantity')
        ->where('product_id', $product_id)
        ->groupBy('product_id')
        ->first();
        return $data;
    }
}
