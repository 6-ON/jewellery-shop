<?php

use app\core\Form\Form;
?>
<!-- CSS only -->

<div class="container form-container py-4 mb-5">
    <div class="heading_container d-flex justify-content-center">
        <h2 class="mb-5">
            Product
        </h2>
    </div>
    <div class="container">
        <?php $form = Form::begin('', 'post'); ?>
        <?php echo $form->field($product, 'label') ?>
        <?php echo $form->field($product, 'price')->numberField() ?>
        <?php echo $form->field($product, 'quantity')->numberField() ?>
        <?php echo $form->field($product, 'image')->fileField() ?>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <?php Form::end() ?>
    </div>
</div>