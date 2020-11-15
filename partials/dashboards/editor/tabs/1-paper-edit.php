<h5 class="mb-5 mt-5">Editing Paper - <?php echo $editable_paper['title']??''; ?></h5>
<p class="text-right">
  <a class="text-uppercase" href="dashboard.php?<?php echo http_build_query(array_diff_key($_GET, ['edit' => '','paper_id' => '']));?>">
     <i class="fa fa-angle-left"></i> Go Back
  </a>
</p>
<div class="">
  <form action="" method="post" class="">
    <input type="hidden" name="paper_id" value="<?php echo $editable_paper['id']??''; ?>" />
    <input type="hidden" value="update_paper" name="action"/>
    <div class="form-group clearfix">
      <label class="d-block" for="author">Author <i class="fa fa-lock text-muted float-right"></i></label>
      <input name="author" disabled value="<?php echo $editable_paper['author']??''; ?>" type="text" id="author" class="form-control" required>
    </div>
    <div class="form-group clearfix">
      <label class="d-block" for="author">Researcher Role ID <i class="fa fa-lock text-muted float-right"></i></label>
      <input name="researcher_role_id" disabled value="<?php echo 'researcher-'.$editable_paper['researcher_id']; ?>" type="text" id="researcher_role_id" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="title" >Title </label>
      <input name="title"  type="text" value="<?php echo $editable_paper['title']??''; ?>" id="title" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="inputRole">Status</label>
      <select name="status" id="status" class="custom-select" required>
      <option value="WAITING" <?php echo $editable_paper['status'] == 'WAITING'?'selected':''; ?>>WAITING</option>
      <option value="PUBLISHED" <?php echo $editable_paper['status'] == 'PUBLISHED'?'selected':''; ?>>PUBLISHED</option>
      <option value="WITHDRAWN" <?php echo $editable_paper['status'] == 'WITHDRAWN'?'selected':''; ?>>WITHDRAWN</option>
      </select>
  </div>
    <div class="form-group mb-4">
      <label for="article" >Article</label>
      <textarea name="article" class="form-control" id="article" rows="15"><?php echo $editable_paper['article']??''; ?></textarea>
    </div>
    <a class="btn btn-secondary bg-light" href="paper-comments.php?paper_id=<?php echo $editable_paper['id']; ?>"> View All Comments</a>
    <button type="button" class="btn btn-secondary bg-light" data-toggle="modal" data-target="#commentModal" type="submit">Add Comment</button>
    <button type="submit" class="btn btn-primary" type="submit">Update Paper</button>
  </form>

</div>

<?php
   $pid = $editable_paper['id']??'';
   $ptitle = $editable_paper['title']??'';
   include_once('partials/comment_modal.php');
?>
