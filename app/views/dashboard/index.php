<?php
$title = 'Dashboard';
include(__DIR__ . '/../layout/header.php');
?>
<form id="problems" class="well form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Show/Hide Problem</legend>
    <div class="control-group">
      <label class="control-label" for="problem_id">Problem ID</label>
      <div class="controls">
        <input type="number" class="input-small" id="problem_id" name="id" placeholder="Problem ID">
        <input type="submit" name="action" value="Show" class="btn btn-primary">
        <input type="submit" name="action" value="Hide" class="btn btn-inverse">
      </div>
    </div>
  </fieldset>
</form>
<form id="rejudge" class="well form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Rejudge Record</legend>
    <div class="control-group">
      <label class="control-label" for="rejudge_record_id">Record ID</label>
      <div class="controls">
        <input type="number" class="input-small" id="rejudge_record_id" name="id" placeholder="Record ID">
        <input type="submit" name="action" value="Rejudge" class="btn btn-danger">
      </div>
    </div>
  </fieldset>
</form>
<form id="manjudge" class="well form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Manually Judge Record</legend>
    <div class="control-group">
      <label class="control-label" for="manjudge_record_id">Record ID</label>
      <div class="controls">
        <input type="number" class="input-small" id="manjudge_record_id" name="id" placeholder="Record ID">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="manjudge_score">Score</label>
      <div class="controls">
        <input type="number" class="input-small" id="manjudge_score" name="score" placeholder="Score">
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="submit" name="action" value="Manually Judge" class="btn btn-info">
      </div>
    </div>
  </fieldset>
</form>
<form id="create_report" class="well form-horizontal" method="POST">
  <fieldset>
    <legend>Create Report</legend>
    <div class="control-group">
      <label class="control-label" for="create_report_title">Title</label>
      <div class="controls">
        <input type="text" id="create_report_title" name="title" placeholder="Title">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="create_report_visible">Visibility</label>
      <div class="controls">
        <select id="create_report_visible" name="visible">
          <option value="0">Private (only to administrators)</option>
          <option value="1">Public (visible to all users)</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="create_report_start_time">Start Time</label>
      <div class="controls">
        <input type="text" id="create_report_start_time" name="start_time" placeholder="YYYY-MM-DD HH:MM:SS">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="create_report_end_time">End Time</label>
      <div class="controls">
        <input type="text" id="create_report_end_time" name="end_time" placeholder="YYYY-MM-DD HH:MM:SS">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="create_report_problem_list">Problem List</label>
      <div class="controls">
        <textarea id="create_report_problem_list" name="problem_list" rows="5" placeholder="One problem ID per line"></textarea>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="create_report_user_list">User List</label>
      <div class="controls">
        <textarea id="create_report_user_list" name="user_list" rows="5" placeholder="One username per line"></textarea>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button class="btn btn-success">Create Report</button>
      </div>
    </div>
  </fieldset>
</form>
<form id="reports" class="well form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Show/Hide/Remove Report</legend>
    <div class="control-group">
      <label class="control-label" for="report_id">Report ID</label>
      <div class="controls">
        <input type="number" class="input-small" id="report_id" name="id" placeholder="Report ID">
        <input type="submit" name="action" value="Show" class="btn btn-primary">
        <input type="submit" name="action" value="Hide" class="btn btn-inverse">
        <input type="submit" name="action" value="Remove" class="btn btn-danger">
      </div>
    </div>
  </fieldset>
</form>
<form id="permissions" class="well form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Add/Remove Permission</legend>
    <div class="control-group">
      <label class="control-label" for="user_name">User</label>
      <div class="controls">
        <input type="text" id="user_name" name="user_name" placeholder="Username">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="permission_name">Permission</label>
      <div class="controls">
        <select id="permission_name" name="permission_name">
          <option value="" selected="selected"></option>
          <option value="manage-site">Manage Site</option>
          <option value="view-any-problem">View Any Problem</option>
          <option value="view-any-record">View Any Record</option>
          <option value="view-any-report">View Any Report</option>
          <option value="create-report">Create Report</option>
          <option value="remove-report">Remove Report</option>
          <option value="rejudge-record">Rejudge Record</option>
          <option value="add-permission">Add Permission</option>
          <option value="remove-permission">Remove Permission</option>
          <option value="list-variables">List Variables</option>
          <option value="set-variable">Set Variable</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="submit" name="action" value="Add" class="btn btn-success">
        <input type="submit" name="action" value="Remove" class="btn btn-danger">
      </div>
    </div>
  </fieldset>
</form>
<form id="assigned_permissions" class="well form-horizontal">
  <fieldset>
    <legend>Assigned Permissions</legend>
    <table class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
          <th>User</th>
          <th>Permission</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->permissions as $p): ?>
          <tr>
            <td><?php echo $p->getUserName(); ?></td>
            <td><?php echo $p->getPermissionName(); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </fieldset>
</form>
<form id="set_variable" class="well form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Set Variable</legend>
    <div class="control-group">
      <label class="control-label" for="set_variable_name">Name</label>
      <div class="controls">
        <input type="text" class="input-xxlarge" id="set_variable_name" name="name" placeholder="Name" value="<?php echo fHTML::encode($this->setvar_name); ?>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="set_variable_value">Value</label>
      <div class="controls">
        <textarea id="set_variable_value" name="value" style="width: 800px; font-family: Monaco, Lucida Console, Courier New, Free Monospaced;" rows="10" placeholder="Variable value here"><?php echo fHTML::encode($this->setvar_value); ?></textarea>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="set_variable_remove">Remove?</label>
      <div class="controls">
        <select id="set_variable_remove" name="remove">
          <option value="No">No</option>
          <option value="Yes"<?php if ($this->setvar_remove) echo ' selected'; ?>>Yes</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button class="btn btn-primary">Set Variable</button>
      </div>
    </div>
  </fieldset>
</form>
<form id="variables" class="well form-horizontal">
  <fieldset>
    <legend>All Variables</legend>
    <ul>
      <?php foreach ($this->variables as $v): ?>
        <li><a href="#<?php echo fHTML::encode($v->getName()); ?>"><?php echo fHTML::prepare($v->getName()); ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php foreach ($this->variables as $v): ?>
      <h3 id="<?php echo fHTML::encode($v->getName()); ?>"><?php echo fHTML::prepare($v->getName()); ?></h3>
      <a href="#variables">[list]</a>
      <a href="?edit=<?php echo fHTML::encode($v->getName()); ?>#set_variable">[edit]</a>
      <a href="?remove=<?php echo fHTML::encode($v->getName()); ?>#set_variable">[remove]</a>
      <pre><?php echo fHTML::encode($v->getValue()); ?></pre>
    <?php endforeach; ?>
  </fieldset>
</form>
<?php
include(__DIR__ . '/../layout/footer.php');
