<div class="tab-pane container <?php echo ($active_tab == 1? 'active' : 'fade'); ?>" id="home1">
  <?php
  if(isset($_GET['edit']))
     include_once('1-paper-edit.php');
  else
     include_once('1-paper-list.php');
  ?>
</div>
