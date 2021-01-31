<?php


function generateView($results, $images)
{

    $view = '';
    foreach ($results as $item) {

        //$image =  $_SESSION['image'];
        $view .= '<div>';
        $view .= "<form action=' index.php?action=addToCart&pId=$item[pId]&title=$item[title]&desc=$item[desc]&price=$item[price]&quan=$item[quan]&image=$item[image]' method=POST>";
        //$view .= "<form action='/web/week_3/view/browse.php?pId=$item[pId]&title=$item[title]&desc=$item[desc]&price=$item[price]&quan=$item[quan]&image=$item[image]' method=POST>"; 
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
        $view .= "<input type='submit' id=addme value='Add To Cart'> ";
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

function getTitle($buy_results)
{

    $buy_results['pId'] = $buy_results[0];
    //$buy_results['title'] = $buy_results[1];
    $title = "";

    foreach ($buy_results as $selected) {

        if ($selected['pId'] == 0) {
            echo $buy_results[1];
        }
        return $title;
    }
}

function getCartItems($buy_results){ 

 //ARRAY's to grab each sub array's data 
 $results = $_SESSION['results'];
 $arr_1 = $_SESSION['add_1'];
 $arr_2 = $_SESSION['add_2'];
 $arr_3 = $_SESSION['add_3'];
 $arr_4 = $_SESSION['add_4'];
 $arr_5 = $_SESSION['add_5'];
 $arr_6 = $_SESSION['add_6'];
 $arr_7 = $_SESSION['add_7'];
 $arr_8 = $_SESSION['add_8'];

 $_SESSION['info'] = array("1" => $arr_1, "2" => $arr_2, "3" => $arr_3, "4" => $arr_4, "5" => $arr_5, "6" => $arr_6, "7" => $arr_7, "8" => $arr_8);

echo "<pre>"; 
print_r($buy_results); 
echo "<pre>"; 

 
$buy_results["pId"] = $_SESSION['info']; 
$values = " "; 
  foreach ($buy_results as $values) {
    
   
    if ($buy_results["pId"] == '0') {
      echo "<li class='bullets'>" . $_SESSION['info']['1'] . "</li>";
    } elseif ($buy_results["pId"] == '1') {
      echo "<li class='bullets'>" . $_SESSION['info']['2'] . "</li>";
    } elseif ($buy_results["pId"]== '2') {
      echo "<li class='bullets'>" . $_SESSION['info'][2] . "</li>";
    } elseif ($buy_results["pId"]== '3') {
      echo "<li class='bullets'>" . $_SESSION['info'][3] . "</li>";
    } elseif ($buy_results["pId"]== '4') {
      echo "<li class='bullets'>" . $_SESSION['info'][4] . "</li>";
    } elseif ($buy_results["pId"]== '5') {
      echo "<li class='bullets'>" . $_SESSION['info'][5] . "</li>";
    } elseif ($buy_results["pId"] == '6') {
      echo "<li class='bullets'>" . $_SESSION['info'][6] . "</li>";
    } elseif ($buy_results["pId"] == '7') {
      echo "<li class='bullets'>" . $_SESSION['info'][7] . "</li>";
   
  }
}
  echo "</ul>"; 

} 