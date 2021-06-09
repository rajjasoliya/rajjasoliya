<?PHP 
session_start();
if($_SESSION["user_role"] == '1'){
    header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
}
?>
<?PHP 
include "connection.php";
$c_id = $_GET['cid'];
$query = "DELETE FROM category WHERE cid = '{$c_id}'";
$result = mysqli_query($connection,$query) or die("couldn't delete");
header("Location:http://localhost/newsofgujarat.com/admin/users/category.php");
mysqli_close($connection);
?>