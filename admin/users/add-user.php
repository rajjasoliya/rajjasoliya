<?PHP include "user-header.php"; 
if($_SESSION["user_role"] == '1'){
    header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
form{
    opacity:1;
    box-shadow: 1px 1px 1px 1px #000;
    font-size: 25px;
    text-align: center;
    position:absolute;
    top:60%;
    left:50%;
    transform:translate(-50%, -50%);
    padding:25px;
    border-right-width: 50%;
}
lable{
    color:#ccc;
}
input{
    background:#ccc;
    border:1px solid #fff;
    border-radius: 7px;
    padding:5px;
    font-size: 25px;
}
::placeholder{
    color:#fff;
}
select{
    background:#ccc;
    border:1px solid #fff;
    border-radius: 7px;
    padding:5px;
    font-size: 25px;
    color:#fff;
}
button{
    background:transparent;
    padding:6px;
    font-size: 20px;
    color:#fff;
    background-color:#adc;
    border-radius:0 10px 0 10px;
    border:2px solid #fff;
}
button:hover{
    opacity:0.7;
    transition:0.5s all;
    cursor: pointer;
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <?PHP include "connection.php";?>
    <form method="post" action="add-user2.php">

    <lable for="fname">First Name : </lable>
    <input type="text" name="fname" placeholder="First Name"><br><br>
    <lable for="lname">Last Name : </lable>
    <input type="text" name="lname" placeholder="Last Name"><br><br>
    <lable for="username">Username : </lable>
    <input type="text" name="username" placeholder="Username"><br><br>
    <lable for="password">Password : </lable>
    <input type="password" name="password" placeholder="Password"><br><br>
    <lable for="role">User Role : </lable>
    <select name="role">
        <option>Select Role</option>
        <option value="0">Admin</option>
        <option value="1">Normal</option>
    </select><br><br>
    <button type="submit" name="add" value="/add-user2.php">Add User</button>
    </form>
</body>
</html>
