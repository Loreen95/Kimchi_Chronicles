<?php
if (!isset($page_title)) {
    $page_title = 'General Area';
}
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
                <?php } else {
                ?>
                    <div class="topnav-centered">
                        <a href="recipes_add.php">Recepten toevoegen</a>
                        <a href="ingredients_add.php">Ingredienten toevoegen</a>
                    </div>
                    <div class="topnav-right">
                        <a href="dashboard.php">Instellingen</a>
                        <a href="logout.php">Uitloggen</a>
                    </div>
                <?php } ?>
            </div>