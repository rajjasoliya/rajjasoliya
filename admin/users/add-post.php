<?PHP  include "user-header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
form{
    opacity:1;
    box-shadow: 1px 1px 1px 1px #000;
    font-size: 25px;
    text-align: center;
    position:absolute;
    top:60%;
    left:50%;
    transform:translate(-50%, -50%);
    padding:25px;
    border-right-width: 50%;
}
lable{
    color:#ccc;
}
select , textarea , input{
    background:#ccc;
    border:1px solid #fff;
    border-radius: 7px;
    padding:5px;
    font-size: 25px;
}
in
::placeholder{
    color:#fff;
}
select{
    background:#ccc;
    border:1px solid #fff;
    border-radius: 7px;
    padding:5px;
    font-size: 25px;
    color:#fff;
}
button{
    background:transparent;
    padding:6px;
    font-size: 20px;
    color:#fff;
    background-color:#adc;
    border-radius:0 10px 0 10px;
    border:2px solid #fff;
}
button:hover{
    opacity:0.7;
    transition:0.5s all;
    cursor: pointer;
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <?PHP include "connection.php";?>
    <form method="post" action="add-post-data.php" enctype="multipart/form-data" >
    <lable for="ptitle">Title Name : </lable>
    <input type="text" name="ptitle" placeholder="Title Name"><br><br>
    <lable for="pdesc">Description : </lable>
    <textarea type="text" name="pdesc" rows="5" placeholder="Description of About the post is..."></textarea><br><br>
    <lable for="pcategory">Category : </lable>
    <?PHP 
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection,$query) or die("couldn't load category");
    echo "<select name='pcategory'>";
    echo "<option>Choose Category</option>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row['cid']."'>{$row['cname']}</option>";
    }
    echo "</select>";
    ?><br><br>
    <lable for="pimage">image : </lable>
    <input type="file" name="pimage" ><br><br>
     <button type="submit" name="add" value="/add-user2.php">Add Post</button>
    </form>
</body>
</html>
