<?PHP  
include "connection.php";
$stu_id = $_GET['pid'];
$stu_cid = $_GET['cid'];
$query0  = "SELECT * FROM post WHERE pid = {$stu_id};";
$result = mysqli_query($connection, $query0) or die("Query failed");
$row = mysqli_fetch_array($result);
unlink("images/".$row['pimage']);
$query ="DELETE FROM post WHERE pid = {$stu_id};";
$query .= "UPDATE category SET cpost = cpost - 1 WHERE cid = {$stu_cid};";
    if(mysqli_multi_query($connection,$query)){
        header("Location:http://localhost/newsofgujarat.com/admin/users/post.php");
    }else{
        die ("Error in inserting query");
    }
?>