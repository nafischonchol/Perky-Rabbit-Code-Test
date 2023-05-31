<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockCreateRequest;
use Inertia\Inertia;
use App\Services\StockService;
use Log;

class StockController extends Controller
{
    protected $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function index()
    {
        $history = $this->stockService->history();
        return Inertia::render("StockHistory",compact('history'));
    }

    public function create()
    {
        $categories = $this->stockService->getCategories();

        return Inertia::render('Stock', compact('categories'));
    }

    public function store(StockCreateRequest $request)
    {
        try {
            $validatedData = $request->json()->all();
            $data = $this->stockService->store($validatedData);
            $response = ['result' => 'Success', 'mgs' => 'Store stock successfully!', 'data' => $data];

        } catch (\Exception $e) {
            $response = ['result' => 'Error', 'mgs' => $e->getMessage(), 'data' => null];
        }
        return \json_encode($response);
    }


    public function delete($stock_id)
    {
        try {
            $this->stockService->delete($stock_id);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete stock item.');
        }
        return redirect()->back()->with('success', 'Stock item deleted successfully.');
    }

    function getCurrentStock($product_id)
    {
        try {
            // Log::info($product_id);
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
