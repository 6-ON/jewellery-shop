<?php
namespace app\models;


class ProductUpdate extends Product {

    public function rules(): array
    {
        $rules =parent::rules();
        unset($rules['image']);
        return $rules;
    }
}