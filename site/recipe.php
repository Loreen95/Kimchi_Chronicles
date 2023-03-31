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
    if (!isset($_SESSION['id'])) { ?>
        <a class="terug-link" href="index.php">&laquo; Terug</a>
        <? } else {
        foreach ($result as $recipe) {
            if ($recipe['author'] == $_SESSION['id'] || $_SESSION['user']['role'] == "administrator") { ?>
                <a class="terug-link" href="index.php">&laquo; Terug</a>
                <a href="recipe_edit.php?id=<?php echo $id; ?>">Aanpassen</a>
            <?php } else { ?>
                <a class="terug-link" href="index.php">&laquo; Terug</a>
    <?php }
        }
    } ?>

</div>

<div class="section">
    <?php foreach ($result as $recipe) { ?>
        <h1 class="rTitle"><?php echo $recipe['title']; ?></h1>
        <h3><?php echo $recipe['author_name']; ?></h3>

        <div class="article">
            <img src="public/images/<?php echo $recipe['image']; ?>" style="height: 500px; width: 40%" />
            <h2>Moeilijkheid:</h2>
            <p><?php echo $recipe['difficulty']; ?> </P>
            <h2>Bereidingstijd:</h2>
            <p><?php echo $recipe['duration']; ?></p>
            <h2>Ingrediënten:</h2>
            <ul class="iList">
                <!-- Explode de array zodat alles onder elkaar komt te staan -->
                <?php $ingredient = explode(',', $recipe['ingredient_list']);
                foreach ($ingredient as $ingredient) {
                ?>
                    <li><?php echo $ingredient; ?></li>
                <?php } ?>
            </ul>
            <dl>
                <dt>
                    <h2>Bereiding:</h2>
                </dt>
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
            </dl>
        </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>