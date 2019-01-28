<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 26.01.2019
 * Time: 19:15
 */

require_once "function.php";

define('PLUS', "+");
define('MINUS', "-");
define('MULTIPLY', "*");
define('COMPARE', "=");
$result = '';
if (!empty($_POST)){
    $action_type = $_POST["action_type"];
    $number1 = (int) $_POST["number1"];
    $number2 = (int) $_POST["number2"];
    switch ($action_type){
        case PLUS:
            $result = sum($number1, $number2);
            break;
        case MINUS:
            $result = minus($number1, $number2);
            break;
        case MULTIPLY:
            $result = multiply($number1, $number2);
            break;
        case COMPARE:
            $result = compare($number1, $number2) ? "Numbers are equal" : "Numbers are not equal";
            break;
    }
}

echo "<h2>Result: " . $result . "</h2>";
echo "<p><a href='/'>Back to calculator</a></p>";