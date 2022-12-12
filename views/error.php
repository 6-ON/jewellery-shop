<?php
    /**
     * @var Exception $exception
     * */
?>

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block fw-semibold"><?php echo $exception->getCode() ?></span>
                <div class="mb-4 lead"><?php echo $exception->getMessage() ?></div>
                <a href="/" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</div>