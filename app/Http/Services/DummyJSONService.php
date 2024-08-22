<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class DummyJSONService
{
    const QUERY_URL = 'https://dummyjson.com/';

    /**
     * Возвращает смартфоны по API с возможностью их фильтрации по бренду
     *
     * @param string|null $brand
     * @return array
     * @throws Exception
     */
    public function getSmartphones(string $brand = null) : array
    {
        $response = Http::get(self::QUERY_URL . 'products/category/smartphones');

        if (!$response) {
            throw new Exception("Error while executing request");
        }

        $smartphones = json_decode($response, true);

        if (!isset($smartphones['products'])) {
            throw new Exception("Key 'products' was not provided");
        }

        $smartphonesByBrand = [];

        foreach ($smartphones['products'] as $smartphone) {
            if ($smartphone['brand'] === $brand) {
                $smartphonesByBrand[] = $smartphone;
            }
        }

        if (empty($smartphonesByBrand)) {
            throw new Exception("Array 'smartphonesByBrand' is empty");
        }

        return $smartphonesByBrand;
    }

    /**
     * Добавляет продукты на сервер по API и возвращает их с новым id
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function addProducts(array $data) : array
    {
        $response = Http::post(self::QUERY_URL . 'products/add', $data);

        if (!$response) {
            throw new Exception("Error while executing request");
        }

        return json_decode($response, true);
    }
}

