<div class="tab-pane container <?php echo ($active_tab == 1? 'active' : 'fade'); ?>" id="home1">
  <h5 class="mb-5 mt-5">Create New User</h5>
  <form action="" method="post" class="">
    <input type="hidden" value="create_user" name="action"/>
    <div class="form-group">
      <label for="inputName" >Name</label>
      <input name="name" type="text" id="inputName" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="inputEmail" >Email address</label>
      <input name="email" type="email" id="inputEmail" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="inputPhone" >Phone</label>
      <input name="phone" type="text" id="inputPhone" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="inputPassword" >Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="inputRole" >Assign Role</label>
      <select name="user_type" id="inputRole" class="custom-select" required>
      <option value=""></option>
      <option value="administrator">Administrator</option>
      <option value="researcher">Researcher</option>
      <option value="reviewer">Reviewer</option>
      <option value="editor">Editor</option>
      </select>
  </div>

  <button class="btn btn-primary btn-block" type="submit">Add User</button>

  </form>
</div>
