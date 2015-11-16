<?php
/**
 * Created by PhpStorm.
 * User: AlexWill
 * Date: 11/11/15
 * Time: 4:14 PM
 */

//getting the database ready
include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['comment']))
    postComment($_POST['comment']);

if(isset($_POST['refresh'])) 
    buildCommentSection(getComments());

//builing the favorite sports table
function buildFavSportTable()
{
    global $con;
    $sql="SELECT * FROM sports WHERE TEAM_1 in ('cardinals','rams','blues') OR TEAM_2 in ('cardinals','rams','blues')";
    $caption = "Favorite Teams playing Today";

    $sql = $con->prepare($sql);
    $sql->bindParam(':sport',$_GET['sport']);
    $sql->execute();

    echo "<table class='table table-striped'>
<caption>$caption</caption>
<tr>
<th>Team</th>
<th>vs</th>
<th>Team</th>
<th>Score</th>
<th>Time</th>
<th>Sport</th>
</tr>";
    foreach($sql->fetchAll() as $row){
        echo "<tr>";
        echo "<td>" . $row['TEAM_1'] . "</td>";
        echo "<td>@</td>";
        echo "<td>" . $row['TEAM_2'] . "</td>";
        echo "<td>" . $row['SCORE'] . "</td>";
        echo "<td>" . $row['TIME'] . "</td>";
        echo "<td>" . $row['SPORT'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $sql->closeCursor();

}

//getting comments for games
function getComments()
{
    global $con;
    $sql = "SELECT * FROM sports_comments ORDER BY ID DESC LIMIT 15";
    $sql = $con->prepare($sql);
    $sql->execute();

    return $sql->fetchAll();

}

//posting a comment to the sports
function postComment($comment)
{
    session_start();
    global $con;
    try {
        $sql = "INSERT INTO `sports_comments` (`ID`, `USER`, `COMMENT`) VALUES (NULL, :user, :comment)";
        $sql = $con->prepare($sql);
        $sql->bindParam(':user', $_SESSION['username']);
        $sql->bindParam(':comment', $comment);
        $sql->execute();
    } catch(PDOException $e) {
        echo $e;
        return;
    }
    buildCommentSection(getComments());
}

//building a list of comments
function buildCommentSection($comments) {
    $commentSection = "";
    if(is_array($comments) || is_object($comments)){
        foreach($comments as $comment) {
            $commentSection .= "<h4>$comment[1]</h4>\n
                                <p class=\"well\">$comment[2]</p>\n";
        }
    }
    echo $commentSection;
}