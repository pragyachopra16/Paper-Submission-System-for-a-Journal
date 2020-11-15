<?php
//before inccluding this file, ensure that the page including it includes a controller
 $error_msgs = (function_exists('getAndDeleteSessionErrorAlerts')?getAndDeleteSessionErrorAlerts():NULL)??[];
 foreach ($error_msgs as $error_msg) {

?>

<div class="alert alert-danger alert-dismissible fade show mt-1 mb-1" role="alert">
  <strong>Error</strong> <?php echo $error_msg; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true"><i class="fa fa-times"></i></span>
  </button>
</div>

<?php  }?>
