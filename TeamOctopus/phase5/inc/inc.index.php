<?php
date_default_timezone_set("America/Chicago");
include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function getTrendingTitles(){
    global $con;
    try {
        /*
            Gets the number of comments for each title with comments.
            Takes that number, calls it "hot". Groups that number with their related title
            Orders the titles by their "hot" factor in desending order. Greatest to smallest.
            Limits the result by 5. 
            I.E. Top 5 most commented shows in the database.
        */
        $sql = "SELECT `title`, COUNT(`title`), `title_id` AS hot FROM `comments` GROUP BY `title` ORDER BY hot DESC LIMIT 5";
        $sql = $con->prepare($sql);
        $sql->execute();
        buildTrendingList($sql->fetchAll());
    } catch (PDOException $e) {
        echo $e;
    }
}

function buildTrendingList($titles) {
    foreach($titles as $title){
        $num = rand(1, 20);
        echo "<div class=\"panel-body\">\n
                    <p><a href=\"/phase5/pages/info.php?id=$title[2]\"><img class=\"img-rounded\" src=\"images/trending_$num.jpg\">
                    &nbsp;&nbsp;&nbsp; $title[0]</a></p>\n
              </div>\n";
    }
}

function getRecentComments() {
    global $con;
    try {
        $sql = "SELECT `comment`, username, `id`, `title`, `title_id` FROM `comments` ORDER BY `id` DESC LIMIT 3";
        $sql = $con->prepare($sql);
        $sql->execute();
        buildRecentComments($sql->fetchAll());
    } catch (PDOException $e) {
        echo $e;
    }
}

function buildRecentComments($comments) {
    foreach($comments as $comment){
        echo "<div class=\"panel-body\">\n
                    <p>$comment[1] on <a href=\"/phase5/pages/info.php?id=$comment[4]\">$comment[3]</a></p>\n
                    <p class=\"well\">$comment[0]</p>\n
              </div>\n";
    }
}

function getTitle($network, $time){
global $con;
    try {
        $sql = "SELECT * FROM `titles` WHERE network = :network AND time = :time";
        $sql = $con->prepare($sql);
        $time = convertTime($time);
        $time = $time . ":00";
        $sql->bindParam(":time", $time);
        $sql->bindParam(":network", $network);
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $e) {
        echo $e;
    }
}

function buildRow($network){
    $offset = 0;
    $i = 0;
    while($i < 7){
        $currentTitle = getTitle($network, get_time($offset));
        if (count($currentTitle) == 0){
            echo ' <td colspan="1">Local Programming</td> ';
            $collumns =1;
            $offset += 30;
        }
        else{
            $collumns = (int)($currentTitle[0]['RUNTIME'] /30);
            if($i+$collumns > 7 ){
                $collumns = 2;
            }
            else if ($i+$collumns == 7){
                $collumns += 1;
            }
            echo ' <td colspan="'. $collumns.'"><a href = "/phase5/pages/info.php?id= ' . $currentTitle[0]['ID']. '">' . $currentTitle[0]['TITLE'] . '</td> ';
            $offset += $currentTitle[0]['RUNTIME'] ;
        }
        $i += $collumns;
        
    }
}

function convertTime($time){
    return date("H:i", strtotime($time));
}

function get_time($offset){
    /*
        Plan is to somehow use offset to add 30 minutes per offset
        Not sure how to do that, or if that method would be best.
    */
    $hours = date('h');
    $minutes = (date('i') > 30) ? '30' : '00';
    $minutes = $minutes + $offset;
    if($minutes >= 60){
        $hours = $hours +(int)($minutes/60);
        $minutes = $minutes % 60;
    }
    $minutes = ($minutes==0) ? '00' : $minutes;
    return "$hours:$minutes" . date('A');
}

function build_guide(){
    /*
        This builds the guide. Currently using hardcoded data. 
        Not sure how to go about this.
    */

    $offset = 0;
    echo '
    <div>
            <h3 class="page-header">What\'s Currently On?</h3>
            <table class="table table-striped">
                <thead>
                    <th class="col-md-3" scope="col"><a href="#">&#9664;</a></th>';

    for($i=0; $i<7; $i++){
        echo '<th scope="col">' . get_time($offset) . '</th>';
        $offset = $offset+30;
    }



    echo '
                <th scope="col"><a href="#">&#9654;</a></th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>CBS</strong>
                            <span class="show h6">Channel 2</span>
                        </td>
                        ';
buildRow('CBS');
    echo'
                    </tr>
                    <tr>
                        <td>
                            <strong>ABC</strong>
                            <span class="show h6">Channel 30</span>
                        </td>';

 buildRow('ABC');                   
    echo'
                    </tr>
                    <tr>
                        <td>
                            <strong>NBC</strong>
                            <span class="show h6">Channel 5</span>
                        </td>';
buildRow('NBC');
echo'
                    </tr>
                    <tr>
                        <td>
                            <strong>FOX</strong>
                            <span class="show h6">Channel 4</span>
                        </td>';
buildRow('FOX');
echo'
                    </tr>
                    <tr>
                        <td>
                            <strong>PBS</strong>
                            <span class="show h6">Channel 11</span>
                        </td>';
buildRow('PBS');
echo'
                    </tr>
                </tbody>
            </table>
        </div>
        ';
}
