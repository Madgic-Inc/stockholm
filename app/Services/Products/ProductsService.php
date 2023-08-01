<?php

namespace App\Services\Products;

use App\Helpers\ImageHelper;
use App\Repositories\Products\ProductsRepository;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ProductsService
{

    private ProductsRepository $repository;
    private ImageHelper $imageHelper;

    /**
     * @param ProductsRepository $productsRepository
     * @param ImageHelper $imageHelper
     */
    public function __construct(ProductsRepository $productsRepository, ImageHelper $imageHelper)
    {
        $this->repository = $productsRepository;
        $this->imageHelper = $imageHelper;
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $params)
    {
        try{
            DB::beginTransaction();
            $product = $this->repository->create($params);
            $path = 'product-'.$product->id;
            $image = $this->imageHelper::create($params['image'], $path);
            $product->update([
                'image' => $image
            ]);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw new Exception('Error to create product: '. $exception->getMessage());
        }

        return $product;
    }

}
