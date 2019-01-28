<?php
require_once "DB.php";


class Auto extends DB
{
    const TABLE_AUTO = "auto";
    private $connection;

    public function set_connection()
    {
        $this->connection = $this->connection();
    }

    /**
     * @return array
     */
    public function get_all_auto(){
    $auto = $this->connection->query("SELECT * FROM " . self::TABLE_AUTO)->fetchAll();
    return $auto;
}

    /**
     * @param int $id
     * @return array
     */
    public function get_auto_by_id($id){
        $id = intval($id);
        if($id == 0) {
            return [];
        }

        $auto = $this->connection->query("SELECT * FROM " . self::TABLE_AUTO . " WHERE id = " . $id)->fetch();
        return $auto;
    }

    /**
     * @param int $auto_id
     * @param int $auto_count
     * @return int
     */
    public function buy_auto($auto_id, $auto_count){
        $auto_id = intval($auto_id);
        if($auto_id == 0) {
            return 0;
        }

        $auto_info = $this->get_auto_by_id($auto_id);
        $new_available = $auto_info["available"] - $auto_count;
        if($new_available < 0) {
            return "The auto is not available by input count!";
        }

        $sql = "UPDATE " . self::TABLE_AUTO . " SET available = " . $new_available . " WHERE id = " . $auto_id;

        $this->connection->query($sql)->execute();

        return "You have bought the auto!";
    }
}