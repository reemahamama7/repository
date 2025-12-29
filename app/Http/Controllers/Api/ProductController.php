<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller {
    public function __construct(
        protected ProductService $productService
    ) {
    }
    /**
    * Display a listing of the resource.
    */

    public function index() {
        return ProductResource::collection(
            $this->productService->getAll()
        );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( StoreProductRequest $request ) {
        return new ProductResource(
            $this->productService->create( $request->validated() )
        );
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}