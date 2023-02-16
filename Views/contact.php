<?php
/**
 * @var $this \app\Core\View
 * @var $model \app\Models\ContactForm
 */

use app\Core\form\Form;
use app\Core\form\inputField;
use app\Core\form\TextareaField;
$this->title = 'Contact';
?>
<h5>Contact Us</h5>

<?php $form = Form::begin('', 'post')?>
<?php echo new inputField($model, 'email') ?>
<?php echo new inputField($model, 'subject') ?>
<?php echo new TextareaField($model, 'body') ?>
<div class="col-sm-10 mt-5">
    <input type="submit" class="form-control btn btn-primary" value="Send">
</div>
<?php Form::end();?>
