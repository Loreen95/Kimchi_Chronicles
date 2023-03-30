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
    GROUP_CONCAT(DISTINCT recipe_ingredients.amount, ' ', ingredients.name SEPARATOR ', ') AS ingredient_list,
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

    $result = $conn->prepare("INSERT INTO instructions (recipe_id, steps, steps_desc) VALUES (:recipe_id, :steps, 'none')");
    $result->bindParam(':recipe_id', $recipe['recipe_id']);
    $result->bindParam(':steps', $recipe['steps']);

    $result->execute();
    return $result;
}

function addRecipe($recipeName, $image, $duration, $course, $difficulty, $ingredients, $amounts, $steps)
{
    global $conn;
    // Puts the following data in the recipes table
    $sql = "INSERT INTO recipes (title, author, image, duration, course,  difficulty) VALUES (:title, :author, :image, :duration, :course, :difficulty)";
    $result = $conn->prepare($sql);
    $result->execute([
        ':title' => $recipeName,
        ':author' => $_SESSION['id'],
        ':image' => $image,
        ':duration' => $duration,
        ':course' => $course,
        ':difficulty' => $difficulty
    ]);

    // Get the ID of the newly inserted recipe
    $recipe_id = $conn->lastInsertId();

    // Insert ingredients and amounts into ingredients and recipe_ingredients tables
    $addedIngredients = [];
    for ($i = 0; $i < count($ingredients); $i++) {
        $ingredient = $ingredients[$i];
        $amount = $amounts[$i];

        // Check if ingredient or amount is empty
        if (empty($ingredient) || empty($amount)) {
            continue;
        }
        if (in_array($ingredient, $addedIngredients)) {
            // Get the ingredient id
            $result = $conn->prepare("SELECT id FROM ingredients WHERE name = ?");
            $result->execute([$ingredient]);
            $ingredient_id = $result->fetchColumn();
        } else {
            // Insert ingredient into ingredients table if it doesn't exist
            $result = $conn->prepare("INSERT IGNORE INTO ingredients (name) VALUES (?)");
            $result->execute([$ingredient]);

            // Get the ingredient id
            $result = $conn->prepare("SELECT id FROM ingredients WHERE name = ?");
            $result->execute([$ingredient]);
            $ingredient_id = $result->fetchColumn();

            // Insert ingredient and amount into recipe_ingredients table
            $result = $conn->prepare("INSERT INTO recipe_ingredients (recipe_id, ingredient_id, amount) VALUES (?, ?, ?)");
            $result->execute([$recipe_id, $ingredient_id, $amount]);
        }
        $addedSteps = [];
        for ($i = 0; $i < count($steps); $i++) {
            $step = $steps[$i];
            // Check if step is empty
            if (empty($step)) {
                continue;
            }

            // Check if step has already been added
            if (in_array($step, $addedSteps)) {
                continue;
            } else {
                $result = $conn->prepare("INSERT INTO instructions (recipe_id, steps) VALUES (?, ?)");
                $result->execute([$recipe_id, $step]);
            }

            return $result;
        }
    }
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
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}
