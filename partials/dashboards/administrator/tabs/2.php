<div class="tab-pane container <?php echo ($active_tab == 2? 'active' : 'fade'); ?>" id="home2">
  <h5 class="mb-5 mt-5">Manage Users</h5>
    <div class="row">
      <?php foreach ($user_types as $type => $rows) {?>
        <div class="col-md-12">
          <h6 class="mb-4"> <?php echo $type;?>s (<?php echo $rows -> num_rows; ?>)</h6>
        </div>

        <?php while($row = $rows -> fetch_assoc()) {?>
          <div class="col-md-6 mb-4">
            <div class="card p-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item clearfix"><small class="text-muted">Role ID</small><br /> <?php echo $type.'-'.$row['role_id']; ?></li>
                <li class="list-group-item clearfix"><small class="text-muted">Name</small><br /> <?php echo $row['name']; ?></li>
                <li class="list-group-item clearfix"><small class="text-muted">Phone</small><br /> <?php echo $row['phone']; ?></li>
                <li class="list-group-item clearfix"><small class="text-muted">Email</small><br /> <?php echo $row['email']; ?></li>
              </ul>
              <div class="p-2 pr-3 text-right">
                <form class="delete-form" method="post" action="">
                 <input type="hidden" name="action" value="delete_user">
                 <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                 <button class="btn btn-sm"><i class="fa fa-trash"></i> Delete </button>
                </form>
              </div>
            </div>
          </div>
        <?php }?>

        <div class="col-md-12">
        <br><br><br>
        </div>

      <?php }?>
    </div>
</div>
