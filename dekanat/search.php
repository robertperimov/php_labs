<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 26.01.2019
 * Time: 20:48
 */

require_once "data.php";
require_once "function.php";

if (!empty($_POST))
{
    $search_text = $_POST["search_text"];
    echo search($la72, $search_text);
    echo "<p><a href='/'>Back</a></p>";
}