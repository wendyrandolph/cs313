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

    <form action="/recipe/index.php" method="post">
            <label>Which category does your recipe belong to : </label><br>
            <?php echo $list ?> <br><br>
            <input type="hidden" name="category_id" for=$list value=" <?php if (isset($list['category_id'])) {
                                                                echo $list['category_id'];
                                                            } ?> ">
            <br>
            <label>Recipe Name:</label><br>
            <input type="text" class="input" name="recipe_name" required> <br> <br>
            <label>Recipe Description:</label><br>
            <input type="text" name="recipe_desc" id="recipe_desc" required> <br><br>
            <label> Who deserves credit for this recipe </label> 
            <?php echo $cont_Id ?> <br><br>
            
            <label>Preheat Temp:</label>
            <input type="text" name="preheat_temp" id="preheat_temp" > <br><br>
            <label>Cook Time: </label>
            <input type="text" name="cook_time" id="cook_time" >
            <label> Ingredients : </label> <br><br>
            <p> Please select each box needed to enter in each ingredient. </p> <br><br>
            <input type="checkbox" onclick="var input = document.getElementById('ingredient_name'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient...
            <input id="ingredient_name" name="ingredient_name" disabled="disabled" placeholder="ingredient" />
            <input id="required_amount" name="required_amount" disabled="disabled" placeholder="required_amount" />
            <br><br>
            <input type="checkbox" onclick="var input = document.getElementById('ingredient_name_2'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount_2');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient...
            <input id="ingredient_name_2" name="ingredient_name_2" disabled="disabled" placeholder="ingredient" />
            <input id="required_amount_2" name="required_amount_2" disabled="disabled" placeholder="required_amount" />
            
           <br><br>
            <input type="checkbox" onclick="var input = document.getElementById('ingredient_name_3'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount_3');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient...
            <input id="ingredient_name_3" name="ingredient_name_3" disabled="disabled" placeholder="ingredient" />
            <input id="required_amount_3" name="required_amount_3" disabled="disabled" placeholder="required_amount" />
            
            <br><br>
            <input type="checkbox" onclick="var input = document.getElementById('ingredient_name_4'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount_4');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient...
            <input id="ingredient_name_4" name="ingredient_name_4" disabled="disabled" placeholder="ingredient" />
            <input id="required_amount_4" name="required_amount_4" disabled="disabled" placeholder="required_amount" />
            <br><br>
            <input type="checkbox" onclick="var input = document.getElementById('ingredient_name_5'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount_5');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient...
            <input id="ingredient_name_5" name="ingredient_name_5" disabled="disabled" placeholder="ingredient" />
            <input id="required_amount_5" name="required_amount_5" disabled="disabled" placeholder="required_amount" />
            <br><br>
            <input type="checkbox" onclick="var input = document.getElementById('ingredient_name_6'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;} 
                                            var input = document.getElementById('required_amount_6');  if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Ingredient...
            <input id="ingredient_name_6" name="ingredient_name_6" disabled="disabled" placeholder="ingredient" />
            <input id="required_amount_6 name="required_amount_6" disabled="disabled" placeholder="required_amount" />
            <br><br>
           <label> Instructions : </label>
           <textarea name=""></textarea>






            <input type="submit" value="Add Recipe" class="add_vehicle"><br><br>
            <!--Add the action name - value pair -->
            <input type="hidden" name="action" value="addRecipe">

        </form>


    </main>
</body>

</html>