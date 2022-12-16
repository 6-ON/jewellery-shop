<?php
namespace app\widgets;

use app\core\Model;

class Widget {
    public static function productBox(Model $model)
    {
        return new ProductBox($model);
    }

}


?>