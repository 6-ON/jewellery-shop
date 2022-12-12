<?php use app\core\Form\Form; ?>

<div class="container form-container py-4 mb-5">
    <div class="heading_container d-flex justify-content-center">
        <h2 class="mb-5">
            Get in Touch
        </h2>
    </div>
    <div class="container">
        <?php $form = Form::begin('','post'); ?>
            <div class="row">
                <div class="col-sm mb-4 ">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" required>
                </div>
                <div class="col-sm mb-4">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" required>
                </div>

            </div>
            <div class="row">
                <div class="col-sm mb-4">
                    <input type="email" class="form-control" placeholder="email" aria-label="email" required>
                </div>
                <div class="col-sm mb-4">
                    <input type="tel" class="form-control" placeholder="phone" aria-label="phone" required>
                </div>

            </div>
            <div class="row">
                <div class="col-sm mb-4">
                    <textarea class="form-control" name="" id="" rows="3" placeholder="Message" required></textarea>
                </div>
            </div>
            <div class="w-100 d-flex justify-content-center ">
                <button type="submit">Submit</button>
            </div>
        <?php Form::end() ?>
    </div>
</div>

<!-- ring section -->

<section class="ring_section layout_padding">
    <div class="container">
        <div class="ring_container layout_padding2">
            <div class="row">
                <div class="col-md-5">
                    <div class="detail-box">
                        <h4>
                            special
                        </h4>
                        <h2>
                            Wedding Ring
                        </h2>
                        <a href="">
                            Buy Now
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="img-box">
                        <img src="images/ring-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end ring section -->