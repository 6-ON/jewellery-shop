<?php
?>
<h1>Contact us</h1>

<form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="John">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" id="subject" placeholder="a subject">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
