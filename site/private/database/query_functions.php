<?php

function allUsers()
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM users");
    $result->execute();

    $result->setFetchMode(PDO::FETCH_ASSOC);
    return $result->fetchAll();
}


function allRecipes()
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM recipes");
    $result->execute();

    return $result->fetchAll();
}

function recentAdd()
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM recipes ORDER BY added DESC LIMIT 8");
    $result->execute();

    return $result->fetchAll();
}
function allIngredients()
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM ingredients ORDER BY name ASC");
    $result->execute();

    return $result->fetchAll();
}

function findRecipe($id)
{
    global $conn;
    // Selecteert alles en combineerd first_name en last_name van users tabel.
    // Ingredients name en amount worden als groep distinct gecombineerd, zodat ze maar een keer voorkomen bij de weergave.
    // Inner join de bestaande tabellen om alle nodige gegevens op te kunnen zoeken en weer te geven in de recipe.php pagina.
    $result = $conn->prepare("SELECT *,
    CONCAT(users.first_name, ' ', users.last_name) AS author_name,
    GROUP_CONCAT(DISTINCT CONCAT_WS(' ', ingredients.name, recipe_ingredients.amount) SEPARATOR ', ') AS ingredient_list,
    GROUP_CONCAT(DISTINCT instructions.steps ORDER BY instructions.steps_id SEPARATOR '; ') AS instruction_list
FROM 
    recipes
    INNER JOIN users ON users.id = recipes.author
    INNER JOIN recipe_ingredients ON recipe_ingredients.recipe_id = recipes.id
    INNER JOIN ingredients ON ingredients.id = recipe_ingredients.ingredient_id
    INNER JOIN instructions ON instructions.recipe_id = recipes.id
WHERE 
    recipes.id = ?
GROUP BY 
    recipes.id
LIMIT 1");

    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function addUser($user)
{
    global $conn;

    $result = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, 'user')");
    $result->bindParam(':first_name', $user['firstname']);
    $result->bindParam(':last_name', $user['lastname']);
    $result->bindParam(':email', $user['email']);
    $result->bindParam(':password', $user['password']);

    $result->execute();
    return $result;
}

function addInstructions($step)
{
    global $conn;

    $result = $conn->prepare("INSERT INTO instructions (recipe_id, steps) VALUES (:recipe, :steps)");
    $result->bindParam(':recipe', $step['recipe_id']);
    $result->bindParam(':steps', $step['steps']);

    $result->execute();
    return $result;
}

function addIngredient($ingredients)
{
    global $conn;
    $recipe_id = $conn->lastInsertId();

    foreach ($ingredients as $ingredient) {
        $name = $ingredient['name'];
        $result = $conn->prepare("INSERT INTO ingredients (name) VALUES (?)");
        $result->execute([$name]);
        
        $ingredient_id = $conn->lastInsertId();

        $amount = $ingredient['amount'];
        $result = $conn->prepare("INSERT INTO recipe_ingredients (recipe_id, ingredient_id, amount) VALUES (?, ?, ?)");
        $result->execute([$recipe_id, $ingredient_id, $amount]);

        return $result;
    }

    // Return the recipe ID
    return $recipe_id;
}

function addRecipe($recipe)
{
    global $conn;

    $result = $conn->prepare("INSERT INTO recipes (title, author, image, duration, course, difficulty, added) VALUES (:title, :author, :image, :duration, :course, :difficulty, CURRENT_DATE())");
    $result->bindParam(':title', $recipe['title']);
    $result->bindParam(':author', $recipe['author']);
    $result->bindParam(':image', $recipe['image']);
    $result->bindParam(':duration', $recipe['duration']);
    $result->bindParam(':course', $recipe['course']);
    $result->bindParam(':difficulty', $recipe['difficulty']);

    $result->execute();

    return $result;
}

function findUserByID($id)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function loginUser($user)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $result->bindParam(':email', $user['email']);

    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);
}

function totalEntries()
{
    global $conn;
    
    $result = $conn->prepare("SELECT COUNT(*) AS total_entries FROM recipes");
    $result->execute();

    return $result->fetchAll();
}