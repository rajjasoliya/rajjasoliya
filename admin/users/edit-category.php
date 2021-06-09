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
    <title>Edit Category</title>
</head>
<body>
    <?PHP 
    include "connection.php";
    $c_id = $_GET['cid'];
    $query = "SELECT * FROM category WHERE cid = {$c_id}";
    $result = mysqli_query($connection,$query) or die("sorry");
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){ ?>
        <form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $row['cid'];?>">
        <label for="cname">Category Name</label>
    <input type="text" name="cname" value="<?php echo $row['cname']; ?>"><br><br>
    <label for="cpost">Category Post</label>
    <input type="number" name="cpost" value="<?php echo $row['cpost'];?>"><br><br>
    <button type="submit" name="edit" >Edit Category</button>
        </form>
        <?PHP }} 
        if(isset($_POST['edit'])){
            $c_id = $_GET['cid'];
            $c_name = $_POST['cname'];
            $c_post = $_POST['cpost'];
            $query2 = "UPDATE category SET cid = '{$c_id}', cname = '{$c_name}',cpost = '{$c_post}' WHERE cid = {$c_id}";
            $result2 = mysqli_query($connection,$query2) or die("Error in UPDATE Query");
            header("Location:http://localhost/newsofgujarat.com/admin/users/category.php");
            mysqli_close($connection);
        }        
        ?>
        
</body>
</html>