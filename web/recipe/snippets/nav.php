
            <div class="container-fluid p-2">
            
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
                    $navList = '<ul class="navbar-nav">';

                    foreach ($db->query('SELECT * FROM category') as $row) {

                        $navList .= "<li class='nav-item'><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' class='nav-link' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
                    }
                    $navList .= '</ul>';
                }
                echo $navList;
                ?>


               
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Disabled for now" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
               
            </div>
