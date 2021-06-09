<?PHP
session_start();
if($_SESSION["user_role"] == '1'){
    header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head><style>
    form{
        position:absolute;
        top:55%;
        left:50%;
        transform:translate(-50%, -50%);
        padding:20px;
        border:2px solid black;
    }
    button,select,input{
        padding:5px;
        font-size: 17px;
        border:2px solid black;
        border-radius:3px;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<?PHP include "user-header.php"; include "connection.php";?>
<?PHP 
$stu_id = $_GET['id'];
$query = "SELECT * FROM user WHERE id = '{$stu_id}'";
$result = mysqli_query($connection,$query) or die("sorry");
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
?>    
<form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?php echo $row['fname'] ?>">
    <lable for="fname">First Name : </lable>
    <input type="text" name="fname" placeholder="First Name" value="<?php echo $row['fname'] ?>"><br><br>
    <lable for="lname">Last Name : </lable>
    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row['lname'] ?>"><br><br>
    <lable for="username">Username : </lable>
    <input type="text" name="username" placeholder="Username" value="<?php echo $row['username'] ?>"><br><br>
    <lable for="password">Password : </lable>
    <input type="password" name="password" placeholder="Password" value="<?php echo $row['password'] ?>"><br><br>
    <lable for="role">User Role : </lable>
    <select name="role" value="<?php echo $row['role'] ?>"> 
    <?PHP if($row['role'] == 0) {
    echo "<option value='0' selected>Admin</option><option value='1'>Normal</option>";}
    else{ 
    echo "<option value='0'>0</option><option value='1' selected>Normal</option>";}
    ?> 
    </select>
    <br><br>
    <button type="submit" name="add">Edit User</button>
    </form>
    <?PHP }  }?>
    <?PHP 
    if(isset($_POST['add'])){
    $user_id = $_GET['id'];
    $user_fname = $_POST['fname'];
    $user_lname = $_POST['lname'];
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];
    $user_role = $_POST['role'];
    $query2 = "UPDATE user SET fname = '{$user_fname}',lname = '{$user_lname}',username = '{$user_username}',password = '{$user_password}',role = '{$user_role}' WHERE id = {$user_id} ";
    $result2 = mysqli_query($connection,$query2) or die("sorry");
    header("Location:http://localhost/newsofgujarat.com/admin/users/users.php");
    }
    ?>
</body>
</html>