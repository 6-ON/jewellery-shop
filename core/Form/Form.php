<?php
namespace app\core\Form;

use app\core\Model;
class Form
{
    public static function begin(string $action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attr)
    {
        return new Field($model, $attr);
    }


}