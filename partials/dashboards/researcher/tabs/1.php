<div class="tab-pane container <?php echo ($active_tab == 1? 'active' : 'fade'); ?>" id="home1">
  <h5 class="mb-5 mt-5">Submit New Paper</h5>
  <form action="" method="post" class="">
    <input type="hidden" value="create_paper" name="action"/>
    <div class="form-group">
      <label for="title" >Title</label>
      <input name="title" type="text" id="title" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="author" >Author</label>
      <input name="author" value="<?php echo $user['data']['name']; ?>" type="text" id="author" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="article" >Article</label>
      <textarea name="article" class="form-control" id="article" rows="15"></textarea>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Submit Paper</button>
  </form>
</div>
