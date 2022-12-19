<?php

namespace app\core\Form;

use app\core\Model;

class Select
{

    public const SELECTED = 'selected';
    public Model $model;


    public $data;


    public string $attr;


    public function __construct(Model $model, string $attr,string $dataModel)
    {
        $this->model = $model;
        $this->attr = $attr;
        $data = $dataModel::getAll();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        exit;

    }

    function __toString()
    {
        return sprintf(
            '<select class="form-select col" name="%s">
        <option>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>',

        );
    }
}
