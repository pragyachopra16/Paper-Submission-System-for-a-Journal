<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalLabel">New Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="paper-comments.php" method="post">
      <div class="modal-body">
        <h6><i class="fa fa-commenting-o"></i> <?php echo $ptitle??'';?></h6>
          <input type="hidden" name="paper_id" value="<?php echo $pid??''; ?>" />
          <input type="hidden" name="action" value="post_comment">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comment</label>
            <textarea required rows="9" name="comment" class="form-control" id="comment"></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Post Comment</button>
      </div>
      </form>
    </div>
  </div>
</div>
