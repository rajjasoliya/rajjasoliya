<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
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
        $limit = 2;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        if(isset($_GET['pid'])){
        $author_id = $_GET['pid'];
        } ?>

        <?PHP 
        $query0 = "SELECT fname,lname from user where id = {$author_id}";
        $result0 = mysqli_query($connection,$query0);
        if(mysqli_num_rows($result0) > 0){
            while($row0 = mysqli_fetch_array($result0)){
                ?>
                        <div ><h2 style="color:#f4a11f;padding:20px;text-align:center;">Author : <?PHP echo $row0['fname']."_".$row0['lname']; ?></h2></div>
                <?PHP
            }
        }
        $query = "SELECT * FROM post inner join user on post.pauthor = user.id inner join category on category.cid = post.pcategory WHERE pauthor = {$author_id} LIMIT $offset,$limit ;";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

        ?>
        <div class="post">
            <a href="single.php?id=<?PHP echo $row['pid']; ?>"><img src="admin/users/images/<?PHP echo $row['pimage']; ?>" class="post-img"></a>
            <div class="post-txt">
                <div><a class="post-title" href="single.php?id=<?PHP echo $row['pid']; ?>"><?PHP echo $row['ptitle']; ?></a></div>
                    <div class="post-constrains">
                        <div class="post-category"><a style="color:#8a7d62;text-decoration:none;" href="category-wise.php?cid=<?php echo $row['cid']?>"><i class="fa fa-home" aria-hidden="true"></i> <?PHP echo $row['cname']; ?></a></div>
                        <div class="post-author"><a style="color:#8a7d62;text-decoration:none;" href="author-wise.php?pid=<?php echo $row['pauthor']?>"><i class="fa fa-user" aria-hidden="true"></i> <?PHP echo $row['fname']."_".$row['lname']; ?></a></div>
                        <div class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?PHP echo $row['pdate']; ?></div>
                    </div>
                    <div class="post-desc"><?PHP echo substr($row['pdesc'],0,100)."..."; ?></div>
                    <div><a class="post-read_more-btn" href="single.php?id=<?PHP echo $row['pid']; ?>">Read More</a></div>
            </div>
        </div>
    <br><br>
    <?PHP  } }
    else
    {
            echo "<h2 class='h2'>NO DATA FOUND</h2>";
    }
    $query2 = "SELECT * FROM post inner join user on post.pauthor = user.id WHERE pauthor = {$author_id} ";
    $result2 = mysqli_query($connection,$query2);
    $row2 = mysqli_fetch_array($result2);
    if(mysqli_num_rows($result2) > 0){
    $total_record = mysqli_num_rows($result2); ;
    $total_page = ceil($total_record / $limit);
    echo "<ul type='none' style='display:flex;margin-left: 50%;'>";
    if($page > 1){
        echo " <li><a class='pages' href='author-wise.php?page=".($page - 1)."&pid=".$author_id."'>prev</a></li>";
    }
    for($i=1;$i <= $total_page;$i++){
        if($i == $page){
            $active = "background-color:#aaa;font-size:15px";
        }else{ 
            $active = "";
        }
        echo " <li><a style='".$active."' class='pages' href='author-wise.php?page=".$i."&pid=".$author_id."'>$i</a></li>";
    }
    if($total_page > $page){
        echo " <li><a class='pages' href='author-wise.php?page=".($page + 1)."&pid=".$author_id."'>next</a></li>";
    }
    echo "</ul>";
}
    ?>
    </div>
</body>
</html>
