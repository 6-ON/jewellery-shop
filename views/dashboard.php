<?php

use app\core\Application;
use app\widgets\Table\Table; ?>

<?php $msg = Application::$app->session->getFlash('created');
if($msg): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> <?php echo $msg ?>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>
<?php $msg = Application::$app->session->getFlash('deleted');
if($msg): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> <?php echo $msg ?>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>
<?php $msg = Application::$app->session->getFlash('edited');
if($msg): ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> <?php echo $msg ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<div class="heading_container d-flex justify-content-center">
    <h2 class="mb-5">
        Dashboard
    </h2>
</div>

<div class="container-fluid p-md-4" style="overflow-x: scroll;">
    <a type="button" class="btn text-bg-success mb-2" href="/createProduct">add</a>

    <?php $table = Table::begin($columns); ?>

    <?php foreach ($products as $product) {
        echo $table->row($product);
    } ?>

    <?php Table::end() ?>
</div>