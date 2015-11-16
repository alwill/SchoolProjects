<?php

include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function buildTopShowsTable()
{
    global $con;
    $sql="SELECT a.* FROM titles a, comments b where a.type = 'tv_series' and a.NETFLIX = '0' and a.PRIME = '0' and a.TITLE = b.Title group by a.Title order by Count(b.title) desc";
    $caption = "Trending Shows Today";

    $sql = $con->prepare($sql);
    $sql->execute();

    echo "<table class='table table-striped'>
<caption>$caption</caption>
<tr>
<th>Title</th>
<th>Rating</th>
<th>Network</th>
<th>Time</th>
<th>Runtime (minutes)</th>
<th>Parental Guide</th>
</tr>";
    foreach($sql->fetchAll() as $row){
        echo "<tr>";
        echo "<td>" ."<a href = '/phase5/pages/info.php?id= " . $row['ID']. " '>" . $row['TITLE'] . "</td>";
        echo "<td>" . $row['RATING'] .  "/10" . "</td>";
        echo "<td>" . $row['NETWORK'] . "</td>";
        echo "<td>" . date("h:i A",strtotime($row['TIME'])) . "</td>";
        echo "<td>" . $row['RUNTIME'] . "</td>";
        echo "<td>" . $row['PARENTAL_GUIDE'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $sql->closeCursor();
}

function buildTopNetflix()
{
    global $con;
    $sql="SELECT * FROM titles a, comments b where a.type = 'tv_series' and a.NETFLIX = '1' and a.PRIME = '0' and a.TITLE = b.Title group by a.Title order by Count(b.title) desc";
    $caption = "Trending Shows on Netflix";

    $sql = $con->prepare($sql);
    $sql->execute();

    echo "<table class='table table-striped'>
<caption>$caption</caption>
<tr>
<th>Title</th>
<th>Rating</th>
<th>Runtime (minutes)</th>
<th>Parental Guide</th>
</tr>";
    foreach($sql->fetchAll() as $row){
        echo "<tr>";
        echo "<td>" ."<a href = '/phase5/pages/info.php?id= " . $row['ID']. " '>" . $row['TITLE'] . "</td>";
        echo "<td>" . $row['RATING'] . "/10" . "</td>";
        echo "<td>" . $row['RUNTIME'] . "</td>";
        echo "<td>" . $row['PARENTAL_GUIDE'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $sql->closeCursor();
}


function buildTopPrime()
{
    global $con;
    $sql="SELECT * FROM titles a, comments b where a.type = 'tv_series' and a.NETFLIX = '0' and a.PRIME = '1' and a.TITLE = b.Title group by a.Title order by Count(b.title) desc";
    $caption = "Trending Shows on Prime";

    $sql = $con->prepare($sql);
    $sql->execute();

    echo "<table class='table table-striped'>
<caption>$caption</caption>
<tr>
<th>Title</th>
<th>Rating</th>
<th>Runtime (minutes)</th>
<th>Parental Guide</th>
</tr>";
    foreach($sql->fetchAll() as $row){
        echo "<tr>";
        echo "<td>" ."<a href = '/phase5/pages/info.php?id= " . $row['ID']. " '>" . $row['TITLE'] . "</td>";
        echo "<td>" . $row['RATING'] .  "/10" .  "</td>";
        echo "<td>" . $row['RUNTIME'] . "</td>";
        echo "<td>" . $row['PARENTAL_GUIDE'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $sql->closeCursor();
}