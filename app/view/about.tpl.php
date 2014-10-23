<?php  require('header.inc.php'); ?>
  
<?php $this->RenderBegin(); ?>

   <div class="panel panel-default">
        <div class="panel-heading">
            <h3>About Page </h3>
        </div>
        <div class="panel-body">
            <p>
                <?php $this->simpleMessage->Render(); ?>
            </p>
       </div>
   </div> 
    

<?php $this->RenderEnd(); ?>

<?php require('footer.inc.php'); ?> 