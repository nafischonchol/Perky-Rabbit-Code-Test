<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return Inertia::render('Stock', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $data = DB::table('stocks')
            ->selectRaw('SUM(sign * qty) as quantity')
            ->where('product_id', $product_id)
            ->groupBy('product_id')
            ->first();
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
