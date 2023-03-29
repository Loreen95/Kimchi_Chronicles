<?php

require_once('private/initialize.php');


if (!isset($_SESSION['id'])) {
    redirect_to("login.php");
} else {
    session_unset();
    session_destroy();
    redirect_to("index.php");
}
