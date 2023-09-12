<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "live_search";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn) {
    echo "";
} else {
    echo "failed";
}

$search_value = $_POST['searchdata'];
$query = "select * from search_table where id like '%$search_value%' or name like '%$search_value%' or class like '%$search_value%' or mobile_no like '%$search_value%'";

 $result = mysqli_query($conn, $query);
 $record = "";
 foreach ($result as $row) {
    $record .= "<tr>
    <td>$row[id] </td>
    <td>$row[name] </td>
    <td>$row[class] </td>
    <td>$row[mobile_no]</td>

</tr>";

 }
 echo $record;


    ?>