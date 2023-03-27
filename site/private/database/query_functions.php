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

function findRecipe($id)
{
    global $conn;

    $result = $conn->prepare("SELECT * FROM recipes WHERE id = ? LIMIT 1");
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
