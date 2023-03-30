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
    if (!isset($_SESSION['id'])) {
    ?>
        <a class="terug-link" href="index.php">&laquo; Terug</a>
    <?php } ?>
    <?php foreach ($result as $recipe) {
        if ($recipe['author'] == $_SESSION['id']) { ?>
            <a class="terug-link" href="index.php">&laquo; Terug</a>
            <a href="recipe_edit.php?id=<?php echo $id; ?>">Aanpassen</a>
    <?php }
    } ?>
</div>
<<<<<<< HEAD

<div class="section">
=======
<?php
if (!$result) { ?>
    <h1>De instructies van dit gerecht zijn nog niet gepubliceerd.</h1>
<?php } ?>
<div class="secion">
>>>>>>> 10fd28760fd2d8d05f826a462b187b35134d523b
    <?php foreach ($result as $recipe) { ?>
        <h1 class="rTitle"><?php echo $recipe['title']; ?></h1>
        <h3><?php echo $recipe['author_name']; ?></h3>

        <div class="article">
            <img src="public/images/<?php echo $recipe['image']; ?>" style="height: 500px; width: 40%" />
            <h2>Ingrediënten:</h2>
            <ul class="iList">
                <!-- Explode de array zodat alles onder elkaar komt te staan -->
                <?php $ingredient = explode(',', $recipe['ingredient_list']);
                foreach ($ingredient as $ingredient) {
                ?>
<<<<<<< HEAD
                    <li><?php echo $recipe['amount'] . " " . $ingredient; ?></li>
=======
                    <li><?php echo $ingredient; ?></li>
>>>>>>> 10fd28760fd2d8d05f826a462b187b35134d523b
                <?php } ?>
            </ul>
            <dl>
                <dt><h2>Bereiding:</h2></dt>
                <dd>
                    <!-- Explode de array zodat alles onder elkaar komt te staan -->
                    <?php $lijst = explode(';', $recipe['instruction_list']);
                    foreach ($lijst as $stp =>  $instruction) {
                    ?>
                <dt>
                    <h3 class="step"><?php echo "Stap " . $stp + 1   ?>:</h3>
                </dt>
                <dd><?php echo $instruction; ?></dd>
            <?php } ?>
            </dd>
            </dl>
        </div>
    <?php }
    ?>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>