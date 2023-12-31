<?php

namespace App\Services\Stock;

use App\Contracts\Service\AbstractService;
use App\Repositories\Stock\StockRepository;

class StockService extends AbstractService
{
    private StockRepository $stockRepository;

    /**
     * @param StockRepository $stockRepository
     */
    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
        $this->setRepository($stockRepository);
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function create(array $params)
    {
        try{
            $stock = $this->stockRepository
                ->updateOrCreate($params);
        }catch (\Exception $exception)
        {
            throw new \Exception('Error to create: ' . $exception->getMessage());
        }

        return $stock;
    }

}
