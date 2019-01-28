<?php

require_once "function.php";
require_once "models/Student.php";

$student_model = new Student();
$student_model->set_connection();

$students = $student_model->get_all_students();
$student = $student_model->get_student(4); // for test
$groups = $student_model->get_groups();

$count_student = count_student($students);

if (!empty($_POST)){
    if (isset($_POST["show_students"]) && !empty($_POST["show_students"])){
        $is_sort = isset($_POST["Sort"]) && !empty($_POST["Sort"]) ? true : false;
        $group_id = (int) $_POST["group"];
        $groupData = $student_model->get_students_by_group_id($group_id, $is_sort);
    } elseif (isset($_POST["Search"]) && !empty($_POST["Search"])){
        $search_string = $_POST["search_text"];
        $student_search = $student_model->get_students_by_fio($search_string);
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
            <form action="" method="post">
                <p><input class="form-control" type="text" name="search_text"></p>
                <p><input class="btn btn-success btn-lg" type="submit" name="Search"></p>
            </form>
            <p>
            <?php
                if(isset($_POST["Search"]) && !empty($_POST["Search"])) {
                    if($student_search) {
                        $sex = $student_search["sex"] == 0 ? "female" : "male";
                        echo "Student fio: " . $student_search["fio"] . ", birthday: " . $student_search["birthday"] . ", sex: " . $sex;
                    } else {
                        echo "Student not found";
                    }
                }
            ?>
            </p>
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
                                echo '<option value="' . $group["group_id"] . '">' . $group["title"] . '</option>';
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