<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add Category</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?=ROOT_URL.'categories/add' ?>">
        <div class="form-group">
            <label>Identication identifier</label>
            <input type="text" name="pid" class="form-control" />
        </div>
    	<div class="form-group">
    		<label>Category Name</label>
    		<input type="text" name="name" class="form-control" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>categories">Cancel</a>
    </form>
  </div>
</div>
