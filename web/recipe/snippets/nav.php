<!-- 
    <div class="top-nav">
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <?php

        $navList = '<ul class="navbar-nav id=myLinks">';
        $navList .= "<li class='nav-item'><a href='/recipe/?action=default' class='nav-link active' >Home</a></li>";
        foreach ($db->query('SELECT * FROM category') as $row) {

            $navList .= "<li class='nav-item'><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' class='nav-link' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
        }
        $navList .= '</ul>';

        echo $navList;
        ?> -->

    </div> -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#home" class="active">Logo</a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>