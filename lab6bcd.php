
<!DOCTYPE html>
<html>
<head>
<title>Matrix Calculator</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 20px;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #141e30, #243b55);
    font-family: Arial, sans-serif;
}

.container {
    width: 100%;
    max-width: 500px;
    background: #1e293b;
    padding: 25px;
    border-radius: 18px;
}

h2, h3 {
    color: white;
    text-align: center;
}

label {
    color: #cbd5e1;
}

select, input {
    padding: 12px;
    margin: 6px;
    border: none;
    border-radius: 7px;
    background: #334155;
    color: white;
}

select {
    width: 100%;
}

.matrix {
    text-align: center;
    margin: 15px 0;
}

.matrix input {
    width: 65px;
    text-align: center;
}

button {
    width: 100%;
    padding: 13px;
    background: #38bdf8;
    border: none;
    border-radius: 8px;
    font-size: 17px;
    cursor: pointer;
}

button:hover {
    background: #0ea5e9;
}

.result {
    background: #0f172a;
    padding: 15px;
    margin-top: 20px;
    border-radius: 10px;
    color: #4ade80;
    text-align: center;
    font-size: 18px;
}

a {
    display: block;
    text-align: center;
    color: #38bdf8;
    margin-top: 15px;
    text-decoration: none;
}

a:hover {
    color: white;
}

</style>
</head>

<body>

<div class="container">

<h2>Matrix Calculator</h2>

<?php

$op = $_POST['op'] ?? 'transpose';

$r1 = (int)($_POST['r1'] ?? 2);
$c1 = (int)($_POST['c1'] ?? 2);

$r2 = (int)($_POST['r2'] ?? 2);
$c2 = (int)($_POST['c2'] ?? 2);

// Allow only matrix sizes 2 or 3
$r1 = in_array($r1, [2, 3]) ? $r1 : 2;
$c1 = in_array($c1, [2, 3]) ? $c1 : 2;
$r2 = in_array($r2, [2, 3]) ? $r2 : 2;
$c2 = in_array($c2, [2, 3]) ? $c2 : 2;

?>

<form method="post">

<label>Select Operation:</label>

<select name="op" onchange="this.form.submit()">

    <option value="transpose" <?= $op == 'transpose' ? 'selected' : '' ?>>
        Transpose
    </option>

    <option value="add" <?= $op == 'add' ? 'selected' : '' ?>>
        Addition
    </option>

    <option value="multiply" <?= $op == 'multiply' ? 'selected' : '' ?>>
        Multiplication
    </option>

</select>

<h3>First Matrix Size</h3>

<label>Rows:</label>

<select name="r1" onchange="this.form.submit()">

    <option value="2" <?= $r1 == 2 ? 'selected' : '' ?>>2</option>
    <option value="3" <?= $r1 == 3 ? 'selected' : '' ?>>3</option>

</select>

<label>Columns:</label>

<select name="c1" onchange="this.form.submit()">

    <option value="2" <?= $c1 == 2 ? 'selected' : '' ?>>2</option>
    <option value="3" <?= $c1 == 3 ? 'selected' : '' ?>>3</option>

</select>

<h3>Enter First Matrix</h3>

<div class="matrix">

<?php

for ($i = 0; $i < $r1; $i++) {

    for ($j = 0; $j < $c1; $j++) {

        $v = htmlspecialchars($_POST['a'][$i][$j] ?? '');

        echo "<input type='number' name='a[$i][$j]' value='$v' required>";

    }

    echo "<br>";

}

?>

</div>

<?php if ($op != 'transpose') { ?>

<h3>Second Matrix Size</h3>

<label>Rows:</label>

<select name="r2" onchange="this.form.submit()">

    <option value="2" <?= $r2 == 2 ? 'selected' : '' ?>>2</option>
    <option value="3" <?= $r2 == 3 ? 'selected' : '' ?>>3</option>

</select>

<label>Columns:</label>

<select name="c2" onchange="this.form.submit()">

    <option value="2" <?= $c2 == 2 ? 'selected' : '' ?>>2</option>
    <option value="3" <?= $c2 == 3 ? 'selected' : '' ?>>3</option>

</select>

<h3>Enter Second Matrix</h3>

<div class="matrix">

<?php

for ($i = 0; $i < $r2; $i++) {

    for ($j = 0; $j < $c2; $j++) {

        $v = htmlspecialchars($_POST['b'][$i][$j] ?? '');

        echo "<input type='number' name='b[$i][$j]' value='$v' required>";

    }

    echo "<br>";

}

?>

</div>

<?php } ?>

<button type="submit" name="calculate">
    Calculate
</button>

</form>

<?php

if (isset($_POST['calculate'])) {

    $a = $_POST['a'] ?? [];

    $b = $_POST['b'] ?? [];

    $error = "";

    // Check addition condition
    if ($op == 'add' && ($r1 != $r2 || $c1 != $c2)) {

        $error = "For addition, both matrices must have the same size.";

    }

    // Check multiplication condition
    elseif ($op == 'multiply' && $c1 != $r2) {

        $error = "Columns of first matrix must equal rows of second matrix.";

    }

    if ($error != "") {

        echo "<div class='result'>$error</div>";

    } else {

        echo "<div class='result'>";

        echo "<h3>Result Matrix</h3>";

        // Determine result matrix size
        if ($op == 'transpose') {

            $rows = $c1;
            $cols = $r1;

        }

        elseif ($op == 'add') {

            $rows = $r1;
            $cols = $c1;

        }

        else {

            $rows = $r1;
            $cols = $c2;

        }

        // Calculate result
        for ($i = 0; $i < $rows; $i++) {

            for ($j = 0; $j < $cols; $j++) {

                if ($op == 'transpose') {

                    $result = $a[$j][$i];

                }

                elseif ($op == 'add') {

                    $result = $a[$i][$j] + $b[$i][$j];

                }

                else {

                    $result = 0;

                    for ($k = 0; $k < $c1; $k++) {

                        $result += $a[$i][$k] * $b[$k][$j];

                    }

                }

                echo $result . "&nbsp;&nbsp;";

            }

            echo "<br>";

        }

        echo "</div>";

    }

}

?>

<!-- Clear Calculator -->

<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Clear Calculator
</a>

</div>

</body>
</html>
