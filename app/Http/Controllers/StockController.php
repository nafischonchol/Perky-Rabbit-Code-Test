<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\StockService;

class StockController extends Controller
{
    protected $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function index()
    {

    }

    public function create()
    {
        $categories = $this->stockService->getCategories();

        return Inertia::render('Stock', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return \json_encode($request->input());
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }

    function getCurrentStock($product_id)
    {
        try {
            $data = $this->stockService->productWiseStock($product_id);
            if($data)
                $response = ['result' => 'Success', 'mgs' => 'Current Stock of Products', 'data' => $data];
            else
                $response = ['result' => 'Stock Not Found', 'mgs' => 'Current Stock of Products', 'data' => $data];
        } catch (\Exception $e) {
            $response = ['result' => 'Error', 'mgs' => $e->getMessage(), 'data' => null];
        }

        return \json_encode($response);
    }
}
