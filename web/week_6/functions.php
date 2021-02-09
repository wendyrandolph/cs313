<?php


function dbConnect()
{

    try {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"], '/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    return $db;
}


function searchBook($text, $db)
{
    $stmt = $db->prepare('SELECT * FROM Scriptures WHERE book=:text');
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $details = " ";
    foreach ($rows as $row) {

        $details .= '<b>' . '<a href="../week_6/?action=display&id=$row[id]>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - 
    
    
    <br><br>';
    }
    return $details;
}



function details($id, $db)
{
    $stmt = $db->prepare('SELECT book, chapter, verse, content FROM Scriptures WHERE id=:id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results = " ";
    foreach ($rows as $row) {
        $results .= '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br><br>';
    }
    return $results;
}

function listScriptures($db)
{
    $scripture_list = " ";
    foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row) {
        $scripture_list .= '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br><br>';
    }
    return $scripture_list;
}

?>
