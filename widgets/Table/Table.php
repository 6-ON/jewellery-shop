<?php
namespace app\widgets\Table ;
use app\core\Model;

class Table {
    public static function begin(array $columns){
        echo '<table class="table table-warning table-hover table-striped">
        <thead><tr>';
        foreach ($columns as $column) {
            echo sprintf('<th scope="col">%s</th>',$column);
        }
        echo'</tr></thead><tbody>';
        return new Table();
    }
    public function row(Model $model)
    {
        return new Row($model);
    }
    public static function end(){

        echo '</tbody></table>';
    }


}

