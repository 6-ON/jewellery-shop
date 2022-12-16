<?php

use app\widgets\Table\Table; ?>

<div class="heading_container d-flex justify-content-center">
    <h2 class="mb-5">
        Dashboard
    </h2>
</div>

<div class="container-fluid p-md-4" style="overflow-x: scroll;">

    <?php $table = Table::begin($columns); ?>

    <?php foreach ($products as $product) {
        echo $table->row($product);
    } ?>

    <?php Table::end() ?>
</div>