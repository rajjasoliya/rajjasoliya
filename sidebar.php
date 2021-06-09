<?PHP include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style3.css">
    <style>

        .sidebar-container{
            position: absolute;
            width: 15%;
            margin-left:80%;
            margin-top: 5%;
        }

        .search-box{
            position: absolute;
            box-shadow: 0px 3px 10px #f4b11f;
            background-color:#f4b11f;
            padding: 10px;
            font-family:Helvetica, sans-serif;
            border-radius: 5px;
        }

        .search-txt{
            padding-bottom: 5px;
            font-size: 15px;
            text-decoration: underline;
            text-decoration-color: #fff;
            font-weight: bold;
            color:#fff;
        }

        .search-input{
            border:none;
            border-radius: 5px;
            padding: 3px;
        }
        .search-btn{
            background:none;
            border:none;
        }
        .recent-tab{
            position:absolute;
            box-shadow: 0px 3px 10px #f4b11f;
            background-color:#fff;
            padding: 10px;
            font-family:Helvetica, sans-serif;
            border-radius: 5px;
            margin-top: 100px;
        }
        .recent-txt{
            font-size: 15px;
            text-decoration: underline;
            text-decoration-color:  #f4b11f;
            font-weight: bold;
            color:#f4b11f;

        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="sidebar-container">
        <div class="search-box">
            <p class="search-txt">Search</p>
            <form name="search-form" method="GET" action="search.php">
            <input type="text" class="search-input" placeholder="Search..." name="search" /> &nbsp; <button value="/search.php ?>" type="submit" class="search-btn"><i style="color:white;cursor:pointer;" class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="recent-tab">
            <p class="recent-txt">Recent Pages</p>
        <?PHP
        $limit = 3;
       
        $query = "SELECT * FROM post inner join user on post.pauthor = user.id inner join category on category.cid = post.pcategory ORDER BY post.pid DESC LIMIT {$limit};";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

        ?>
        <div class="post1">
            <a href="single.php?id=<?PHP echo $row['pid']; ?>"><img src="admin/users/images/<?PHP echo $row['pimage']; ?>" class="post1-img"></a>
            <div class="post1-txt">
                <div><a class="post1-title" href="single.php?id=<?PHP echo $row['pid']; ?>"><?PHP echo substr($row['pdesc'],0,20)."...";  ?></a></div>
                    <div class="post1-constrains">
                        <div class="post1-category"><a style="color:#8a7d62;text-decoration:none;" href="category-wise.php?cid=<?php echo $row['cid']?>"><i class="fa fa-home" aria-hidden="true"></i> <?PHP echo $row['cname']; ?></div>
                        <div class="post1-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?PHP echo $row['pdate']; ?></div>
                    </div>
                    <div class="post1-desc"><?PHP echo substr($row['pdesc'],0,50)."..."; ?></div>
                    <div><a class="post1-read_more-btn" href="single.php?id=<?PHP echo $row['pid']; ?>">Read More</a></div>
            </div>
        </div><br><hr><br>
        <?PHP  } }else{
            echo "<h2 class='h2'>NO DATA FOUND</h2>";
        }
    ?>
    </div>
    </div>
</body>
</html>