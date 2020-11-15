<?php
//before inccluding this file, ensure that the page including it includes a controller
 $success_msgs = (function_exists('getAndDeleteSessionSuccessAlerts')?getAndDeleteSessionSuccessAlerts():NULL)??[];
 foreach ($success_msgs as $success_msg) {

?>

<div class="alert alert-success alert-dismissible fade show mt-1 mb-1" role="alert">
  <strong>Success</strong> <?php echo $success_msg; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true"><i class="fa fa-times"></i></span>
  </button>
</div>


<?php  }?>
