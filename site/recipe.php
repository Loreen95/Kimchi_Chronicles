<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept";

$id = $_GET['id'] ?? '1';
$result = findRecipe($id);

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div id="content">
    <?php
    foreach ($result as $recipe) {
        if ($recipe['author'] == $_SESSION['id']) {
    ?>
            <a class="terug-link" href="index.php">&laquo; Terug</a>
            <a href="recipe_edit.php?id=<?php echo $id; ?>">Aanpassen</a>
        <?php } else { ?>
            <a class="terug-link" href="index.php">&laquo; Terug</a>
    <?php }
    } ?>
</div>

<div class="secion">
    <?php foreach ($result as $recipe) { ?>
        <h1><?php echo $recipe['title']; ?></h1>
        <h3><?php echo $recipe['author_name']; ?></h3>

        <div class="article">
            <img src="public/images/<?php echo $recipe['image']; ?>" style="height: 500px; width: 40%" />
            <h2>Ingredienten:</h2>
            <ul>
                <li><?php echo $recipe['ingredient_list']; ?></li>
            </ul>
            <dl>
                <dt><?php echo $recipe['steps_desc']; ?>:</dt>
                <dd><?php echo $recipe['steps']; ?></dd>
            </dl>
        </div>
    <?php }
    ?>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>