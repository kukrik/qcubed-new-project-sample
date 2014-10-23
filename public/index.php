<?php
/* Include the most awesome PHP library ever. */
// We don't need this on every form require just remove it at first line
require_once('../app/includes/configuration/prepend.inc.php');

        // Application dispatcher and simple routing
        $Disp=QApplication::Dispatcher();

        if ($Disp=='ClassNotfound' && file_exists($strFilePath = sprintf('%s%s.class.php', __PROJECT__. '/error/', strtolower($Disp)))) {
         require($strFilePath);}
       
?>