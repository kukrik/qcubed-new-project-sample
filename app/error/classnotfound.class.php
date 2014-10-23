<?php

if (!isset($this)) {

    // Define the Qform with all our Qcontrols
    class ClassNotFound extends QForm {

        // Local declarations of our Qcontrols
        protected $lblMessage;
        protected $btnButton;

        // Initialize our Controls during the Form Creation process
        protected function Form_Create() {

            $this->lblMessage = new QLabel($this);
            $this->lblMessage->Text = 'Page not found error page.';

            $this->btnButton = new QButton($this);
            $this->btnButton->Text = 'go to main page!';

            $this->btnButton->AddAction(new QClickEvent(), new QServerAction('btnButton_Click'));
        }

        // The "btnButton_Click" Event handler
        protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
            QApplication::Redirect('/');
        }

    }

    // Run the Form we have defined
    // Note that we explicitly specify the PHP variable __FILE__ (e.g. THIS script)
    // as the template file to use, and that we call "return;" to ensure that the rest
    // of this script doesn't process on its initial run.  Instead, it will be processed
    // a second time by QCubed as the QForm is being rendered.
    ClassNotFound::Run('ClassNotFound', __FILE__);
    return;
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
