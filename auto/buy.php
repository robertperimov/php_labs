<?php
require_once "models/Auto.php";

if(isset($_GET["auto_id"]) && !empty($_GET["auto_id"])) {
    $auto_id = (int) $_GET["auto_id"];
} else {
    echo "<p>Wrong internal data!</p>";
    exit();
}

$auto_model = new Auto();
$auto_model->set_connection();
$auto = $auto_model->get_auto_by_id($auto_id);
$auto_list = $auto_model->get_all_auto();

$buy_message = "";

if(isset($_POST["buy_auto"]) && !empty($_POST["buy_auto"])){
    $auto_id = (int) $_POST["choose_auto"];
    $auto_count = (int) $_POST["count_auto"];
    $buy_message = $auto_model->buy_auto($auto_id, $auto_count);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
          integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <title>Buy auto</title>
</head>
<body>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-4 text-center"></div>
        <div class="col-md-4">
            <h1 class="text-center">Buy Auto:</h1>
            <hr>
            <?php echo $buy_message ? '<div class="alert alert-success">' . $buy_message . '</div>' : "" ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="choose_auto">Choose auto</label>
                    <select id="choose_auto" class="form-control" name="choose_auto">
                        <option value="">...</option>
                        <?php
                        if (!empty($auto_list)) {
                            foreach ($auto_list as $item) {
                                echo '<option value="' . $item["id"] . '">' . $item["name"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="count_auto">Count auto:</label>
                    <input type="text" class="form-control" name="count_auto" id="count_auto" placeholder="Count auto">
                </div>
                <button type="submit" class="btn btn-success btn-lg" name="buy_auto" value="Buy">Buy</button>
                <hr>
                <a href="/" class="btn btn-default btn-lg">Back to auto list</a>
            </form>
        </div>
        <div class="col-md-4 text-center"></div>
    </div>
</div>
</body>
</html>