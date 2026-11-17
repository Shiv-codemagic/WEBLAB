<html>
<body>
<h3>Multiplication of Two Matrices</h3>

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

    <input type="submit" name="submit" value="Multiply">
</form>

<?php
if(isset($_POST['submit']))
{
    $a = $_POST['a'];
    $b = $_POST['b'];

    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<2; $j++)
        {
            $c[$i][$j] = 0;

            for($k=0; $k<2; $k++)
            {
                $c[$i][$j] +=
                $a[$i][$k] * $b[$k][$j];
            }
        }
    }

    echo "<h3>Multiplication Result:</h3>";

    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<2; $j++)
        {
            echo $c[$i][$j]." ";
        }
        echo "<br>";
    }
}
?>

</body>
</html>




