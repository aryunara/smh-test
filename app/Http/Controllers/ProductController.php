<?php

namespace App\Http\Controllers;

use App\Http\Services\DummyJSONService;
use App\Http\Services\ProductService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Получает iPhones и сохраняет их в базу данных
     *
     * @throws Exception
     */
    public function createIPhones() : void
    {
        $dummyJSONService = new DummyJSONService();
        $iPhones = $dummyJSONService->getSmartphones('Apple');

        $productService = new ProductService();
        $productService->create($iPhones);
    }

    /**
     * Добавляет на сервер продукт (iPhone) и возвращает его
     *
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function addProduct(Request $request) : array
    {
        $data = $request->all();

        $dummyJSONService = new DummyJSONService();

        return $dummyJSONService->addProducts($data);
    }
}
