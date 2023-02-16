<?php
/* @var $model \app\Models\User
 * @var $this \app\Core\View
 */
$this->title = 'Login';
?>
<h3 class="mt-2">Login</h3>
<?php $form = \app\Core\form\Form::begin('', "post") ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'password')->passwordField(); ?>
<div class="col-sm-10 mt-4">
    <input type="submit" class="form-control btn btn-primary" value="Send">
</div>
<?php \app\Core\form\Form::end()?>