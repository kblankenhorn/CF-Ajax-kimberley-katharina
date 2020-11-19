<?php 
// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$formfirstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
$formlastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
$formemail = isset($_POST['email']) ? $_POST['email'] : null;


$host= "localhost";
$username="root";
$password="";
$dbname="emails";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
        echo "danger Will Robinson!";
}



    $sql = "SELECT * FROM `user` WHERE email LIKE '{$formemail}%'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 0){
        echo '<input class="btn btn-info" type="submit" value="Save" name="submit"/><div class="alert alert-success mt-4 text-center" role="alert">Email has not been used, you may continue.</div>';
    } elseif ($result->num_rows ==1){
      //   $row = $result->fetch_assoc();
        echo '<div> Email is already taken, please enter another email, or just log in.</div> ';
    }

    if(isset($_POST['submit'])) {
      $query= "INSERT INTO `user` (`firstName`, `lastName`, `email`) VALUES ('$formfirstName', '$formlastName', '$formemail');";
      // echo $query;
      if(mysqli_query($conn,$query)){
          echo '<div class="alert alert-success mt-4 text-center" role="alert">Record inserted successfully!</div>';
      };
      // echo 'ok';
  }
    

?>