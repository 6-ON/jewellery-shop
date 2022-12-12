<?php

use app\core\Form\Form;

?>
<h1>Login</h1>

<?php $form = Form::begin('', 'post') ?>

<?php echo $form->field($model, 'email')->emailField()?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<button type="submit" class="btn btn-primary">Login</button>
<?php Form::end() ?>
