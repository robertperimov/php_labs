<?php
require_once "DB.php";


class Student extends DB
{
    const TABLE_STUDENTS = "students";
    const TABLE_GROUPS = "groups";
    private $connection;

    public function set_connection()
    {
        $this->connection = $this->connection();
    }

    /**
     * @return array
     */
    public function get_all_students(){
    $students = $this->connection->query("SELECT * FROM " . self::TABLE_STUDENTS)->fetchAll();
    return $students;
}

    /**
     * @return array
     */
    public function get_groups(){
        $groups = $this->connection->query("SELECT * FROM " . self::TABLE_GROUPS)->fetchAll();
        return $groups;
    }

    /**
     * @param int $id
     * @return array
     */
    public function get_student($id){
        $id = intval($id);
        if($id == 0) {
            return [];
        }

        $student = $this->connection->query("SELECT * FROM " . self::TABLE_STUDENTS . " WHERE student_id = " . $id)->fetch();
        return $student;
    }

    /**
     * @param int $group_id
     * @param bool $is_sort
     * @return array
     */
    public function get_students_by_group_id($group_id, $is_sort){
        $group_id = intval($group_id);

        if($group_id == 0) {
            return [];
        }

        $sql = "SELECT * FROM " . self::TABLE_STUDENTS . " WHERE group_id = " . $group_id;
        if($is_sort) {
            $sql = $sql . " ORDER BY fio";
        }

        $students = $this->connection->query($sql)->fetchAll();

        return $students;
    }

    /**
     * @param string $fio
     * @return array
     */
    public function get_students_by_fio($fio){
        if(empty($fio)) {
            return [];
        }

        $sql = "SELECT * FROM " . self::TABLE_STUDENTS . " WHERE fio = '" . $fio . "'";
        $student = $this->connection->query($sql)->fetch();

        return $student;
    }
}