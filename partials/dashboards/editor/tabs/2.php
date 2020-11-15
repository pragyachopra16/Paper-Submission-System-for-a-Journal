<div class="tab-pane container <?php echo ($active_tab == 2? 'active' : 'fade'); ?>" id="home2">
  <h5 class="mb-5 mt-5">Assign Reviewer To Paper</h5>

  <form action="" method="post" class="">
    <input type="hidden" value="assign_reviewer" name="action"/>
    <div class="form-group">
      <label for="reviewer">Reviewer</label>
      <select name="reviewer_id" id="reviewer" class="custom-select" required>
      <option value=""></option>
      <?php while($reviewer = $reviewers -> fetch_assoc()) {?>
        <option value="<?php echo $reviewer['id'];?>"><?php echo ($reviewer['name'] .'(Role ID: reviewer-'.$reviewer['id'].')');?></option>
      <?php }?>
      </select>
    </div>

    <div class="form-group">
      <label for="paper">Paper</label>
      <select name="paper_id" id="paper" class="custom-select" required>
      <option value=""></option>
      <?php

      while($paper = $editor_papers -> fetch_assoc()) {?>
        <option value="<?php echo $paper['id'];?>"><?php echo ($paper['title'] .'(PID: '.$paper['id'].')');?></option>
      <?php }?>
      </select>
    </div>

    <div class="form-group">
      <label for="revision_deadline" >Revision Deadline</label>
      <input name="revision_deadline" type="date" id="revision_deadline" class="form-control" required>
    </div>

  <button class="btn btn-primary btn-block" type="submit">Assign To Paper</button>
  </form>

  <h5 class="mb-5 mt-5">Assigned Paper Reviewers (<?php echo $paper_reviewers -> num_rows; ?>) </h5>

  <div class="row">
  <?php
  while($paper_reviewer = $paper_reviewers -> fetch_assoc()) {?>
    <div class="col-md-6 mb-5">
      <div class="card p-0">
        <ul class="list-group list-group-flush">
          <li class="list-group-item clearfix"><small class="text-muted">Reviewer Name</small> <br> <?php echo $paper_reviewer['reviewer_name']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Reviewer Role ID</small> <br> <?php echo 'reviewer-'.$paper_reviewer['reviewer_id']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Revision Deadline</small> <br> <?php echo $paper_reviewer['revision_deadline']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Paper Title</small> <br> <?php echo $paper_reviewer['paper_title']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $paper_reviewer['paper_id']; ?></li>
        </ul>
        <div class="p-2 pr-3 text-right">
          <form class="delete-form" method="post" action="">
           <input type="hidden" name="action" value="unassign_reviewer">
           <input type="hidden" name="reviewer_id" value="<?php echo $paper_reviewer['reviewer_id']; ?>"/>
           <input type="hidden" name="paper_id" value="<?php echo $paper_reviewer['paper_id']; ?>"/>
           <button class="btn btn-sm">Remove reviewer </button>
          </form>
        </div>
      </div>
    </div>
  <?php }?>
 </div>

</div>
