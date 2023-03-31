<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Specials";

$easy_recipe = easy_recipe();
$long_recipe = long_recipe();
$most_ingredients = most_ingredients();

?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>

<div id="content">
    <a class="terug-link" href="index.php">&laquo; Terug</a>
</div>

<div class="section">
    <h1 class="rTitle">De makkelijste recepten: </h1>
    <div class="article">
        <div class="row">
            <?php foreach ($easy_recipe as $easy) {
            ?>
                <div class="column">
                    <div class="card"><a href="<?php echo 'recipe.php?id=' . $easy['id'];
                                                ?> ">
                            <img src="public/images/<?php echo $easy['image'];
                                                    ?>" />
                            <h2><?php echo $easy['title'];
                                ?> </h2>
                        </a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <h1 class="rTitle">Recepten met de meeste ingrediënten: </h1>
        <div class="article">
            <div class="row">
                <?php foreach ($most_ingredients as $recipe) {
                ?>
                    <div class="column">
                        <div class="card"><a href="<?php echo 'recipe.php?id=' . $recipe['id'];
                                                    ?> ">
                                <img src="public/images/<?php echo $recipe['image'];
                                                        ?>" />
                                <h2><?php echo $recipe['title'];
                                    ?> </h2>
                                <h3>Totaal ingrediënten: <?php echo $recipe['total_ingredients']; ?></h3>
                            </a>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>

        <h1 class="rTitle">Recepten met de langste bereidingstijd: </h1>
        <div class="article">
            <div class="row">
                <?php foreach ($long_recipe as $long) {
                ?>
                    <div class="column">
                        <div class="card"><a href="<?php echo 'recipe.php?id=' . $long['id'];
                                                    ?> ">
                                <img src="public/images/<?php echo $long['image'];
                                                        ?>" />
                                <h2><?php echo $long['title'];
                                    ?> </h2>
                                <h3>Bereidingstijd: <?php echo $long['duration']; ?></h3>
                            </a>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
        <?php include(SHARED_PATH . '/main_end.php'); ?>

        <!-- Footer -->
        <?php include(SHARED_PATH . '/normal_footer.php'); ?>