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
in
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
    <form method="post" action="add-category2.php">

    <lable for="cname">Category Name : </lable>
    <input type="text" name="cname" placeholder="Category Name"><br><br>
    <lable for="cpost">Number of Posts : </lable>
    <input type="number" name="cpost" placeholder="Number of Posts"><br><br>
    <button type="submit" name="add" value="/add-category2.php">Add User</button>
    </form>
</body>
</html>
