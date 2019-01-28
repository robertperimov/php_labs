<?php
/**
 * @param array $students
 * @return array
 */
function count_student ($students = [])
{
    $count_male = 0;
    $count_female = 0;
    if (!empty($students))
    {
        foreach ($students as $student){
            if ($student["sex"] == 1){
                $count_male++;
            } elseif ($student["sex"] == 0){
                $count_female++;
            }
        }
    }

    return [
        "count_male" => $count_male,
        "count_female" => $count_female
    ];
}

/**
 * @param array $group
 * @param string $student_name
 * @return string
 */
function search ($group, $student_name)
{
    $result = "Student not found";
    if (!empty($group))
    {
        foreach ($group as $student)
        {
            if ($student["fio"] == $student_name)
            {
                $result = "Student fio: " . $student["fio"] . ", rating: " . $student["rating"] . ", sex: " . $student["sex"];
                break;
            }
        }
    }
    return $result;
}