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

    $result = $conn->prepare("SELECT * FROM recipes ORDER BY added ASC");
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

    // $result = $conn->prepare("SELECT *, author FROM recipe_ingredients AS author_id INNER JOIN recipes on recipe_id = recipes.id INNER JOIN ingredients on ingredient_id = ingredients.id WHERE recipes.id = ?");
    $result = $conn->prepare("SELECT *, recipes.author, CONCAT(users.first_name, ' ', users.last_name) AS author_name 
FROM recipe_ingredients 
INNER JOIN recipes ON recipe_id = recipes.id 
INNER JOIN ingredients ON ingredient_id = ingredients.id 
INNER JOIN users ON recipes.author = users.id 
INNER JOIN instructions ON recipes.id = instructions.recipe_id
WHERE recipes.id = ? LIMIT 1;");
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

function findUser($user)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $result->bindParam(':email', $user['email']);

    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);
}
