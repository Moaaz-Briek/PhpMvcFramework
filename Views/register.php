<?php
/* @var $model \app\Models\User
 * @var $this \moaazbriek\phpmvc\View
 */

use moaazbriek\phpmvc\form\Form;
use moaazbriek\phpmvc\form\inputField;

$this->title = 'Register';
?>
<?php $form = Form::begin('', "post") ?>
<?php echo new inputField($model, 'firstname'); ?>
<?php echo new inputField($model, 'lastname'); ?>
<?php echo new inputField($model, 'email'); ?>
<?php echo (new inputField($model, 'password'))->passwordField(); ?>
<?php echo (new inputField($model, 'confirmPassword'))->passwordField(); ?>
<input type="submit" class="form-control btn btn-primary" value="Send">
<?php Form::end()?>