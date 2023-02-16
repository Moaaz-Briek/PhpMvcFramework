<?php
/**
 * @var $params array
 * @var $this \app\Core\View
 */
    $this->title = 'Home';
?>

<h2>Home</h2>
<p>Welcome <?php
    foreach ($params as $key => $value)
    {
        echo $value . '<br>';
    }
    ?> </p>