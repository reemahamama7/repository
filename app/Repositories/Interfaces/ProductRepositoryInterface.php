<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface {
    public function getAll();

    public function store( array $data );
}