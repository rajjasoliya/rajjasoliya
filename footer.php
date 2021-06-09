<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .footer-container {
    position: absolute;
    display:flex;
    font-family: "Helvetica";
    margin-top:100%;
    margin-left:50%;
    }
.nav-ul-footer{
    box-shadow: 0px 3px 10px #f4b11f;
    border-radius: 5px;
    display:flex;
    width: 100%;
    padding:10px;
    background-color: #f4b11f;
}
.nav-ul-footer li a{
    text-decoration:none;
    color: #fff;
    font-weight: 550;
    font-size: 20px;
    margin:10px;
}
.nav-ul-footer li a:hover{
    text-decoration:underline;
}

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<body>
    <div class="footer-container">
    <div>
    <ul type="none" class="nav-ul-footer">
    <?PHP  
    include "config.php";
    $query = "SELECT * FROM category;";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
    echo "<li><a href='#'>{$row['cname']}</a></li>";
    } } ?>
    </ul>
    
    </div>
    </div>
</body>
</html>