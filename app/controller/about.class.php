<?php
    //require_once('includes/configuration/prepend.inc.php'); 
    
    // Define the Qform with all our Qcontrols
    class About extends  QForm {
        // Local declarations of our Qcontrols

        protected $simpleMessage;
       
        // Initialize our Controls during the Form Creation process
        protected function Form_Create() {

            $this->simpleMessage = new QLabel($this);
            $this->simpleMessage->Text = 'Welcome to QCubed base project page';
   
        }

    }
    // Run the Form we have defined
    About::Run('About',__VIEW__.'/about.tpl.php') ;
  
?>