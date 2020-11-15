<?php $active_tab = $_GET['tab']??1; ?>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 1? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=1">Submit Papers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 2? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=2">Editors On My Papers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 3? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=3">Reviewers On My Papers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 4? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=4">My Papers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($active_tab == 5? 'active' : ''); ?>" data-toggle="" href="dashboard.php?tab=5">Paper Withdrawals</a>
  </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <?php
    //ensure the tab is within range
    if($active_tab <= 5) include_once( $user['role'] . '/tabs/' . $active_tab . '.php');
  ?>
</div>
