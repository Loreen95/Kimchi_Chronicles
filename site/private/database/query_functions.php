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

function addUser($user, $hashed_password)
{
    global $conn;

    $result = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, 'user')");
    $result->bindParam(':first_name', $user['firstname']);
    $result->bindParam(':last_name', $user['lastname']);
    $result->bindParam(':email', $user['email']);
    $result->bindParam(':password', $hashed_password);
    $result->execute();
    return $result;
}


function loginUser($email)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $result->bindParam(':email', $email);
    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);
}

function addIngredients($ingredients)
{
    global $conn;
    $addedIngredients = [];

    foreach ($ingredients as $ingredient) {
        // Check if ingredient is empty
        if (empty($ingredient)) {
            continue;
        }

        // Check if ingredient already exists in database
        $result = $conn->prepare("SELECT id FROM ingredients WHERE name = ?");
        $result->execute([$ingredient]);
        $ingredient_id = $result->fetchColumn();

        if (!$ingredient_id) {
            // Insert ingredient into ingredients table if it doesn't exist
            $result = $conn->prepare("INSERT INTO ingredients (name) VALUES (?)");
            $result->execute([$ingredient]);
            $ingredient_id = $conn->lastInsertId();
        }

        $addedIngredients[] = $ingredient_id;
    }

    return $addedIngredients;
}

function addRecipe($recipeName, $image, $duration, $course, $difficulty, $checked_ingredients, $amounts, $steps)
{
    global $conn;

    // Puts the following data in the recipes table
    $sql = "INSERT INTO recipes (title, author, image, duration, course, difficulty) VALUES (:title, :author, :image, :duration, :course, :difficulty)";
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

    // Insert checked ingredients into ingredients and recipe_ingredients tables
    for ($i = 0; $i < count($checked_ingredients); $i++) {
        $ingredient_id = $checked_ingredients[$i];
        $amount = $amounts[$i];

        // Insert ingredient and amount into recipe_ingredients table
        $result = $conn->prepare("INSERT INTO recipe_ingredients (recipe_id, ingredient_id, amount) VALUES (?, ?, ?)");
        $result->execute([$recipe_id, $ingredient_id, $amount]);
    }

    // Insert steps into instructions table
    foreach ($steps as $step) {
        // Check if step is empty
        if (empty($step)) {
            continue;
        }

        // Insert step into instructions table
        $result = $conn->prepare("INSERT INTO instructions (recipe_id, steps) VALUES (?, ?)");
        $result->execute([$recipe_id, $step]);
    }

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

function totalEntries()
{
    global $conn;

    $result = $conn->prepare("SELECT COUNT(*) AS total_entries FROM recipes");
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function long_recipe()
{
    global $conn;

    $result = $conn->prepare("SELECT *, MAX(duration) as max_cooking_time
    FROM recipes
    GROUP BY title");

    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function easy_recipe()
{
    global $conn;

    $result = $conn->prepare("SELECT *
    FROM recipes
    WHERE difficulty = 'easy'");

    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function most_ingredients()
{
    global $conn;

    $result = $conn->prepare("SELECT recipes.*, COUNT(recipe_ingredients.ingredient_id) AS total_ingredients
    FROM recipes
    INNER JOIN recipe_ingredients ON recipes.id = recipe_ingredients.recipe_id
    GROUP BY recipes.id
    ORDER BY total_ingredients DESC");

    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function editUser($firstname, $lastname, $email, $hashed_password, $id) {
    global $conn;
    
    $result = $conn->prepare("UPDATE users SET first_name = :firstname, last_name = :lastname, email = :email, password = :password WHERE id = :id");

    $result->bindParam(':firstname', $firstname);
    $result->bindParam(':lastname', $lastname);
    $result->bindParam(':email', $email);
    $result->bindParam(':password', $hashed_password);
    $result->bindParam(':id', $id);

    $result->execute();

    if ($result) {
        $success = "User information updated successfully.";
    } else {
        $error = "Error updating user information.";
    }
}

function getIngredientById($id){
    global $conn;

    $result = $conn->prepare("SELECT * FROM ingredients WHERE id = ?");
    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function editIngredient($ingredientName, $id) {
    global $conn;

    $result = $conn->prepare("UPDATE ingredients SET name = :name WHERE id = :id");
    $result->bindParam(':name', $ingredientName);
    $result->bindParam(':id', $id);

    $result->execute();

    if ($result) {
        $success = "User information updated successfully.";
    } else {
        $error = "Error updating information.";
    }

}

function getRecipeIngredients($id)
{
    global $conn;
    $result = $conn->prepare("SELECT ingredient_id FROM recipe_ingredients WHERE recipe_id = ?");
    $result->execute([$id]);
    $result = $result->fetchAll(PDO::FETCH_COLUMN);
    return $result;
}

function getRecipeIngredientAmounts($id)
{
    global $conn;
    $result = $conn->prepare("SELECT ingredient_id, amount FROM recipe_ingredients WHERE recipe_id = ?");
    $result->execute([$id]);
    $result = $result->fetchAll(PDO::FETCH_KEY_PAIR);
    return $result;
}

function editRecipe($recipeName, $image, $duration, $course, $difficulty, $checked_ingredients, $amounts, $steps, $id){
    global $conn;

    // Update the data in the recipes table
    $sql = "UPDATE recipes SET title = :title, author = :author, image = :image, duration = :duration, course = :course, difficulty = :difficulty WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->execute([
        ':id' => $id, // Assumes that $recipe_id is the ID of the existing recipe to be updated
        ':title' => $recipeName,
        ':author' => $_SESSION['id'],
        ':image' => $image,
        ':duration' => $duration,
        ':course' => $course,
        ':difficulty' => $difficulty
    ]);

    // Delete all existing recipe_ingredients for the recipe
    $sql = "DELETE FROM recipe_ingredients WHERE recipe_id = :id";
    $result = $conn->prepare($sql);
    $result->execute([':id' => $id]);

    // Insert checked ingredients into ingredients and recipe_ingredients tables
    for ($i = 0; $i < count($checked_ingredients); $i++) {
        $ingredient_id = $checked_ingredients[$i];
        $amount = $amounts[$i];

        // Insert ingredient and amount into recipe_ingredients table
        $result = $conn->prepare("INSERT INTO recipe_ingredients (recipe_id, ingredient_id, amount) VALUES (?, ?, ?)");
        $result->execute([$id, $ingredient_id, $amount]);
    }

    // Delete all existing instructions for the recipe
    $sql = "DELETE FROM instructions WHERE recipe_id = :id";
    $result = $conn->prepare($sql);
    $result->execute([':id' => $id]);

    // Insert steps into instructions table
    foreach ($steps as $step) {
        // Check if step is empty
        if (empty($step)) {
            continue;
        }

        // Insert step into instructions table
        $result = $conn->prepare("INSERT INTO instructions (recipe_id, steps) VALUES (?, ?)");
        $result->execute([$id, $step]);
    }

    return $result;
}

function findRecipeByID($id)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}

function findRecipeIngredients($id){
    global $conn;

    $result = $conn->prepare("SELECT * FROM recipe_ingredients WHERE recipe_id = ?");
    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}
function findInstructions($id)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM instructions WHERE recipe_id = ?");
    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_ASSOC);

    return $result->fetchAll();
}