<?php
/* @var $model \app\Models\User
 * @var $this \app\core\View
 */

use app\core\form\Form;
use app\core\form\inputField;

$this->title = 'Login';
?>
<h3 class="mt-2">Login</h3>
<?php $form = Form::begin('', "post") ?>
<?php echo new inputField($model, 'email'); ?>
<?php echo (new inputField($model, 'password'))->passwordField(); ?>
<div class="col-sm-10 mt-4">
    <input type="submit" class="form-control btn btn-primary" value="Send">
</div>
<?php Form::end()?>