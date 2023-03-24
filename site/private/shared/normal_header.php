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
    <div class="container">
        <header class="header">
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="recipes.php">Receptenlijst</a>
                <a href="ingredients.php">Ingrediëntenlijst</a>
                <?php if (!isset($_SESSION['id'])) { ?>
                    <ul class="rightnav">
                        <li><a href="login.php">Inloggen</a></li>
                        <li><a href="register.php">Registreren</a></li>
                    <?php } else { ?>
                        <li><a href="dashboard.php"><?php echo $_SESSION['users']['first_name']; ?></a></li>
                    <?php } ?>
                    </ul>
            </nav>
        </header>