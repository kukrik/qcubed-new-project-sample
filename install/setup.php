<?php

               
require_once('../app/includes/configuration/prepend.inc.php');
    
if (!isset($this)) {
    // Define the Qform with all our Qcontrols
        class Setup extends  QForm {
                // Local declarations of our Qcontrols

                protected $simpleMessage;

                // Initialize our Controls during the Form Creation process
                protected function Form_Create() {

                    $this->simpleMessage = new QLabel($this);
                    $this->simpleMessage->Text = '<h1>Welcome to QCubed setup  project page.</h1> This page you can use as startup of a new project <br/>';
                    $this->simpleMessage->HtmlEntities= false;
                }

            }
    Setup::Run('Setup', __FILE__);
    return;
}
//}
?>

<?php  require('header.inc.php'); ?>

<?php $this->RenderBegin(); ?>

<div id="instructions" style="min-height: 400px;">
    <?php $this->simpleMessage->Render(); ?>

   
</div>

<div id="demoZone">
   
</div>

<?php $this->RenderEnd(); ?>
<?php require('footer.inc.php'); ?> 
