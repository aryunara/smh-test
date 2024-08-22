<?php

namespace App\Http\Services;

use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

const QUERY_URL = 'https://dummyjson.com/';

class DummyJSONService
{
    /**
     * Выполняет POST-запрос по API
     *
     * @param string $method
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function makePostRequest(string $method, array $data) : array
    {
        $response = Http::post(QUERY_URL . $method, $data);

        if (!$response) {
            throw new Exception("Error while executing request");
        }

        return json_decode($response, true);
    }

    /**
     * Выполняет GET-запрос по API
     *
     * @param string $method
     * @return array
     * @throws Exception
     */
    public function makeGetRequest(string $method) : array
    {
        $response = Http::get(QUERY_URL . $method);

        if (!$response) {
            throw new Exception("Error while executing request");
        }

        return json_decode($response, true);
    }

    /**
     * Выполняет сохранение продуктов в базу данных
     *
     * @param array $products
     * @throws Exception
     */
    function createProducts(array $products): void
    {
        if (empty($products)) {
            throw new Exception("Array 'products' was not provided");
        }

        try {
            DB::transaction(function () use ($products) {

                foreach ($products as $product) {
                    $newProduct = Product::create(
                        [
                            'title' => $product['title'],
                            'description' => $product['description'],
                            'category' => $product['category'],
                            'price' => $product['price'],
                            'discountPercentage' => $product['discountPercentage'],
                            'rating' => $product['rating'],
                            'stock' => $product['stock'],
                            'tags' => json_encode($product['tags']),
                            'brand' => $product['brand'],
                            'sku' => $product['sku'],
                            'weight' => $product['weight'],
                            'dimensions' => json_encode($product['dimensions']),
                            'warrantyInformation' => $product['warrantyInformation'],
                            'shippingInformation' => $product['shippingInformation'],
                            'availabilityStatus' => $product['availabilityStatus'],
                            'returnPolicy' => $product['returnPolicy'],
                            'minimumOrderQuantity' => $product['minimumOrderQuantity'],
                            'createdAt' => $product['meta']['createdAt'],
                            'updatedAt' => $product['meta']['updatedAt'],
                            'barcode' => $product['meta']['barcode'],
                            'qrCode' => $product['meta']['qrCode'],
                            'thumbnail' => $product['thumbnail']
                        ]
                    );

                    $productId = $newProduct['id'];

                    if (isset($product['images'])) {
                        foreach ($product['images'] as $image) {
                            Image::create([
                                'product_id' => $productId,
                                'path' => $image,
                            ]);
                        }
                    }

                    if (isset($product['reviews'])) {
                        foreach ($product['reviews'] as $review) {
                            Review::create([
                                'product_id' => $productId,
                                'rating' => $review['rating'],
                                'comment' => $review['comment'],
                                'date' => $review['date'],
                                'reviewer_name' => $review['reviewerName'],
                                'reviewer_email' => $review['reviewerEmail']
                            ]);
                        }
                    }
                }
            });
        } catch(Exception $exception) {
            Log::error('Transaction failed: ' . $exception->getMessage());

            throw new Exception('Failed to save products to the database.');
        }
    }
}

