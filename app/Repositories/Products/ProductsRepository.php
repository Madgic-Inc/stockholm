<?php

namespace App\Repositories\Products;

use App\Contracts\Repository\AbstractRepository;
use App\Models\Products\Products;

class ProductsRepository extends AbstractRepository
{

    public function __construct()
    {
        return $this->setModel(Products::class);
    }

}
