<?php

require_once('../app/includes/configuration/prepend.inc.php'); 
    
    // Define the Qform with all our Qcontrols
class Setup extends  QForm {
        // Local declarations of our Qcontrols

        protected $simpleMessage;
       
        // Initialize our Controls during the Form Creation process
        protected function Form_Create() {

            $this->simpleMessage = new QLabel($this);
            $this->simpleMessage->Text = 'Welcome to QCubed base project page. This page you can use as startup of a new project';
  
   
        }


         
    }


?>

<?php  require(__VIEW__ . '/header.inc.php'); ?>

<?php $this->RenderBegin(); ?>

<div id="instructions">
    <h1><?php $this->lblMessage->Render(); ?></h1>

    <p>Something went wrong</p>

    <p>Error XYZ</p>

    <p>Feel free to contact page admin.</p>
</div>

<div id="demoZone">
    <p><?php $this->btnButton->Render(); ?></p>
</div>

<?php $this->RenderEnd(); ?>
<?php require(__VIEW__ . '/footer.inc.php'); ?> 
