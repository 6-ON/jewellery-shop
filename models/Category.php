<?php

namespace app\models;

use app\core\DbModel;

class Category extends DbModel
{

    public string $label;
    public static function tableName(): string
    {
        return 'category';
    }
    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['label'];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'label' => [self::RULE_REQUIRED]
        ];
    }

    /**
     * @return array
     */
    public function labels(): array
    {
        return [];
    }
}
