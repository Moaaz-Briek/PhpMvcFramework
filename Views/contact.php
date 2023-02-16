<?php
/**
 * @var $this \app\Core\View
 */
$this->title = 'Contact';
?>

<h5>Contact Us</h5>
<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-10">
        <label class="col-sm-2 col-form-label">Subject</label>
            <input type="text"  class="form-control" name="subject">
        </div>
        <div class="col-sm-10">
        <label class="col-sm-2 col-form-label">Email</label>
            <input type="text"  class="form-control" name="email">
        </div>
        <div class="col-sm-10">
        <label class="col-sm-2 col-form-label">Body</label>
            <input type="text"  class="form-control" name="body">
        </div>
        <div class="col-sm-10">
        <label class="col-sm-2 col-form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="col-sm-10 mt-5">
            <input type="submit" class="form-control btn btn-primary" value="Send">
        </div>
    </div>
</form>