<h2>Home</h2>
<p>Welcome <?php
    foreach ($params as $key => $value)
    {
        echo $value . '<br>';
    }
    ?> </p>