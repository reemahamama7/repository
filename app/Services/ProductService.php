<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService
 {
    public function __construct(
        protected ProductRepositoryInterface $productRepo
    ) {
    }

    public function getAll()
 {
        return $this->productRepo->getAll();
    }

    public function create( array $data )
 {
        return $this->productRepo->store( $data );
    }
}