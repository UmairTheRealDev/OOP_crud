<?php  
class data
{
    private $dbhost = "localhost";
    private $username = "root";
    private $pass = "";

    

    private $dbname = "as_js";
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->dbhost,$this->username,$this->pass,$this->dbname) or die();

    }

    function insert($table,$arr)
    {
        $keys = array_keys($arr);
        $values = array_values($arr);
        $keys = implode('`,`',$keys);
        $values = implode("','",$values);
        $sql = "INSERT INTO `{$table}`(`$keys`) VALUES ('$values')";
        mysqli_query($this->conn,$sql);   
    }

    function Show($table)
    {
        $sql = "SELECT * FROM `{$table}`";
        // $res = $this->conn->query($sql);
        $res = mysqli_query($this->conn,$sql);   
        $result = $res->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    function Delete($table,$id)
    {
        $sql = "DELETE FROM `user_data` WHERE `id` = $id";
        mysqli_query($this->conn,$sql);

    }
function showsingle($table,$id)
{
    $sql = "SELECT * FROM `{$table}` where `id` = $id";
    $res = mysqli_query($this->conn,$sql);   
    $result = $res->fetch_assoc();
    return $result;
}


function update($table,$arr,$id)
{

    $pair = [];
    foreach($arr as $keys => $values)
    {
        $pair[] = "`$keys` = '$values'";
    }
   $pairs = implode(',',$pair);
   $sql = "UPDATE `$table` SET {$pairs} WHERE `id` = $id";
    mysqli_query($this->conn,$sql);
}
}
$udata = new data();

?>