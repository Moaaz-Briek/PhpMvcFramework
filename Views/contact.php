<?php
/**
 * @var $this \app\Core\View
 * @var $model \app\Models\ContactForm
 */
$this->title = 'Contact';
?>
<h5>Contact Us</h5>

<?php $form = \app\Core\form\Form::begin('', 'post')?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'body') ?>
<div class="col-sm-10 mt-5">
    <input type="submit" class="form-control btn btn-primary" value="Send">
</div>
<?php \app\Core\form\Form::end();?>
