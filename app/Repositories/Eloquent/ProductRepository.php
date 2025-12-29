<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
 {
    public function getAll()
 {
        return Product::latest()->paginate( 10 );
    }

    public function store( array $data )
 {
        return Product::create( $data );
    }
}