<?php

namespace App\Http\Controllers;

use App\Http\Services\DummyJSONService;
use Exception;

class ProductController extends Controller
{
    /**
     * Получает IPhones и сохраняет их в базу данных
     *
     * @throws Exception
     */
    public function createIPhones() : void
    {
        $dummyJSONService = new DummyJSONService();
        $smartphones = $dummyJSONService->makeGetRequest('products/category/smartphones');

        if (!isset($smartphones['products'])) {
            throw new Exception("Key 'products' was not provided");
        }

        $iPhones = [];

        foreach ($smartphones['products'] as $smartphone) {
            if ($smartphone['brand'] === 'Apple') {
                $iPhones[] = $smartphone;
            }
        }

        if (empty($iPhones)) {
            throw new Exception("Array 'iPhones' is empty");
        }

        $dummyJSONService->createProducts($iPhones);
    }

    /**
     * Добавляет на сервер IPhone и возвращает его
     *
     * @return array
     * @throws Exception
     */
    public function addIPhone() : array
    {
        $iPhone = [
            'title' => 'IPhone 8',
            'description' => '8th model',
            'category' => 'smartphones',
            'price' => 600,
            'discountPercentage' => 10,
            'rating' => 4.9,
            'stock' => 55,
            'tags' => ["smartphones","apple"],
            'brand' => 'Apple',
            'sku' => 'SA1L34SM',
            'weight' => 5,
            'dimensions' => ["width" => 8.49, "height" => 25.34, "depth" => 18.12],
            'warrantyInformation' => '3 week warranty',
            'shippingInformation' => 'Ships overnight',
            'availabilityStatus' => 'In Stock',
            'reviews' => [["rating" => 3, "comment" => "Bad", "date" => "2024-05-23T08:56:21.625Z", "reviewerName" => "Alice", "reviewerEmail" => "alice@gmail.com"]],
            'returnPolicy' => '60 days return policy',
            'minimumOrderQuantity' => 3,
            'meta' => ['createdAt' => '2024-05-23T08:56:21.625Z', 'updatedAt' => '2024-05-23T08:56:21.625Z', 'barcode' => '2517230562429', 'qrCode' => 'https://assets.dummyjson.com/public/qr-code.png'],
            'images' => ["https://cdn.dummyjson.com/products/images/smartphones/Vivo%20V9/1.png","https://cdn.dummyjson.com/products/images/smartphones/Vivo%20V9/2.png","https://cdn.dummyjson.com/products/images/smartphones/Vivo%20V9/3.png"],
            'thumbnail' => 'https://cdn.dummyjson.com/products/images/smartphones/iPhone%206/thumbnail.png',
        ];

        $dummyJSONService = new DummyJSONService();

        return $dummyJSONService->makePostRequest('products/add', $iPhone);
    }
}
