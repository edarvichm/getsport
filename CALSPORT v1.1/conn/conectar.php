<?php 
//$conn=mysql_connect("localhost","root","dlasociados");

$user_name = "root";
$password = "dlasociados";
$database = "CALSPORT";
$server = "localhost";

$conn = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $conn);

/*if ($db_found) {

$SQL = "SELECT * FROM tb_address_book";
$result = mysql_query($SQL);

while ( $db_field = mysql_fetch_assoc($result) ) {

print $db_field['ID'] . "<BR>";
print $db_field['First_Name'] . "<BR>";
print $db_field['Surname'] . "<BR>";
print $db_field['Address'] . "<BR>";

}

mysql_close($conn);

}
else {

print "Database NOT Found ";
mysql_close($db_handle);

}*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>