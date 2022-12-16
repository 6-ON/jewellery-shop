<?php
namespace app\widgets;

use app\core\Model;

class ProductBox
{

    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function __toString()
    {
        return sprintf('<div class="box">
                        <div class="name">
                            <h6>%s</h6>
                        </div>
                        <div class="img-box">
                            <img src="uploads/%s" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>$<span>%d</span></h5>
                            <a href="">Buy Now</a>
                        </div>
                    </div>', $this->model->label, $this->model->image, $this->model->price);
    }
}