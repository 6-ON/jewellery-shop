<?php

use app\core\Form\Form;
/** @var $model \app\models\User
**/
?>
<h1>Create an Account</h1>

<?php $form = Form::begin('', 'post') ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'lastName') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'firstName') ?>
    </div>
</div>
<?php echo $form->field($model, 'email')->emailField()?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
<button type="submit" class="btn btn-primary">Register</button>
<?php Form::end() ?>
