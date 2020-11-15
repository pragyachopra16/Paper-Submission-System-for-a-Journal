<div class="tab-pane container <?php echo ($active_tab == 3? 'active' : 'fade'); ?>" id="home3">

  <h5 class="mb-5 mt-5">My Paper Reviewers (<?php echo $paper_reviewers -> num_rows; ?>)</h5>
  <div class="row">
  <?php
  while($paper_reviewer = $paper_reviewers -> fetch_assoc()) {?>
    <div class="col-md-6 mb-5">
      <div class="card p-0">
        <ul class="list-group list-group-flush">
          <li class="list-group-item clearfix"><small class="text-muted">Reviewer Name</small> <br> <?php echo $paper_reviewer['reviewer_name']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Reviewer Role ID</small> <br> <?php echo 'reviewer-'.$paper_reviewer['reviewer_id']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Paper Title</small> <br> <?php echo $paper_reviewer['paper_title']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $paper_reviewer['paper_id']; ?></li>
        </ul>
        <div class="p-2 pr-3 text-right">
          <form class="" method="get" action="">
           <input type="hidden" name="action" value="view_reviewer_comments">
           <input type="hidden" name="tab" value="2">
           <input type="hidden" name="reviewer_id" value="<?php echo $paper_reviewer['reviewer_id']; ?>"/>
           <input type="hidden" name="paper_id" value="<?php echo $paper_reviewer['paper_id']; ?>"/>
           <a href="paper-comments.php?paper_id=<?php echo $paper_reviewer['paper_id']; ?>" class="btn btn-sm">View Paper Comments</a>
          </form>
        </div>
      </div>
    </div>
  <?php }?>
 </div>

</div>
