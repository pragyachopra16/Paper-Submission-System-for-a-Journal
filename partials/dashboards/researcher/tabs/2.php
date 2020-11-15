<div class="tab-pane container <?php echo ($active_tab == 2? 'active' : 'fade'); ?>" id="home2">
  <h5 class="mb-5 mt-5">My Paper Editors (<?php echo $paper_editors -> num_rows; ?>)</h5>
  <div class="row">
  <?php
  while($paper_editor = $paper_editors -> fetch_assoc()) {?>
    <div class="col-md-6 mb-5">
      <div class="card p-0">
        <ul class="list-group list-group-flush">
          <li class="list-group-item clearfix"><small class="text-muted">Editor Name</small> <br> <?php echo $paper_editor['editor_name']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Editor Role ID</small> <br> <?php echo 'editor-'.$paper_editor['editor_id']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Paper Title</small> <br> <?php echo $paper_editor['paper_title']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $paper_editor['paper_id']; ?></li>
        </ul>
        <div class="p-2 pr-3 text-right">
          <form class="" method="get" action="">
           <input type="hidden" name="action" value="view_editor_comments">
           <input type="hidden" name="tab" value="2">
           <input type="hidden" name="editor_id" value="<?php echo $paper_editor['editor_id']; ?>"/>
           <input type="hidden" name="paper_id" value="<?php echo $paper_editor['paper_id']; ?>"/>
           <a href="paper-comments.php?paper_id=<?php echo $paper_editor['paper_id']; ?>" class="btn btn-sm">View Paper Comments</a>
          </form>
        </div>
      </div>
    </div>
  <?php }?>
 </div>
</div>
