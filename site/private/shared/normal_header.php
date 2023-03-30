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
    <script src="../../public/script/script.js" defer></script>
    <title>Kimchi Chronicles - <?php echo $page_title ?></title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="socials">
                <i class="fa-brands fa-facebook hicon"></i>
                <i class="fa-brands fa-instagram hicon"></i>
                <i class="fa-brands fa-twitter hicon"></i>
                <i class="fa-brands fa-pinterest hicon"></i>
                <h1><a href="index.php">Kimchi Chronicles</a></h1>
                <?php foreach ($total as $tot) { ?>
                    <h4 class="total">Aantal recepten in de database:
                    <?php echo $tot['total_entries'];
                } ?></h4>
            </div>
        </header>
        <div class="navbar">
            <div class="navbar-center">
                <a href="index.php">Home</a>
                <a href="recipes.php">Receptenlijst</a>
                <a href="ingredients.php">Ingrediëntenlijst</a>
                <?php if (!isset($_SESSION['id'])) { ?>
                    <div class="navbar-right">
                        <a href="login.php">Inloggen</a>
                        <a href="register.php">Registreren</a>
                    </div>
                <?php } else { ?>
                    <a href="recipes_add.php">Recept toevoegen</a>
            </div>
            <div class="navbar-right">
                <a href="dashboard.php">Instellingen</a>
                <a href="logout.php">Uitloggen</a>
            </div>
        <?php } ?>
        </div>