<div class="container-fluid p-2">
    <?php
    $navList = '<ul class="navbar-nav">';
 $navList .= "<li class='nav-item'><a href='/recipe/?action=default'>Home</a></li>"; 
    foreach ($db->query('SELECT * FROM category') as $row) {

        $navList .= "<li class='nav-item'><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' class='nav-link' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
    }
    $navList .= '</ul>';

    echo $navList; 
    ?>


</div>