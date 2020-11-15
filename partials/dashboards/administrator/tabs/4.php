<div class="tab-pane container <?php echo ($active_tab == 4? 'active' : 'fade'); ?>" id="home4">
  <h5 class="mb-5 mt-5">Researcher Papers (<?php echo $papers -> num_rows; ?>)</h5>
  <div class="row">
  <?php
  while($paper = $papers -> fetch_assoc()) {?>
    <div class="col-md-12 mb-5">
      <div class="card p-0">
        <ul class="list-group list-group-flush">
          <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $paper['id']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Researcher Role ID</small> <br> <?php echo 'researcher-'.$paper['researcher_id']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Title</small> <br> <?php echo $paper['title']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Author</small> <br> <?php echo $paper['author']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Status</small> <br> <?php echo $paper['status']; ?></li>
          <li class="list-group-item clearfix"><small class="text-muted">Article</small> <br> <?php echo nl2br($paper['article']); ?></li>
        </ul>
        <div class="p-2 pr-3 text-right">
          <a href="paper-comments.php?paper_id=<?php echo $paper['id']; ?>" class="btn btn-sm">View Paper Comments</a>
        </div>
      </div>
    </div>
  <?php }?>
 </div>
</div>
