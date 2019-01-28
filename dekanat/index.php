<?php
require_once "data.php";
require_once "function.php";

$count_student = count_student($la72);
if (!empty($_POST)){
    if (isset($_POST["show_students"]) && !empty($_POST["show_students"])){
        $is_sort = isset($_POST["Sort"]) && !empty($_POST["Sort"]) ? true : false;
        $groupData = $$_POST["group"];
        if($is_sort) {
            usort($groupData, 'sortByFio');
        }
    }elseif (isset($_POST["Search"]) && !empty($_POST["Search"])){

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
          integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <title>Dekanat</title>
</head>
<body>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Students:</h2>
            <p>Males: <?= $count_student["count_male"]; ?></p>
            <p>Females: <?= $count_student["count_female"]; ?></p>
        </div>
        <div class="col-md-6">
            <form action="search.php" method="post">
                <p><input class="form-control" type="text" name="search_text"></p>
                <p><input class="btn btn-success btn-lg" type="submit" name="Search"></p>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" action="" method="post">
                <p>Choose group: </p>
                <p>
                    <select class="form-control" name="group">
                        <option value="">...</option>
                        <?php
                        if (!empty($groups)) {
                            foreach ($groups as $group) {
                                echo '<option value="' . $group . '">' . $group . '</option>';
                            }
                        }
                        ?>
                    </select>
                </p>
                <p><input type="checkbox" name="Sort" value="1"> Do you want to sort by fio?</p>
                <p><input class="btn btn-success btn-lg" type="submit" name="show_students" value="Show list of students"></p>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>FIO</th>
                        <th>Rating</th>
                        <th>Sex</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($groupData)) {
                        $number = 1;
                        foreach ($groupData as $student) {
                            echo '<tr>
                                    <td>' . $number . '</td>
                                    <td>' . $student["fio"] . '</td>
                                    <td>' . $student["rating"] . '</td>
                                    <td>' . $student["sex"] . '</td>
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