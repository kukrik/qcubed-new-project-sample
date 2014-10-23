<?php
    //require_once('includes/configuration/prepend.inc.php'); 
    
    // Define the Qform with all our Qcontrols
    class Index extends  QForm {
        // Local declarations of our Qcontrols

        protected $simpleMessage;
       
        // Initialize our Controls during the Form Creation process
        protected function Form_Create() {

            $this->simpleMessage = new QLabel($this);
            $this->simpleMessage->Text = 'Welcome to QCubed base project page. This page you can use as startup of a new project';
  
   
        }


         
    }
    // Run the Form we have defined
    Index::Run('Index',__VIEW__.'/index.tpl.php') ;
  
?>