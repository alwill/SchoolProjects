<?php
      
include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING . ";dbname=test", DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function refine_query() {
    // Refines the search results. Gets all the form data from GET. Creates
    // an SQL command to perform. Returns the results in an array.
    global $con;
    try {
        $sql = "SELECT * FROM `titles` WHERE `TITLE` REGEXP (:title) "; 
        if (isset($_GET['netflix']))
            $sql .= "AND `NETFLIX` = 1 ";
        if (isset($_GET['prime']))
            $sql .= "AND `PRIME` = 1 ";
        if (isset($_GET['type']))
            $sql .= "AND `TYPE` REGEXP (:type)";
        $sql = $con->prepare($sql);       
        $sql->bindParam(':title', $_GET['title']);
        if (isset($_GET['type']))
            $sql->bindParam(':type', $_GET['type']);
        $sql->execute();
        return $sql->fetchAll();
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

function query_title() {
    // Gets the title data from GET. Creates an SQL command to perform. Returns
    // the results in an array.
    global $con;
    try {
        // input not being sanitized
        $sql = $con->prepare("SELECT * FROM `titles` WHERE `TITLE` REGEXP (:title)");
        $sql->bindParam(':title', $_GET['title']);
        $sql->execute();
        return $sql->fetchAll();            
    } catch(PDOException $e) {
        echo  $e->getMessage();
    }
}

function build_table($results) {
    $title = $_GET['title'];
    $table = '<h3 class="page-header">Displaying Results for: "' . $title . '"</h3>';
    $table .= '<table class="table table-striped">
                    <thead>
                        <th scope="col">Title</th>
                        <th scope="col">Network</th>
                        <th scope="col">Netflix</th>
                        <th scope="col">Prime</th>
                    </thead>
                    <tbody>';
    foreach($results as $result){
        $table .= '<tr>
                        <td> ' . " <a href=\"../pages/info.php?title=$result[0]\">$result[0] " . '</td>
                        <td> NBC ' /* . $result[9] . */ . ' </td>
                        <td> ' . ($result[5] == 1 ? 'Yes' : 'No') . ' </td>
                        <td> ' . ($result[6] == 1 ? 'Yes' : 'No') . ' </td>
                    </td>';
    }
    $table .= '    </tbody>
                </table>';
    echo $table;
}
?>