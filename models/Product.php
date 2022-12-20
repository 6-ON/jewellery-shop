<?php

namespace app\models;

use app\core\DbModel;

class Product extends DbModel
{

    public $label = '';
    public $price = '';
    public $quantity = '';
    public $image = '';

    public $categoryId = '';

    public static function primaryKey(): string
    {
        return 'id';
    }
    public static function tableName(): string
    {
        return 'product';
    }
    public static function ViewName(): string
    {
        return 'productsV';
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return ['label', 'price', 'quantity', 'image', 'categoryId'];
    }

    public function rules(): array
    {
        return [
            'label' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'quantity' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED],
            'categoryId' => [self::RULE_REQUIRED]

        ];
    }

    /**
     * @return array
     */
    public function labels(): array
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'label' => 'Label',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'category' => 'Category',
            'operations' => 'Oprations',
        ];
    }
}
