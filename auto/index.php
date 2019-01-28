<?php
require_once "models/Auto.php";
$auto_model = new Auto();
$auto_model->set_connection();
$auto = $auto_model->get_all_auto();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
          integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Auto List:</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Available</th>
                    <th>Buy</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($auto)) {
                    $number = 1;
                    foreach ($auto as $item) {
                        echo '<tr>
                                    <td>' . $number . '</td>
                                    <td>' . $item["name"] . '</td>
                                    <td>' . $item["year"] . '</td>
                                    <td>' . $item["price"] . '</td>
                                    <td>' . $item["available"] . '</td>
                                    <td><a class="btn btn-success btn-lg" href="/buy.php?auto_id=' . $item["id"] . '">Buy ' . $item["name"] . '</a></td>
                                </tr>';
                        $number++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>