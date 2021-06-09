<?PHP
include "connection.php";
session_start();
if(empty($_FILES['pimage']['name'])){
    $file_name = $_POST['old_img'];
}
    else{
    $error = array();
    $file_name = $_FILES['pimage']['name'];
    $file_temp = $_FILES['pimage']['tmp_name'];
    $file_size = $_FILES['pimage']['size'];
    $file_type = $_FILES['pimage']['type'];
    $file_ext0 = explode('.',$file_name);
    $file_ext = end($file_ext0);
    $extension = array("jpeg","jpg","png");
    if(in_array($file_ext,$extension) === false){
        $error[] = "Error in uploaded file please check extension jpg jpeg png";
    }
    $target = "images/".$file_name;
    if(empty($error) == true){
        move_uploaded_file($file_temp,$target) or die("sorry");
    }
    else{
        echo "Finale error in uploading image";
    }
}
    $title =mysqli_real_escape_string($connection,$_POST['ptitle']);
    $desc =mysqli_real_escape_string($connection,$_POST['pdesc']);
    $category =$_POST['pcategory'];
    $date = date("d M, Y");
    $author = $_SESSION['user_id'];
    $query2 = "INSERT INTO post(ptitle,pdesc,pdate,pimage,pcategory,pauthor) VALUES('{$title}','{$desc}','{$date}','{$file_name}',{$category},{$author});";
    $query2 .= "UPDATE category SET cpost = cpost + 1 WHERE cid = {$category}";
    if(mysqli_multi_query($connection,$query2)){
        header("Location:http://localhost/newsofgujarat.com/admin/users/post.php");
    }else{
        die ("Error in inserting query");
    }
    ?>
