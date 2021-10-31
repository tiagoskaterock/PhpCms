<div class="well">

	<!-- Se logado mostra usuário e botão de sair -->
	<?php if (isset($_SESSION['user_role'])): ?>

		<!-- Usuário -->
		<label>
  		Logado como 
  		<span class="text-success">
	  		<?= ucfirst($_SESSION['username']) ?>	  			
  		</span>
		</label>

		<br>

		<!-- Botão -->
		<a href="includes/logout" class="btn btn-primary">
			Sair
		</a>  		

	<!-- Se não logado mostra formulário de login -->
	<?php else: ?>
  	<div>
	    <h4>Login</h4>

	    <form action="includes/login" method="post">

	      <div class="form-group">
	        <!-- name -->
	        <input name="user_name" type="text" class="form-control" placeholder="Enter User Name" id="user_name" style="margin-bottom: 5px;" required> 
	      </div>

	      <div class="input-group">
	        <!-- password -->
	        <input name="password" type="password" class="form-control" placeholder="Enter Password" id="password" required>  
	        <span class="input-group-btn">
	          <button class="btn btn-primary" name="login" type="submit">
	            Submit
	          </button>
	        </span>          
	      </div>

	    </form>
	    <!-- /.input-group -->	  		
  	</div>

	<?php endif ?>

</div>