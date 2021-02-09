<?php




function searchBook($text, $db)
{
    $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:text');
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $details = " ";
    foreach ($rows as $row) {

        $details .= '<b>' . '<a href="../week_6/?action=details&id=$row[id]>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - 
    
    
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

function checkboxes($db)
{
    $stmt = $db->prepare('SELECT * FROM TOPIC');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results = " ";
    foreach ($rows as $row) {
        $results .=  " {$row['name']}  <input type='checkbox' name='name' value='<?php echo $row[name] ?>'><br>";
    }
    return $results;
}

function addScripture($db, $book, $chapter, $verse, $content, $name, $id)
{

    $sql = 'UPDATE scriptures 
SET book = :book
, chapter = :chapter
, verse = :verse 
, content = :content 
, topic = :topic 
WHERE id = :id;  ';

    $stmt = $db->prepare($sql);
    //Next six lines replace the placeholders with the values from the form 
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_STR);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    //Insert the data
    $stmt->execute();
    //Ask how many rows changed asa result of our insert
    $rowsChanged = $stmt->rowCount();

    return $rowsChanged;
}
