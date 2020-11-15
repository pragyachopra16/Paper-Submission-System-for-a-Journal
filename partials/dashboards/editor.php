<?php $active_tab = $_GET['tab']??1; ?>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 1? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=1">Papers Assigned To Me</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 2? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=2">Manage Paper Reviewers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 3? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=3">Withdrawal Requests</a>
  </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <?php
    //ensure the tab is within range
    if($active_tab <= 3) include_once( $user['role'] . '/tabs/' . $active_tab . '.php');
  ?>
</div>
