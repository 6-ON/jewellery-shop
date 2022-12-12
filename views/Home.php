<?php

use app\core\Application;

?>

<?php if (Application::$app->session->getFlash('success')){ ?>
    <div class="alert alert-success">
        <?php echo Application::$app->session->getFlash('success') ?>
    </div>
<?php } ?>

<h1>Home </h1>
<h3>Welcome <?php if (!empty($name)) {
        echo $name;
    } ?></h3>


