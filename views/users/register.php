<head><link rel="stylesheet" href="../../assets/css/bootstrap.min.css"></head>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Register User</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?=ROOT_URL.'users/register' ?>">
    	<div class="form-group">
    		<label for="name">Nombre
    		<input type="text" name="name" class="form-control" />
            </label>
    	</div>
    	<div class="form-group">
    		<label for="email">Email
    		<input type="email" name="email" class="form-control" />
            </label>
    	</div>
        <div class="form-group">
            <label for="ciudad">Ciudad
            <input type="text" name="ciudad" class="form-control" />
            </label>
        </div>
    	<div class="form-group">
    		<label for="password">Contraseña
    		<input type="password" name="password" class="form-control" />
            </label>
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>