<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        return Inertia::render('Product');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function productByCategory($category_id)
    {
        try
        {
            $data = Product::where('category_id',$category_id)->get();
            $response = array("result" => "Success", "mgs" => "Product list", "data" => $data);
        }
        catch(\Exception $e)
        {
            $response = array("result" => "Error", "mgs" => $e->getMessage(), "data" => Null);
        }
        return \json_encode($response);
    }
}
