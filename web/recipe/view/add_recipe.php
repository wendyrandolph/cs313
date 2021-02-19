<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />

    <title>Add a Recipe</title>
</head>

<body>
    <header>

        <?php include '../recipe/snippets/header.php';
        ?>

        <nav class="navbar navbar-expand-lg navbar=light bg-light" id="page_nav">
            <?php include '../recipe/snippets/nav.php';
            ?>
        </nav>
    </header>

    <main>

        <form action="/recipe/?action=addRecipe" method="POST">
            <label>Which category does your recipe belong to : </label><br>
            <?php
            $data = getCategories($db); 
            $list = " "; 
           foreach($data as $rows){ 
               $list .= "<input type=radio class='input' name=category_id value='$rows[category_id]' required> $rows[category_name] " ; 
           }
           echo $list; 
            ?>


            <label>Recipe Name:</label><br>
            <input type="text" class="input" name="recipe_name" required> <br> <br>
            <label>Recipe Description:</label><br>
            <input type="text" name="recipe_desc" id="recipe_desc" required> <br><br>
            <label>Preheat Temp:</label>
            <input type="text" name="preheat_temp" id="preheat_temp"> <br><br>
            <label>Cook Time: </label>
            <input type="text" name="cook_time" id="cook_time"><br><br>
            <label> Ingredients : </label> <br><br>
            <p> Please enter your amount and ingredient separated by a comma </p> <br><br>
            <!-- <textarea type="checkbox" onclick="var input = document.getElementById('ingredient_name'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient... -->

            <textarea name="ingredients" > </textarea>
            <br><br>
          
            <br><br> 
            <label> Instructions : </label>
            <textarea name="instructions"></textarea>






            <input type="submit" value="Add Recipe" class="add_vehicle"><br><br>
            <!--Add the action name - value pair -->
            <input type="hidden" name="action" value="addRecipe">

        </form>


    </main>
</body>

</html>