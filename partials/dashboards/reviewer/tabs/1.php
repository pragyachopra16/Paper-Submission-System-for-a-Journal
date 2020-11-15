<div class="tab-pane container <?php echo ($active_tab == 1? 'active' : 'fade'); ?>" id="home1">
  <h5 class="mb-5 mt-5">Papers I Can Review (<?php echo $reviewer_papers -> num_rows; ?>)</h5>
  <div class="row">

      <?php while($reviewer_paper = $reviewer_papers -> fetch_assoc()) {?>
        <div class="col-md-12 mb-5">
          <div class="card p-0">
            <ul class="list-group list-group-flush">
              <li class="list-group-item clearfix"><small class="text-muted">Revision Deadline</small> <br> <?php echo date('M d, Y h:i A', strtotime($reviewer_paper['revision_deadline'])); ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $reviewer_paper['id']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Researcher Role ID</small> <br> <?php echo 'researcher-'.$reviewer_paper['researcher_id']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Title</small> <br> <?php echo $reviewer_paper['title']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Author</small> <br> <?php echo $reviewer_paper['author']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Status</small> <br> <?php echo $reviewer_paper['status']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Article</small> <br> <?php echo nl2br($reviewer_paper['article']); ?></li>
            </ul>
            <div class="p-2 pr-3 text-right">
              <a href="paper-comments.php?paper_id=<?php echo $reviewer_paper['id']; ?>" class="btn btn-sm">View Or Add Comments</a>
            </div>
          </div>
        </div>
      <?php }?>
  </div>

</div>
