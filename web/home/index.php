<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link rel="stylesheet" type="text/css" href="/web/css/styles.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/web/css/nav.css" media="screen" />
</head>
<body>
    
<header id="page-header">
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/header.php'; ?>
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/nav.php'; ?>
        </nav>
    </header>
<main> 
<div class="wrapper"> 
    <div class="grid"> 
<img class="about" src=" /web/images/img_2020_1.optim (2).jpg" id="aboutme"> 
<div id="details"> 
<h3> I'm a Web Developer, who's constantly evolving. </h3>
<p> 
I'm a developer that spends more time than I should creating webpages and
working on the visual presentation of how an app or webpage appears. <br><br>

Photography is also a passion, and from that I started to see the world and the things around me in a completely different way. 
<br><br> 
I'm 42, live in Utah, and I'm the mother to 6 children ages 9 - 21. 
Attending BYUI and working towards my Bachelors Degree in Applied Tech.  
<br><br>
Anticipated graduation date:  April 2022.  
</p> 
<h3> Knowledge & Current skills </h3> 
<div id="skills"> 
<ul id="skills_1"> 
    <li class="skills"> html</li> 
    <li class="skills"> css</li> 
    <li class="skills"> javascript </li> 
    <li class="skills"> sass </li> 
    <li class="skills"> php </li> 
    <li class="skills"> mysql </li> 
</ul> 
</div> 
</div> 
</div>
</div> 

</main>
<footer> 
    <div class="footer">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/web/snippets/footer.php'; ?> 
    </div>
</footer>
</body>
</html>