<?php


function generateView($results, $images)
{

    $view = '';
    foreach ($results as $item) {

        //$image =  $_SESSION['image'];
        $view .= '<div>';
        $view .= "<form action='index.php?action=addToCart&pId=$item[pId]&title=$item[title]&desc=$item[desc]&price=$item[price]&quan=$item[quan]&image=$item[image]' method=POST>";
        //$view .= "<form action='view/cart.php' method='POST'>";    
        $view .= "<div  class=item name='pId' value=$item[pId]>";
        $view .= "<input type='hidden' name=id value='$item[pId]'>";
        $view .= '<div class=image >';
        $view .= "<img class=images src=$item[image]/>";
        $view .= "<input type='hidden' name=image value=$item[image]>";
        $view .= '</div>';
        $view .= '<div class="description">';
        $view .= "<h3 class=title> $item[title] </h3>";
        $view .= "<input type=hidden name='title' value='$item[title]'>";
        $view .= "<span name=desc> $item[desc] </span>";
        $view .= "<input type='hidden' name=desc value='$item[desc]'>";
        $view .= '</div>';
        $view .= "<div class='quantity'>";
        //$view .= "<button type='button' id='add'><i class='far fa-plus-square'></i></button>"; 
        $view .= "<input type='hidden' name='quan' id='quan'>";
        $view .= "<input type='hidden' name='quan' value= '$item[quan]'>";
        //$view .= "<button type='button' id='minus'><i class='far fa-minus-square'></i></button>";
        $view .= '</div>';
        $view .= '<div id="addto">';
        $view .= "<input type='submit' name='submit' id=addme value='Add To Cart'> ";
        $view .= "<input type='hidden' name='action' value='addToCart'>"; 
        $view .= '</div>';
        $view .= "<div class=total-price>$item[price]</div>";
        $view .= "<input type='hidden' name='price' value=$item[price]>";
        $view .= "<input type='hidden' name=total  >";
        $view .= '</div>';
        $view .= '</div>';
        $view .= '</div>';
        $view .= '</form>';
    }

    return $view;
}





