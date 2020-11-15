<div class="tab-pane container <?php echo ($active_tab == 3? 'active' : 'fade'); ?>" id="home3">
  <h5 class="mb-5 mt-5">Assign Editor To Paper</h5>

  <form action="" method="post" class="">
    <input type="hidden" value="assign_editor" name="action"/>
    <div class="form-group">
      <label for="editor">Editor</label>
      <select name="editor_id" id="editor" class="custom-select" required>
      <option value=""></option>
      <?php while($editor = $editors -> fetch_assoc()) {?>
        <option value="<?php echo $editor['id'];?>"><?php echo ($editor['name'] .'(Role ID: editor-'.$editor['id'].')');?></option>
      <?php }?>
      </select>
    </div>

    <div class="form-group">
      <label for="paper">Paper</label>
      <select name="paper_id" id="paper" class="custom-select" required>
      <option value=""></option>
      <?php

      while($paper = $papers -> fetch_assoc()) {?>
        <option value="<?php echo $paper['id'];?>"><?php echo ($paper['title'] .'(PID: '.$paper['id'].')');?></option>
      <?php }?>
      </select>
    </div>
  <button class="btn btn-primary btn-block" type="submit">Assign To Paper</button>
  </form>

  <h5 class="mb-5 mt-5">Assigned Paper Editors (<?php echo $paper_editors -> num_rows; ?>)</h5>

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
          <form class="delete-form" method="post" action="">
           <input type="hidden" name="action" value="unassign_editor">
           <input type="hidden" name="editor_id" value="<?php echo $paper_editor['editor_id']; ?>"/>
           <input type="hidden" name="paper_id" value="<?php echo $paper_editor['paper_id']; ?>"/>
           <button class="btn btn-sm">Remove editor </button>
          </form>
        </div>
      </div>
    </div>
  <?php }?>
 </div>

</div>
