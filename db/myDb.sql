DROP TABLE category; 

CREATE TABLE category ( 
category_id SERIAL PRIMARY KEY
, category_name VARCHAR(45) NOT NULL
); 


DROP TABLE recipes; 

CREATE TABLE recipes ( 
recipe_id SERIAL PRIMARY KEY
, recipe_name VARCHAR(100) NOT NULL   
, category_id INT NOT NULL 
, preheat_temp VARCHAR(45)
, cook_time VARCHAR(45) 
, ingredients VARCHAR(255) NOT NULL
, FOREIGN KEY (category_id) 
REFERENCES category (category_id)
);  


DROP TABLE recipe_steps; 

CREATE TABLE recipe_steps ( 
step_number_id SERIAL PRIMARY KEY 
, instructions VARCHAR NOT NULL 
, recipe_id INT NOT NULL 
, FOREIGN KEY (recipe_id) 
REFERENCES recipes (recipe_id)
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








