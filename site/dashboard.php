<?php require_once('private/initialize.php'); ?>
<?php $page_title = "Dashboard";

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page
    redirect_to("login.php");
    exit();
}

$id = $_SESSION['id'];
$result = findUserByID($id);
?>

<!-- Header -->
<?php include(SHARED_PATH . '/normal_header.php'); ?>

<!-- Main -->
<?php include(SHARED_PATH . '/main_start.php'); ?>
<!-- Een single-page user dashboard -->
<div class="dashboard-container">
    <div class="dashboard-column">
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                Dashboard
            </div>
            <ul class="dashboard-list">
                <li class="dashboard-list-item"><a href="?page=user_records">Mijn gegevens</a></li>
                <li class="dashboard-list-item"><a href="?page=user_recipes">Mijn recepten</a></li>
                <?php
                // Deze links zijn alleen zichtbaar als de ingelogde gebruiker administrator is
                if ($_SESSION['user']['role'] == 'administrator') { ?>
                    <li class="dashboard-list-item"><a href="?page=user_list">Klantenlijst</a></li>
                    <li class="dashboard-list-item"><a href="?page=user_add">Klant toevoegen</a></li>
                    <li class="dashboard-list-item"><a href="?page=recipe_list">Receptmanagement</a></li>
                    <li class="dashboard-list-item"><a href="?page=ingredient_list">Ingredientmanagement</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- Zoekt op basis van de aangeklinkte link, welke pagina's ge-include moeten worden
    Waardoor alles op een single page zichtbaar wordt -->
    <div class="col-9">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'user_records':
                    include('user_records.php');
                    break;
                case 'user_recipes':
                    include('user_recipes.php');
                    break;
                case 'user_recipes_edit':
                    include('user_recipes_edit.php');
                    break;
                case 'user_recipes_delete':
                    include('user_recipes_delete.php');
                    break;
                case 'user_list':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('user_list.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'user_add':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('user_add.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'user_edit':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('user_edit.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'user_delete':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('user_delete.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'recipe_list':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('recipe_list.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'recipe_edit':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('recipe_edit.php');
                    } else {
                        // redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'recipe_delete':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('recipe_delete.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'ingredient_list':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('ingredient_list.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'ingredient_edit':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('ingredient_edit.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                case 'ingredient_delete':
                    if ($_SESSION['user']['role'] == 'administrator') {
                        include('ingredient_delete.php');
                    } else {
                        redirect_to("index.php");
                        exit();
                    }
                    break;
                default:
                    include('user_records.php');
                    break;
            }
        } else {
            include('user_records.php');
        }
        // Wanneer er sprake is van editen of delete, wordt dit meegenomen en de verschillende categoriën krijgen eigen <naam>_edit_id
        if (isset($_GET['edit_id'])) {
            $page = $_GET['page'];
            $edit_id = $_GET['edit_id'];
            include($page . '_edit.php');
        } elseif (isset($_GET['delete_id'])) {
            $page = $_GET['page'];
            $delete_id = $_GET['delete_id'];
            include($page . '_delete.php');
        }
        ?>
    </div>
</div>


<?php include(SHARED_PATH . '/main_end.php'); ?>

<!-- Footer -->
<?php include(SHARED_PATH . '/normal_footer.php'); ?>