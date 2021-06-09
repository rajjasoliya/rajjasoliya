<?PHP include "user-header.php";
if($_SESSION["user_role"] == '1'){
    include "connection.php";
    $post_pid = $_GET['pid'];
    $query0 = "SELECT pauthor,role FROM post inner join user on post.pauthor = user.id WHERE pid = {$post_pid}";
    $result0 = mysqli_query($connection,$query0) or die("sorry");
    $row0 = mysqli_fetch_array($result0);
            if($row0['role'] != $_SESSION['user_role']){
                header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    
</body>
</html><!DOCTYPE html>
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
    <title>Edit Post</title>
</head>
<body>
<?PHP include "connection.php";
$post_pid = $_GET['pid'];
$query = "SELECT * FROM post WHERE pid = '{$post_pid}'";
$result = mysqli_query($connection,$query) or die("sorry");
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
?>    
<form method="post" enctype="multipart/form-data" action="<?PHP $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?php echo $row['pid'] ?>">
    <lable for="ptitle">Title : </lable>
    <input type="text" name="ptitle" placeholder="Title " value="<?php echo $row['ptitle']; ?>"><br><br>
    <lable for="pdesc">Description : </lable>
    <input type="text" name="pdesc" placeholder="About this Post is ..." value="<?php echo $row['pdesc']; ?>"><br><br>
    <?PHP $query2 = "SELECT * FROM category";
    $result2 = mysqli_query($connection,$query2) or die("Couldn't load category'");
    if(mysqli_num_rows($result2) > 0){
        echo "<select name='pcategory' value='{$row["pcategory"]}'>";
        while($row2 = mysqli_fetch_array($result2)){
            if($row['pcategory'] == $row2['cid']){$select = "selected";}else{$select = "";}
            echo "<option {$select} value='{$row2["cid"]}'>{$row2['cname']}</option>";
        }
        echo "</select>";
    }
    ?>
    <input type='hidden' name='old_category' value='<?PHP echo $row["pcategory"]; ?>'><br><br>
    <img style="width:300px;height:300px;" src="images/<?PHP echo $row['pimage']; ?>"><br><br>
    <input type="file" name="pimage" ><br><br>
    <input type="hidden" name="old_img" value="<?php echo $row['pimage']; ?>">
    <button type="submit" name="edit">Edit Post</button>
    </form>
    <?PHP }  }
    if(isset($_POST['edit'])){
    $user_id = $_GET['pid'];
    $user_title = $_POST['ptitle'];
    $user_desc = $_POST['pdesc'];
    $user_category = $_POST['pcategory'];
    $old_category = $_POST['old_category'];
    if(empty($_FILES['pimage']['name'])){
        $image_name = $_POST['old_img'];
    }else{
    $error = array();
    $image_name = $_FILES['pimage']['name'];
    $image_tmp_name = $_FILES['pimage']['tmp_name'];
    $image_size = $_FILES['pimage']['size'];
    $image_type = $_FILES['pimage']['type'];
    $image_ext0 = explode(".",$image_name);
    $image_ext = end($image_ext0);
    $extension = array("jpg","jpeg","png","webp","gif");
    if(in_array($image_ext,$extension) === false){
        $error[] =  "File Type is not jpg jpeg or png";
    }
    $target = "images/".$image_name;
    if(empty($error) == true){
        move_uploaded_file($image_tmp_name,$target) or die("sorry");
    }else{
        echo "<h1>Final error in image Uploadetion</h1>";
    }
    }
    $query3 = "UPDATE post SET ptitle = '{$user_title}',pdesc = '{$user_desc}',pcategory = {$user_category}, pimage = '{$image_name}' WHERE pid = {$user_id};";
    if($_POST['old_category'] != $user_category){
    $query3 .= "UPDATE category SET cpost = cpost + 1 WHERE cid = {$user_category};";
    $query3 .= "UPDATE category SET cpost = cpost - 1 WHERE cid = {$old_category};";
}
    $result3 = mysqli_multi_query($connection,$query3) or die("sorry");
    if($result3){
    header("Location:http://localhost/newsofgujarat.com/admin/users") or die("Sorry where to go");
}
    }
    ?>
</body>
</html>
