<?php

/* A script to also be able to link things like CSS-files and other file links. 
Dependent on the definition of folders in initialize.php. */
function url_for($script_path)
{
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }

    return WWW_ROOT . $script_path;
}
