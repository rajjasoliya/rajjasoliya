<?PHP  include "connection.php";

session_start();
session_unset();
session_destroy();
header("Location:http://localhost/newsofgujarat.com/admin/users");

?>