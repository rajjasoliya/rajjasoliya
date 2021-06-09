<?PHP
include "connection.php";
if(isset($_POST['add'])){
    $user_fname = mysqli_real_escape_string($connection,$_POST['fname']);
    $user_lname = mysqli_real_escape_string($connection,$_POST['lname']);
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $role = mysqli_real_escape_string($connection,$_POST['role']);
    $query = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0 ){
        echo "User Already Exists";
    }
    else{
    $query2 = "INSERT INTO user(fname,lname,username,password,role) VALUES('{$_POST['fname']}','{$_POST['lname']}','{$_POST['username']}','{$_POST['password']}','{$_POST['role']}')";
    if(mysqli_query($connection,$query2)){
        header("Location:http://localhost/newsofgujarat.com/admin/users/users.php");
    }
}
}
?>
