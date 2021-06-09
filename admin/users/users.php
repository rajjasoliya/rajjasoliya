<?PHP include "user-header.php";
if($_SESSION["user_role"] == '1'){
    header('Location:http://localhost/newsofgujarat.com/admin/users/post.php');
}
?>
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
        button a{
            font-size:18px;    
        }
        .add{
            margin-left: 50%;
            background-color: #bba;
            color:#fff;
            padding:5px;
            border-radius:5px;
        }
        .pages{
            margin-left: 50%;
        }
     
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <?PHP  include "connection.php";
    $limit =3;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $query = "SELECT * FROM user LIMIT {$offset},{$limit} ";
    $result = mysqli_query($connection, $query) or die("Query failed");
    if(mysqli_num_rows($result) > 0) {
    ?>
  
    <table width="100" cellspacing="20">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?PHP while ($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['fname']."_".$row['lname'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo md5($row['password']);?></td>
            <td><?php if($row['role'] == '0'){ echo "Admin";}else{ echo "Normal";}; ?></td>
            <td><button ><a href="edit-user.php?id=<?php echo $row['id'];?>">Edit</a></button></td>
            <td><button><a href="delete-user.php?id=<?php echo $row['id'];?>">Delete</a></button></td>
        </tr>
        <?PHP }?>
    </table>
    <?PHP } 
    $query2 = "SELECT * FROM user";
    $result2 = mysqli_query($connection,$query2) or die("sorry");
    if(mysqli_num_rows($result2) > 0){ 
        $total_records = mysqli_num_rows($result2);
        $total_page =ceil($total_records / $limit);
        echo "<ul type='none' class='pages'>";
        if($page > 1){
            echo "<li><a href='users.php?page=".($page - 1)."'>prev</a></li>";
        }
        for($i= 1;$i <= $total_page;$i++){
            if($i == $page){
                $active = "background-color:#aaa;font-size:15px";
            }else{ 
                $active = "";
            }
            echo "<li ><a style='".$active."' href='users.php?page=".$i."'>$i</a></li>";
        }
        if($total_page > $page){
            echo "<li><a href='users.php?page=".($page + 1)."'>next</a></li>";
        }
        echo "</ul>";
    }
    
    ?>
</body>
</html>
    