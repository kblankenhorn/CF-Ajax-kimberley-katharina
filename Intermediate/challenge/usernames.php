<?php 
$compareUsers = isset($_POST['compareUsers']) ? $_POST['compareUsers'] : null;

$host= "localhost";
$username="root";
$password="";
$dbname="emails";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
        echo "danger will robinson!";
}



    $sql = "SELECT * FROM `user` WHERE email LIKE '{$compareUsers}%'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 0){
        echo "no result";
    } elseif ($result->num_rows ==1){
        $row = $result->fetch_assoc();
        echo $row["email"];
    } else {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row){
            echo $row["email"] . "<br>";
        }
    }

?>