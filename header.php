
<?PHP 
include "config.php";
$title = basename($_SERVER['PHP_SELF']);
switch($title){
    case "single.php":
    if(isset($_GET['id'])){
    $query_title = "SELECT * FROM post WHERE pid= {$_GET['id']};";
    $result_title = mysqli_query($connection,$query_title) or die("Request failed");
    $row_title = mysqli_fetch_array($result_title) or die("Query failed");
    $page_title = $row_title['ptitle']." News";    
}
    else{
        echo "Page not found";
    }
    break;
    case "category-wise.php": 
        if(isset($_GET['cid'])){
            $query_title = "SELECT * FROM category WHERE cid= {$_GET['cid']};";
            $result_title = mysqli_query($connection,$query_title) or die("Request failed");
            $row_title = mysqli_fetch_array($result_title) or die("Query failed");
            $page_title = $row_title['cname']." News";    
        }
            else{
                echo "Page not found";
            }
    break;
    case "author-wise.php":
        if(isset($_GET['pid'])){
            $query_title = "SELECT * FROM user WHERE id= {$_GET['pid']};";
            $result_title = mysqli_query($connection,$query_title) or die("Request failed");
            $row_title = mysqli_fetch_array($result_title) or die("Query failed");
            $page_title = "News By ".$row_title['fname']."_".$row_title['lname'];    
        }
            else{
                echo "Page not found";
            }
    break;
    case "search.php":
        if(isset($_GET['search'])){
            $page_title = $_GET['search'];    
        }
            else{
                echo "Page not found";
            }
    break;
    default: $page_title = "News site";
    break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style> 
.header-container{
    display:flex;
    width: 100%;
    height: 300px;
    font-family: "Helvetica";
    padding:20px;
}
.logo-class{
    display:flex;
    width:250px;
    height:250px;
}
.nav-ul{
    margin-top: 80px;
    display:flex;
    padding:5px;
}
.nav-ul li a{
    border-radius: 25px;
    border:2px solid #f4b11f;
    padding:7px;
    background: none;
    text-decoration:none;
    color: #f4b11f;
    font-weight: 500;
    font-size: 20px;
    margin:10px;
}
.nav-ul li a:hover{
    background-color: #f4b11f;
    color: #fff;
    border:none;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?PHP echo $page_title ?></title>
</head>
<body>
    <div class="header-container">
    <a href="index.php"><img src="images/news3.png" class="logo-class"></a>
    <ul type="none" class="nav-ul">
    <?PHP  
    include "config.php";
    if(isset($_GET['cid'])){
        $cate_id = $_GET['cid'];
    }
    $query = "SELECT * FROM category;";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $active = "";
            if(isset($_GET['cid'])){
                if($row['cid'] == $cate_id){
                $active = "color:#fff;background-color:#f4a11f;border:none;";
                
            }
            else{
                $active = "";
            }  
        }
    echo "<li><a style='".$active."' href='category-wise.php?cid=".$row['cid']."'>{$row['cname']}</a></li>";
    } } ?>
    </ul>
    </div>
</body>
</html>
