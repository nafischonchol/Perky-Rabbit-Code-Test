<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\ProductService;
use Log;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->all();
        return Inertia::render('Product',compact('products'));
    }

    public function create()
    {
        $categories = $this->productService->getCategories();
        return Inertia::render("ProductCreate",compact("categories"));
    }

    public function store(ProductCreateRequest $request)
    {
        try {
            $formData = $request->validated();
            $result = $this->productService->store($formData);
            session()->flash('success', 'Product created successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create product');
            Log::error( $e->getMessage());
            return Inertia::location('/admin/products/create');
        }
        return Inertia::location('/admin/products');
    }


    public function delete($stock_id)
    {
        try {
            $this->productService->delete($stock_id);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete item.');
        }
        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

    public function productByCategory($category_id)
    {
        try {
            $data = $this->productService->categoryWiseProduct($category_id);
            $response = ['result' => 'Success', 'mgs' => 'Product list', 'data' => $data];
        } catch (\Exception $e) {
            $response = ['result' => 'Error', 'mgs' => $e->getMessage(), 'data' => null];
        }

        return \json_encode($response);
    }
}
