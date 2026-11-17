<html>
<body>
<h3>Addition of Two Matrices</h3>

<form method="post">

    Enter First Matrix (2x2):<br><br>

    <?php
    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<2; $j++)
        {
            echo "<input type='number' name='a[$i][$j]' required>";
        }
        echo "<br><br>";
    }
    ?>

    Enter Second Matrix (2x2):<br><br>

    <?php
    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<2; $j++)
        {
            echo "<input type='number' name='b[$i][$j]' required>";
        }
        echo "<br><br>";
    }
    ?>

    <input type="submit" name="submit" value="Add">
</form>

<?php
if(isset($_POST['submit']))
{
    $a = $_POST['a'];
    $b = $_POST['b'];

    echo "<h3>Addition Result:</h3>";

    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<2; $j++)
        {
            $c[$i][$j] =
            $a[$i][$j] + $b[$i][$j];

            echo $c[$i][$j]." ";
        }
        echo "<br>";
    }
}
?>

</body>
</html>