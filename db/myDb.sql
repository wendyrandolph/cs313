DROP TABLE category; 

CREATE TABLE category ( 
category_id SERIAL PRIMARY KEY
, category_name VARCHAR(45) NOT NULL
); 

DROP TABLE contributor;

CREATE TABLE contributor (
  contributor_id SERIAL PRIMARY KEY,
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL
  );


DROP TABLE recipes; 

CREATE TABLE recipes ( 
recipe_id SERIAL PRIMARY KEY
, recipe_name VARCHAR(100) NOT NULL  
, recipe_desc VARCHAR(100)  
, category_id INT NOT NULL 
, date_added DATE NOT NULL 
, contributor_id INT NOT NULL 
, FOREIGN KEY (category_id) 
REFERENCES category (category_id)
, FOREIGN KEY (contributor_id) 
REFERENCES contributor (contributor_id)
);  



DROP TABLE recipe_amounts; 

CREATE TABLE recipe_amounts ( 
amount_id SERIAL PRIMARY KEY
, amount_required VARCHAR(100) NOT NULL 
); 

DROP TABLE ingredients; 

CREATE TABLE ingredients ( 
ingredients_id SERIAL PRIMARY KEY 
, ingredient_name VARCHAR NOT NULL
); 


DROP TABLE recipe_steps; 

CREATE TABLE recipe_steps ( 
step_number SERIAL PRIMARY KEY 
, instructions VARCHAR NOT NULL 
, recipe_id INT NOT NULL 
, amount_id INT NOT NULL 
, ingredients_id INT NOT NULL
, FOREIGN KEY (recipe_id) 
REFERENCES recipes (recipe_id)
, FOREIGN KEY (amount_id)
REFERENCES recipe_amounts (amount_id)
, FOREIGN KEY (ingredients_id) 
REFERENCES ingredients (ingredients_id)
); 




DROP TABLE recipe_index; 

CREATE TABLE recipe_index ( 
recipe_index_id SERIAL PRIMARY KEY
, recipe_id INT NOT NULL  
, recipe_name VARCHAR NOT NULL
, category_id INT NOT NULL 
, FOREIGN KEY (recipe_id)
REFERENCES recipes (recipe_id) 
, FOREIGN KEY (category_id) 
REFERENCES category (category_id)
); 




INSERT INTO category (category_name) 
VALUES 
( 'Main Dishes')
, ('Appetizers and Sides')
, ('Breads')
, ('Salads')
, ('Desserts')
, ('Beverages'); 


SELECT index_id, recipe_name, category_id,  FROM index 
WHERE category_id=:id'


INSERT INTO contributor (first_name, last_name) 
VALUES ( 
'Wendy' 
,'Randolph' 
); 


INSERT INTO recipes (recipe_name, recipe_desc, category_id, date_added, contributor_id) 
VALUES ( 
'BowTie Chicken' 
, 'Yummy & Quick Dinner Idea' 
, (SELECT category_id FROM category WHERE category_name = 'Main Dishes')
, CURRENT_DATE
, (SELECT contributor_id FROM contributor WHERE first_name = 'Wendy' and last_name = 'Randolph')
);  




INSERT INTO ingredients (ingredient_name)
VALUES(
'BowTie Pasta'
 );

INSERT INTO ingredients (ingredient_name)
VALUES(
'Boneless Chicken Breasts'
 );

INSERT INTO ingredients (ingredient_name)
VALUES(
'Corn'
 );

INSERT INTO ingredients (ingredient_name)
VALUES(
'Italian Salad Dressing'
 );

INSERT INTO recipe_amounts (amount_required) 
VALUES( 
 '1 lb'
);  

INSERT INTO recipe_amounts (amount_required) 
VALUES( 
'3' 
); 

INSERT INTO recipe_amounts (amount_required) 
VALUES( 
'1 can' 
); 

INSERT INTO recipe_amounts (amount_required) 
VALUES( 
'1/2 - 3/4 bottle' 
); 
	

INSERT INTO recipe_steps (instructions, recipe_id, amount_id, ingredients_id) 
VALUES( 
'Cook Pasta according to package directions.' 
, (SELECT recipe_id FROM recipes WHERE recipe_name = 'BowTie Chicken')
, (SELECT amount_id FROM recipe_amounts WHERE amount_id = '1')  
, (SELECT ingredients_id FROM ingredients WHERE ingredients_id = '1') 
); 

INSERT INTO recipe_steps (instructions, recipe_id, amount_id, ingredients_id) 
VALUES( 
'Cut up and cook chicken in a frying pan.' 
, (SELECT recipe_id FROM recipes WHERE recipe_name = 'BowTie Chicken')
, (SELECT amount_id FROM recipe_amounts WHERE amount_id = '2')  
, (SELECT ingredients_id FROM ingredients WHERE ingredients_id = '2') 
); 

INSERT INTO recipe_steps (instructions, recipe_id, amount_id, ingredients_id) 
VALUES( 
'When cooked add the corn.' 
, (SELECT recipe_id FROM recipes WHERE recipe_name = 'BowTie Chicken')
, (SELECT amount_id FROM recipe_amounts WHERE amount_id = '3')  
, (SELECT ingredients_id FROM ingredients WHERE ingredients_id = '3')
); 

INSERT INTO recipe_steps (instructions, recipe_id, amount_id, ingredients_id) 
VALUES( 
'Drain the pasta, and add noodles to the chicken in a pot big enough to hold it, (probably the same pot used to boil the pasta).' 
, (SELECT recipe_id FROM recipes WHERE recipe_name = 'BowTie Chicken')
, (SELECT amount_id FROM recipe_amounts WHERE amount_id = '4')  
, (SELECT ingredients_id FROM ingredients WHERE ingredients_id = '4')
); 

INSERT INTO recipe_steps (instructions, recipe_id, amount_id, ingredients_id) 
VALUES( 
'Pour the Italian dressing onto the food, and mix. Cook till heated thoroughly. ).' 
, (SELECT recipe_id FROM recipes WHERE recipe_name = 'BowTie Chicken')
, (SELECT amount_id FROM recipe_amounts WHERE amount_id = '4')  
, (SELECT ingredients_id FROM ingredients WHERE ingredients_id = '4')
);

INSERT INTO recipe_index  (recipe_id, recipe_name, category_id)
VALUES(
(SELECT recipe_id FROM recipes WHERE recipe_id = '1')
,'BowTie Pasta'
,(SELECT category_id FROM category WHERE category_id = '1')   
); 


INSERT INTO recipe_index(recipe_id, recipe_name, category_id)
VALUES(
(SELECT recipe_id FROM recipes WHERE recipe_name = 'BowTie Chicken') 
, 'BowTie Chicken'
, (SELECT category_id FROM category WHERE category_name = 'Main Dishes')
);