<?PHP
session_start();
if($_SESSION["user_role"] == '1'){
    header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
}
?>
<?PHP  
include "connection.php";
$stu_id = $_GET['id'];
$query ="DELETE FROM user WHERE id = {$stu_id}";
$result = mysqli_query($connection,$query) or die("Couldn't delete record from database'");
header("Location:http://localhost/newsofgujarat.com/admin/users/users.php");
?>