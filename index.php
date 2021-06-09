<!DOCTYPE html>
<html lang="en">
<head>
    <Link rel="stylesheet" href="css/style.css">
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
    <div class="index-content">
        <?PHP
        $limit = 4;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $query = "SELECT * FROM post inner join user on post.pauthor = user.id inner join category on category.cid = post.pcategory LIMIT $offset,$limit ;";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

        ?>
        <div class="post">
            <a href="single.php?id=<?PHP echo $row['pid']; ?>"><img src="admin/users/images/<?PHP echo $row['pimage']; ?>" class="post-img"></a>
            <div class="post-txt">
                <div><a class="post-title" href="single.php?id=<?PHP echo $row['pid']; ?>"><?PHP echo $row['ptitle']; ?></a></div>
                    <div class="post-constrains">
                        <div class="post-category"><a style="color:#8a7d62;text-decoration:none;" href="category-wise.php?cid=<?php echo $row['cid']?>"><i class="fa fa-home" aria-hidden="true"></i> <?PHP echo $row['cname']; ?></div>
                        <div class="post-author"><a style="color:#8a7d62;text-decoration:none;padding:5px;margin-top:5px;" href="author-wise.php?pid=<?php echo $row['pauthor']?>"><i class="fa fa-user" aria-hidden="true"></i> <?PHP echo $row['fname']."_".$row['lname']; ?></a></div>
                        <div class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?PHP echo $row['pdate']; ?></div>
                    </div>
                    <div class="post-desc"><?PHP echo substr($row['pdesc'],0,100)."..."; ?></div>
                    <div><a class="post-read_more-btn" href="single.php?id=<?PHP echo $row['pid']; ?>">Read More</a></div>
            </div>
        </div><br><br>
        <?PHP  } }else{
            echo "<h2 class='h2'>NO DATA FOUND</h2>";
        } 
    $query2 = "SELECT * FROM post";
    $result = mysqli_query($connection,$query2);
    $total_record = mysqli_num_rows($result);
    $total_page = ceil($total_record / $limit);
    echo "<ul type='none' style='display:flex;margin-left: 50%;'>";
    if($page > 1){
        echo " <li><a class='pages' href='index.php?page=".($page - 1)."'>prev</a></li>";
    }
    for($i=1;$i <= $total_page;$i++){
        if($i == $page){
            $active = "background-color:#aaa;font-size:15px";
        }else{ 
            $active = "";
        }
        echo " <li><a style='".$active."' class='pages' href='index.php?page=".$i."'>$i</a></li>";
    }
    if($total_page > $page){
        echo " <li><a class='pages' href='index.php?page=".($page + 1)."'>next</a></li>";
    }
    echo "</ul>";
    ?>
    </div>
</body>
</html>