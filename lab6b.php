<html>
<body>
<h3>Transpose of a Matrix</h3>

<form method="post">
    Enter Matrix Elements (2x3):<br><br>

    <?php
    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<3; $j++)
        {
            echo "<input type='number' name='a[$i][$j]' required>";
        }
        echo "<br><br>";
    }
    ?>

    <input type="submit" name="submit" value="Transpose">
</form>

<?php
if(isset($_POST['submit']))
{
    $a = $_POST['a'];

    echo "<h3>Original Matrix:</h3>";

    for($i=0; $i<2; $i++)
    {
        for($j=0; $j<3; $j++)
        {
            echo $a[$i][$j]." ";
        }
        echo "<br>";
    }

    echo "<h3>Transpose Matrix:</h3>";

    for($i=0; $i<3; $i++)
    {
        for($j=0; $j<2; $j++)
        {
            echo $a[$j][$i]." ";
        }
        echo "<br>";
    }
}
?>
</body>
</html>