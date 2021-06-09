
<?PHP  
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/newsofgujarat.com/admin/users");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
*{
    margin: 0;
    padding: 0;
}
.container{
    background-color:#abcdefaf;
    width:100%;
    height:200px;
}
.logout{
float:right;
}
.logo{
    margin-left:50px;
    height:150px;
    width:150px;
}
.nav{
    padding:10px;
}
ul{
    display:flex;
}
.logout,li a{
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
    color: #fff;
    padding: 10px;
    margin: 10px;
    background-color: #000;
    border-radius: 5px;
}
li a:hover{
    background-color: #aaa;
    transition:all 0.5s;
}
   
.login{
    font-size: 25px;
    color: #fff;
    font-weight: bold;
    float: right;
    background-color: #cba;
    border-radius: 5px;
    padding: 10px;}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?PHP  include "connection.php";
    $query0 = "SELECT * FROM setting"; 
    $result0 = mysqli_query($connection, $query0);
    if(mysqli_num_rows($result0) > 0){
        while($row = mysqli_fetch_array($result0)){
    ?>
    <img src="images/<?PHP echo $row['logo']; ?>" class="logo">
    <?PHP  }} ?>
    <a href="logout.php" class="logout">Hello <?PHP echo $_SESSION['username']; ?> Log Out</a>
    </div>
    <div class="nav">
    <ul type="none">
    <li><a href="post.php">Posts</a></li>
    <li><a href="add-post.php">Add_Post</a></li>
    <?PHP 
    if($_SESSION["user_role"] == '0'){ ?>
    <li><a href="category.php">Categories</a></li>
    <li><a href="users.php">Users</a></li>
    <li><a href="add-user.php">Add_User</a></li>
    <li><a href="add-category.php">Add_Category</a></li>
    <li><a href="setting.php">Setting</a></li><?PHP }  ?>
    </ul>
    </div>
</body>
</html>