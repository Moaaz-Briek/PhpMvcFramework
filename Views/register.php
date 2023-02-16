<?php
/* @var $model \app\Models\User
 * @var $this \app\Core\View
 */
$this->title = 'Register';
?>
<?php $form = \app\Core\form\Form::begin('', "post") ?>
<?php echo $form->field($model, 'firstname'); ?>
<?php echo $form->field($model, 'lastname'); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'password')->passwordField(); ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
<input type="submit" class="form-control btn btn-primary" value="Send">
<?php \app\Core\form\Form::end()?>