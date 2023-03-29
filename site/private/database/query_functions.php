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
    $result = $conn->prepare("SELECT *,
    recipes.author, CONCAT(users.first_name, ' ', users.last_name) AS author_name,
    GROUP_CONCAT(DISTINCT ingredients.name SEPARATOR ', ') AS ingredient_list,
    GROUP_CONCAT(DISTINCT instructions.steps ORDER BY instructions.steps_desc SEPARATOR ';') AS instruction_list
FROM 
    recipe_ingredients 
    INNER JOIN recipes ON recipe_id = recipes.id 
    INNER JOIN users ON recipes.author = users.id 
    INNER JOIN (
        SELECT DISTINCT 
            instructions.recipe_id,
            instructions.steps_desc,
            instructions.steps
        FROM 
            instructions
    ) AS instructions ON recipes.id = instructions.recipe_id
    INNER JOIN ingredients ON ingredient_id = ingredients.id 
WHERE 
    recipes.id = ?
GROUP BY 
    recipes.id 
LIMIT 1");

    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    // var_dump($result->fetchAll());
    // die;
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

function addInstructions($recipe)
{
    global $conn;

    $result = $conn->prepare("INSERT INTO instructions (steps, steps_desc) VALUES (:steps, 'none')");
    $result->bindParam(':steps', $recipe['steps']);

    $result->execute();
    return $result;
}

function addIngredient($ingredient)
{
    global $conn;

    $result = $conn->prepare("INSERT INTO ingredients (name) VALUES (:name)");
    $result->bindParam(':name', $ingredient['name']);

    $result->execute();
    return $result;
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
