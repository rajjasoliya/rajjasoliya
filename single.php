<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style2.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?PHP 
    include "sidebar.php"; 
    include "config.php";
    include "header.php";
    ?>
    <div class="content">
        <?PHP
$stu_id = $_GET['id'];
$query = "SELECT * FROM post inner join user on post.pauthor = user.id inner join category on category.cid = post.pcategory WHERE pid = {$stu_id}";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

        ?>
        <div class="post">
        <div class="post-title" style="text-align:center;"><?PHP echo $row['ptitle'];?></div>
            <div class="post-txt ">
            <img src="admin/users/images/<?PHP echo $row['pimage']; ?>" class="post-img">
                    <div class="post-constrains">
                        <div class="post-category"><a style="color:#8a7d62;text-decoration:none;" href="category-wise.php?cid=<?php echo $row['cid']?>"><i class="fa fa-home" aria-hidden="true"></i> <?PHP echo $row['cname']; ?></a></div>
                        <div class="post-author"><a style="color:#8a7d62;text-decoration:none;" href="author-wise.php?pid=<?php echo $row['pauthor']?>"><i class="fa fa-user" aria-hidden="true"></i> <?PHP echo $row['fname']."_".$row['lname']; ?></a></div>
                        <div class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?PHP echo $row['pdate']; ?></div>
                    </div>
                    <div class="post-desc"><?PHP echo $row['pdesc']; ?></div>
            </div>
        </div><br><br>
        <?PHP  } }
        else
        {
            echo "<h2 class='h2'>NO DATA FOUND</h2>";
        } 
        ?>
    </div>
    
</body>
</html>