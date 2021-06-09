<?PHP  
include "connection.php";
$c_name = $_POST['cname'];
$c_post = $_POST['cpost'];
$query = "INSERT INTO category (cname,cpost) VALUES ('{$c_name}','{$c_post}')";
$result = mysqli_query($connection,$query) or die("query not inserted");
header("Location:http://localhost/newsofgujarat.com/admin/users/category.php");
mysqli_close($connection);
?>