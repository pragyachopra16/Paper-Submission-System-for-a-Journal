<?php
//include login page controller.
include_once('controllers/paper_comment_controller.php');
?>
<?php include_once('partials/header.php'); ?>

  <section class="p-4 pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">

          <h5 class="h5 mb-3 font-weight-normal"><?php echo $paper['title']??''; ?> Comments (<?php echo isset($comments)?$comments -> num_rows:0; ?>)</h5>
          <div class="mb-4">
            <?php
            include("partials/alerts/success.php");
            include("partials/alerts/errors.php");
            ?>
          </div>
          <p class="text-right mb-4">
            <a class="text-uppercase" href="dashboard.php?tab=1">
               <i class="fa fa-angle-left"></i> Go To Dashboard
            </a>
          </p>

          <div class="row">
            <?php if(isset($comments)){
                    while($comment = $comments -> fetch_assoc()) {?>
                      <div class="card col-md-12 mb-5 p-0 ">
                        <h5 class="card-header bg-secondary text-muted small clearfix">
                          <i class="fa fa-comment-o"></i> <?php echo $comment['name']; ?>
                          (<?php
                          if(isset($comment['editor_id'])){
                            echo "editor-{$comment['editor_id']}";
                          }elseif(isset($comment['reviewer_id'])){
                            echo "reviewer-{$comment['reviewer_id']}";
                          }
                          ?>)
                          <span class="float-right">
                            <?php echo date('M d, Y h:i A', strtotime($comment['created_at'])); ?>
                          </span>
                        </h5>
                        <div class="card-body">
                          <p class="card-text"> <?php echo nl2br($comment['comment']); ?></p>
                        </div>
                      </div>
            <?php }}?>
          </div>

          <?php if($user['role'] == 'editor' || $user['role'] == 'reviewer'){?>
          <p class="mt-4">
              <button type="button" class="btn btn-secondary bg-light btn-block" data-toggle="modal" data-target="#commentModal" type="submit">Add Comment</button>
          </p>
          <?php }?>

        </div>
      </div>
    </div>
  </section>

  <?php
     $pid = $paper['id']??'';
     $ptitle = $paper['title']??'';
     include_once('partials/comment_modal.php');
  ?>

  <?php
   include_once('partials/footer.php');
  ?>
