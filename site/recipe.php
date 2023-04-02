<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Recept";

$id = $_GET['id'];
$recipe = findRecipe($id);

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>
<?php if (!$recipe) { ?>
    <a class="terug-link" href="index.php">&laquo; Terug</a>
    <h1>Dit recept is nog niet geheel gepubliceerd.</h1>
<?php } else { ?>
    <div id="content">
        <?php
        if (!isset($_SESSION['id'])) { ?>
            <a class="terug-link" href="index.php">&laquo; Terug</a>
            <? } else {
            if ($recipe['author'] == $_SESSION['id'] || $_SESSION['user']['role'] == "administrator") { ?>
                <a class="terug-link" href="index.php">&laquo; Terug</a>
                <a href="dashboard.php?page=recipe_edit&recipe_edit_id=<?php echo $id; ?>">Aanpassen</a>
            <?php } else { ?>
                <a class="terug-link" href="index.php">&laquo; Terug</a>
            <?php }

            ?>
    </div>
    <div class="section">
        <h1 class="rTitle"><?php echo $recipe['title']; ?></h1>
        <h3><?php echo $recipe['author_name']; ?></h3>

        <div class="article">
            <img src="public/images/<?php echo $recipe['image']; ?>" style="height: 500px; width: 40%" />
            <h2>Moeilijkheid:</h2>
            <p><?php echo $recipe['difficulty']; ?> </p>
            <h2>Bereidingstijd:</h2>
            <p><?php echo $recipe['duration']; ?></p>
            <h2>Ingrediënten:</h2>
            <ul class="iList">
                <!-- Explode de array zodat alles onder elkaar komt te staan -->
                <?php
                $ingredients = explode(',', $recipe['ingredient_list']);
                foreach ($ingredients as $ingredient) {
                    $parts = explode(' ', $ingredient);
                    $amount = $parts[0];
                    $name = implode(' ', array_slice($parts, 1));
                ?>
                    <li><?php echo $amount . ' ' . strtolower($name); ?></li>
                <?php } ?>
            </ul>
            <dl>
                <dt>
                    <h2>Bereiding:</h2>
                </dt>
                <dd>
                    <!-- Explode de array zodat alles onder elkaar komt te staan -->
                    <?php $lijst = explode(';', $recipe['instruction_list']);
                    foreach (array_reverse($lijst) as $stp => $instruction) {
                    ?>
                <dt>
                    <h3 class="step"><?php echo "Stap " . ($stp + 1)   ?>:</h3>
                </dt>
                <dd><?php echo $instruction; ?></dd>
            <?php } ?>
            </dd>
            </dl>
        </div>
<?php }
    }
?>
    </div>

    <?php include(SHARED_PATH . '/main_end.php'); ?>

    <!-- Footer -->
    <?php include(SHARED_PATH . '/normal_footer.php'); ?>