<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?PHP  include "connection.php";
    $query0 = "SELECT * FROM setting"; 
    $result0 = mysqli_query($connection, $query0);
    if(mysqli_num_rows($result0) > 0){
        while($row = mysqli_fetch_array($result0)){
    ?>
    <form method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <lable for="website-name">Website Name : </lable>
    <input type="text" name="website-name" placeholder="Website Name" value="<?PHP echo $row['websitename']; ?>"><br><br>
    <img src="images/<?PHP echo $row['logo']; ?>" style="width:200px;height:200px;">
    <lable for="logo">Website Logo : </lable>
    <input type="file" name="logo">
    <input type="hidden" name="old_logo" value="<?PHP echo $row['logo']; ?>"><br><br>
    <lable for="footer-desc">Footer Desc : </lable>
    <input type="text" name="footer-desc" placeholder="Footer Description" value="<?PHP echo $row['footerdesc']; ?>"><br><br>
    <button type="submit" name="change">Change</button>
</form>
<?PHP 
}
}
if(isset($_POST['change'])){
    $website_name = $_POST['website-name'];
    $footer_desc = $_POST['footer-desc'];
    if(empty($_FILES['logo'])){
        $logo = $_POST['old_logo'];
    }
    else{
        $error = array();
        $logo_name = $_FILES['logo']['name'];
        $logo_size = $_FILES['logo']['size'];
        $logo_tmp = $_FILES['logo']['tmp_name'];
        $logo_type = $_FILES['logo']['type'];
        $logo_ext0 = explode('.', $logo_name);
        $logo_ext = end($logo_ext0);
        $extensions = array("jpg","jpeg","png");
        if(in_array($logo_ext,$extensions) === false){
            $error = "Invalid logo extension";
        }
        if(empty($error) == true){
            move_uploaded_file($logo_tmp,"images/".$logo_name);
        }
        else{
            echo "<h2 style='color:red;'>Final error at Image Uploadetion</h2>";
        }
    }
}
$query = "UPDATE setting SET websitename = '{$website_name}',logo = '{$logo_name}', footerdesc = '{$footer_desc}'";
$result = mysqli_query($connection,$query) or die("Couldn't connect to database'");
?>
</body>
</html>
