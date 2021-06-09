
<?PHP  
session_start();
if(isset($_SESSION['username'])){
    header("Location:http://localhost/newsofgujarat.com/admin/users/post.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        form{
    opacity:1;
    box-shadow: 1px 1px 1px 1px #acb;
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
    <title>Log in</title>
</head>
<body>
<?PHP  include "connection.php" ?>
    <form method="POST" action="<?PHP $_SERVER['PHP_SELF']?>">
    <h2 style="text-decoration:underline;color:#acbfa9">Login</h2>
    <lable for="username">Username : </lable>
    <input type="text" name="username" placeholder="Username..."><br><br>
    <lable for="password">Password : </lable>
    <input type="password" name="password" placeholder="Password..."><br><br>
    <button type="submit" name="login">Log in</button>
    </form>
    <?PHP
    if(isset($_POST['login'])){
    $username =mysqli_real_escape_string($connection,$_POST['username']);
    $password = $_POST['password'];
    $query = "SELECT id,username,role FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection,$query) or die("sorry");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_role'] = $row['role'];
            header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
        }
    }
        else{
                echo "<h1 style='color:red;'>Username or Password is incorrect</h1>";
            }
        }
        ?>
</body>
</html>
