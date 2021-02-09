<?php




function searchBook($text, $db)
{
    $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:text');
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
    $stmt = $db->prepare('SELECT book, chapter, verse, content FROM scriptures WHERE id=:id');
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
    foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row) {
        $scripture_list .= '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br><br>';
    }
    
}return $scripture_list;

?>
