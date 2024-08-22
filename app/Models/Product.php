<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'price',
        'discountPercentage',
        'rating',
        'stock',
        'tags',
        'brand',
        'sku',
        'weight',
        'dimensions',
        'warrantyInformation',
        'shippingInformation',
        'availabilityStatus',
        'returnPolicy',
        'minimumOrderQuantity',
        'createdAt',
        'updatedAt',
        'barcode',
        'qrCode',
        'thumbnail'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

