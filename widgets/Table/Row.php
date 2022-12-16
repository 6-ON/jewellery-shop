<?php
namespace app\widgets\Table;
use app\core\Model;
class Row {

    public Model $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function __toString()
    {
        return sprintf('
            <tr>
                <td>%u</td>
                <td><img width="64px" src="uploads/%s" alt="Image"></td>
                <td>%s</td>
                <td>%d</td>
                <td>%u</td>
                <td>%s</td>
                <td>
                <form method="post" action="/dashboard">
                <div class="btn-group">
                    <button name="edit" value="%u" type="submit" class="btn btn-warning me-2">edit</button>
                    <button name="delete" value="%u" type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
                </td>
            </tr>',$this->model->id,
            $this->model->image,
            $this->model->label,
            $this->model->price,
            $this->model->quantity,
            $this->model->category,
            $this->model->id,$this->model->id);
    }
}
