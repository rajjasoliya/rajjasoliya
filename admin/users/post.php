
<!DOCTYPE html>
<html lang="en">
<head>
<style>
table{
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        th{
            color: #fff;
            background-color: #cba;
            padding:5px;
            border-radius: 5px;
        }
        button{
            border:none;
            background-color: #acb;
            border-radius: 3.5px;
            
        }
        td a{
            font-size:18px;
            background-color: #acb;
            border-radius: 3.5px;
        }
        
.pages{
    margin-left: 50%;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <?PHP include "user-header.php"; include "connection.php"; 
     $limit = 3;
     if(isset($_GET['page'])){
         $page = $_GET['page'];
     }else{
         $page = 1;
     }
     $offset = ($page - 1) * $limit;

if($_SESSION["user_role"] == '0'){
    $query = "SELECT * FROM post inner join user on post.pauthor = user.id inner join category on post.pcategory = category.cid ORDER BY pid LIMIT $offset, $limit";
}
if($_SESSION["user_role"] == '1'){
    $query = "SELECT * FROM post inner join user on post.pauthor = user.id inner join category on post.pcategory = category.cid WHERE pauthor = {$_SESSION['user_id']} ORDER BY pid  LIMIT $offset, $limit  ";
}
    $result = mysqli_query($connection, $query) or die("query not selected");
    if(mysqli_num_rows($result) > 0){
   
            ?>
            <table width="50%" cellspacing="20">
            <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>

            <?PHP
            $serial = $offset +1;
            while($row = mysqli_fetch_array($result)){ ?>
            <tr>
            <td><?php echo $serial; ?></td>
            <td><?php echo $row['ptitle']; ?></td>
            <td><?php echo $row['cname']; ?></td>
            <td><?php echo date("jS F Y"); ?></td>
            <td><?php echo $row['fname']."_".$row['lname']; ?></td>
            <td><a href="edit-post.php?pid=<?php echo $row['pid'];?>&cid=<?php echo $row['pcategory'];?>">Edit</a></td>
            <td><a href="delete-post.php?pid=<?php echo $row['pid'];?>&cid=<?php echo $row['pcategory'];?>">Delete</a></td>
            </tr><?PHP $serial++; } ?>
            </table>
            <?PHP } 
            $query2 = "SELECT * FROM post";
            $result2 = mysqli_query($connection, $query2);
            if(mysqli_num_rows($result2) > 0){
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);
            
            echo "<ul class='pages' type='none'>";
            if($page > 1){
                echo "<li><a href='post.php?page=".($page - 1 )."'>prev</a></li>";
            }
            for($i = 1; $i <= $total_page; $i++){
            if($i == $page){
            $active = "background-color:#aaa;font-size:15px;";
            }
            else{ 
            $active = "";
            }
            echo "<li ><a style='".$active."' href='post.php?page=".$i."'>$i</a></li>";
            }
            if($total_page > $page){
                echo "<li><a href='post.php?page=".($page + 1)."'>next</a></li>";
            }
            echo "</ul>";
            }
            ?>
</body>
</html>
