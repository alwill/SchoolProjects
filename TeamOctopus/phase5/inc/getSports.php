<?php

include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}


$sql="SELECT * FROM sports WHERE sport = (:sport)";
$sql = $con->prepare($sql);
$sql->bindParam(':sport',$_GET['sport']);
$sql->execute();

echo '<table class="table table-striped">
<tr>
<th>Team</th>
<th>vs</th>
<th>Team</th>
<th>Score</th>
<th>Time</th>
</tr>';
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