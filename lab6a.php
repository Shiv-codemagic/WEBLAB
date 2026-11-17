
<!DOCTYPE html>
<html>
<head>
<title>Scientific Calculator</title>

<style>
* { box-sizing: border-box; }

body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #141e30, #243b55);
    font-family: Arial;
    padding: 20px;
}

.calculator {
    width: 100%;
    max-width: 430px;
    background: #1e293b;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 15px 40px #0006;
}

h2 { text-align: center; color: white; }

input, select {
    width: 100%;
    padding: 13px;
    margin: 8px 0 15px;
    border: none;
    border-radius: 8px;
    background: #334155;
    color: white;
}

label { color: #cbd5e1; }

button {
    width: 100%;
    padding: 14px;
    background: #38bdf8;
    border: none;
    border-radius: 8px;
    font-size: 17px;
    cursor: pointer;
}

.result {
    margin-top: 20px;
    padding: 15px;
    border-radius: 10px;
    background: #0f172a;
    color: #4ade80;
    text-align: center;
    font-size: 18px;
}

.clear {
    display: block;
    text-align: center;
    color: #38bdf8;
    margin-top: 15px;
    text-decoration: none;
}
</style>
</head>

<body>

<div class="calculator">

<h2>Scientific Calculator</h2>

<form method="post">

<label>First Number</label>
<input type="number" step="any" name="n1" required>

<label>Second Number</label>
<input type="number" step="any" name="n2">

<label>Select Operation</label>
<select name="op">
    <option value="+">Addition (+)</option>
    <option value="-">Subtraction (-)</option>
    <option value="*">Multiplication (*)</option>
    <option value="/">Division (/)</option>
    <option value="%">Percentage (%)</option>
    <option value="square">Square (x²)</option>
    <option value="sqrt">Square Root (√)</option>
    <option value="power">Power (xʸ)</option>
    <option value="sin">Sin</option>
    <option value="cos">Cos</option>
    <option value="tan">Tan</option>
    <option value="log">Log</option>
</select>

<button type="submit" name="submit">Calculate</button>

</form>

<?php
if(isset($_POST['submit']))
{
    $a = (float)$_POST['n1'];
    $b = (float)($_POST['n2'] ?? 0);
    $op = $_POST['op'];

    switch($op)
    {
        case "+": $r = $a + $b; break;
        case "-": $r = $a - $b; break;
        case "*": $r = $a * $b; break;
        case "/": $r = $b != 0 ? $a / $b : "Cannot divide by zero"; break;
        case "%": $r = $b != 0 ? ($a / $b) * 100 : "Cannot divide by zero"; break;
        case "square": $r = $a * $a; break;
        case "sqrt": $r = $a >= 0 ? sqrt($a) : "Invalid number"; break;
        case "power": $r = pow($a, $b); break;
        case "sin": $r = sin(deg2rad($a)); break;
        case "cos": $r = cos(deg2rad($a)); break;
        case "tan": $r = abs(cos(deg2rad($a))) < 1e-12 ? "Undefined" : tan(deg2rad($a)); break;
        case "log": $r = $a > 0 ? log10($a) : "Invalid number"; break;
    }

    echo "<div class='result'>Result: " . htmlspecialchars((string)$r) . "</div>";
}
?>

<a href="calculator.php" class="clear">Clear Calculator</a>

</div>
</body>
</html>
