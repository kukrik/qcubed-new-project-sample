<?php

if (!defined('__PREPEND_INCLUDED__')) {
		// Ensure prepend.inc is only executed once
		define('__PREPEND_INCLUDED__', 1);

		if (file_exists( '../app/includes/configuration/configuration.inc.php')) {
			require( '../app/includes/configuration/configuration.inc.php');
		}
		else {
			// The minimal constants set to work
			define ('__DOCROOT__', dirname(__FILE__) . '/../app');
			define ('__INCLUDES__', dirname(__FILE__) . '/../app/includes');
			define ('__QCUBED__', __INCLUDES__ . '/qcubed');
			define ('__PLUGINS__', __QCUBED__ . '/plugins');
			define ('__QCUBED_CORE__', __INCLUDES__ . '/qcubed/_core');
			define ('__APP_INCLUDES__', __INCLUDES__ . '/app_includes');
			define ('__MODEL__', __INCLUDES__ . '/model' );
			define ('__MODEL_GEN__', __MODEL__ . '/generated' );
		}
		//////////////////////////////
		// Include the QCubed Framework
		//////////////////////////////
		require(__QCUBED_CORE__ . '/framework/DisableMagicQuotes.inc.php');
		require(__QCUBED_CORE__ . '/qcubed.inc.php');

    
if (!isset($this)) {
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

}
}
?>

<?php  require('header.inc.php'); ?>

<?php $this->RenderBegin(); ?>

<div id="instructions">
    <h1><?php $this->simpleMessage->Render(); ?></h1>

   
</div>

<div id="demoZone">
   
</div>

<?php $this->RenderEnd(); ?>
<?php require('footer.inc.php'); ?> 