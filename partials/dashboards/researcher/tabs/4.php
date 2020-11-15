<div class="tab-pane container <?php echo ($active_tab == 4? 'active' : 'fade'); ?>" id="home4">
  <h5 class="mb-5 mt-5">Submitted Papers (<?php echo $researcher_papers -> num_rows; ?>)</h5>
  <div class="row">

      <?php while($researcher_paper = $researcher_papers -> fetch_assoc()) {?>
        <div class="col-md-12 mb-5">
          <div class="card p-0">
            <ul class="list-group list-group-flush">
              <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $researcher_paper['id']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Title</small> <br> <?php echo $researcher_paper['title']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Author</small> <br> <?php echo $researcher_paper['author']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Status</small> <br> <?php echo $researcher_paper['status']; ?></li>
              <li class="list-group-item clearfix"><small class="text-muted">Article</small> <br> <?php echo nl2br($researcher_paper['article']); ?></li>
            </ul>
          </div>
        </div>
      <?php }?>


  </div>
</div>
