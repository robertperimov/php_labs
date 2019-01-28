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
            if ($student["sex"] == "male"){
                $count_male++;
            } elseif ($student["sex"] == "female"){
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

/**
 * @param array $a
 * @param array $b
 * @return bool
 */
function sortByFio($a, $b)
{
    $a = $a['fio'];
    $b = $b['fio'];

    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}
