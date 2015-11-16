<?php

//gets database ready
include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

//getting sports based on whether or not the game is currently going on
$param = $_GET['sport'];
if($param == "current"){
    $sql="SELECT * FROM sports WHERE time <> 'final'";
    $caption = "Games currently airing";
}else {
    $sql = "SELECT * FROM sports WHERE sport = (:sport)";
    $caption = $param;
}
$sql = $con->prepare($sql);
$sql->bindParam(':sport',$_GET['sport']);
$sql->execute();

//create table for the sports
echo "<table class='table table-striped'>
<caption>$caption</caption>
<tr>
<th>Team</th>
<th>vs</th>
<th>Team</th>
<th>Score</th>
<th>Time</th>

</tr>";
foreach($sql->fetchAll() as $row){
    echo "<tr>";
    echo "<td>" . $row['TEAM_1'] . "</td>";
    echo "<td>@</td>";
    echo "<td>" . $row['TEAM_2'] . "</td>";
    echo "<td>" . $row['SCORE'] . "</td>";
    echo "<td>" . $row['TIME'] . "</td>";

    echo "</tr>";
}
echo "</table>";
$sql->closeCursor();


?>