<h5 class="mb-5 mt-5">Papers Assigned To Me (<?php echo $editor_papers -> num_rows; ?>)</h5>
<div class="row">

    <?php while($editor_paper = $editor_papers -> fetch_assoc()) {?>
      <div class="col-md-12 mb-5">
        <div class="card p-0">
          <ul class="list-group list-group-flush">
            <li class="list-group-item clearfix"><small class="text-muted">Paper ID (PID)</small> <br> <?php echo $editor_paper['id']; ?></li>
            <li class="list-group-item clearfix"><small class="text-muted">Researcher Role ID</small> <br> <?php echo 'researcher-'.$editor_paper['researcher_id']; ?></li>
            <li class="list-group-item clearfix"><small class="text-muted">Title</small> <br> <?php echo $editor_paper['title']; ?></li>
            <li class="list-group-item clearfix"><small class="text-muted">Author</small> <br> <?php echo $editor_paper['author']; ?></li>
            <li class="list-group-item clearfix"><small class="text-muted">Status</small> <br> <?php echo $editor_paper['status']; ?></li>
            <li class="list-group-item clearfix"><small class="text-muted">Article</small> <br> <?php echo nl2br($editor_paper['article']); ?></li>
          </ul>
          <div class="p-2 pr-3 text-right">
            <a href="paper-comments.php?paper_id=<?php echo $editor_paper['id']; ?>" class="btn btn-sm">View Paper Comments</a>
            <form class="d-inline" method="get" action="">
             <input type="hidden" name="edit" value="1">
             <input type="hidden" name="tab" value="<?php echo $active_tab;?>">
             <input type="hidden" name="paper_id" value="<?php echo $editor_paper['id']; ?>"/>
             <button class="btn btn-sm">Edit</button>
            </form>
          </div>
        </div>
      </div>
    <?php }?>
</div>
