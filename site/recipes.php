<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Receptenlijst";

$result = allRecipes();
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div id="content">
    <a class="terug-link" href="index.php">&laquo; Terug</a>
</div>

<h1>Receptenlijst</h1>
<?php
if (!$result) { ?>
    <h1>Er zijn nog geen gerechten toegevoegd</h1>
<?php } ?>

<div class="row">
    <?php foreach ($result as $recipe) { ?>
        <div class="column">
            <div class="card"><a href="<?php echo 'recipe.php?id=' . $recipe['id']; ?> ">
                    <img src="public/images/<?php echo $recipe['image']; ?>" />
                    <h2><?php echo $recipe['title']; ?> </h2>
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>