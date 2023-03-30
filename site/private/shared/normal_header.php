<?php
if (!isset($page_title)) {
    $page_title = 'General Area';
}

$total = totalEntries();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="../../public/css/style.css" />
    <script src="https://kit.fontawesome.com/6d5bf39b05.js" crossorigin="anonymous"></script>
    <title>Kimchi Chronicles - <?php echo $page_title ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <header class="header">
                <div class="socials">
                    <i class="fa-brands fa-facebook hicon"></i>
                    <i class="fa-brands fa-instagram hicon"></i>
                    <i class="fa-brands fa-twitter hicon"></i>
                    <i class="fa-brands fa-pinterest hicon"></i>
                    <h1><a href="index.php">Kimchi Chronicles</a></h1>
                    <?php foreach($total as $tot) { ?>
                    <h4 class="total">Aantal recepten in de database: <?php echo $tot['total_entries']; } ?></h4>
                </div>
            </header>
            <div class="topnav">
                <div class="topnav-centered">
                    <a href="index.php">Home</a>
                    <a href="recipes.php">Recepten</a>
                    <a href="ingredients.php">Ingrediënten</a>
                </div>
                <?php if (!isset($_SESSION['id'])) { ?>
                    <ul class="topnav-right">
                        <li><a href="login.php">Inloggen</a></li>
                        <li><a href="register.php">Registreren</a></li>
                    </ul>
<<<<<<< HEAD
                <?php } else {
                ?>
                    <div class="topnav-centered">
                        <a href="recipes_add.php">Recepten toevoegen</a>
                        <a href="ingredients_add.php">Ingredienten toevoegen</a>
                    </div>
                    <div class="topnav-right">
                        <a href="dashboard.php">Instellingen</a>
                        <a href="logout.php">Uitloggen</a>
=======
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <?php echo $_SESSION['user']['first_name']; ?>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <ul class="dropList">
                                <li><a href="dashboard.php">Instellingen</a></li>
                                <li><a href="recipes_add.php">Recepten toevoegen</a></li>
                                <li><a href="instructions_add.php">Instructies toevoegen</a></li>
                                <li><a href="ingredients_add.php">Ingredienten toevoegen</a></li>
                                <li><a href="logout.php">Uitloggen</a></li>
                            </ul>
                        </div>
>>>>>>> 10fd28760fd2d8d05f826a462b187b35134d523b
                    </div>
                <?php } ?>
            </div>