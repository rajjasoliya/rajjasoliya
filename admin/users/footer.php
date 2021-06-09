<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .footer{
            text-align: center;
            margin-top:35%;
            background-color:#000;
            color:white;
            padding:5px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?PHP  include "connection.php";
    $query0 = "SELECT * FROM setting"; 
    $result0 = mysqli_query($connection, $query0);
    if(mysqli_num_rows($result0) > 0){
        while($row = mysqli_fetch_array($result0)){
    ?>
    <div class="footer"><?PHP echo $row['footerdesc']; ?></div>
    <?PHP  }} ?>
</body>
</html>