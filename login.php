<?php
    require 'head.php';
?>

<div class="container h-100">
<div class="d-flex justify-content-center h-100">
	<div class="login-card">
		<div class="d-flex justify-content-center">
		    <div class="logo-container circle">
		        <img id="logo" src="img/logo-gpt-petra.png" alt="logo gereja petra">
		    </div>
	    </div>
	    <div class="d-flex justify-content-center">
		    <form action="/" class="login-form">
		        <div class="form-group">
		            <label class="sr-only" for="username">Username</label>
		            <div class="input-group">
		            	<div class="input-group-append">
			            	<span class="input-group-text">#</span>
			            </div>
		            	<input class="form-control" type="text" name="username" id="username" placeholder="Username">
		            </div>
		        </div>
		        <div class="form-group">
		            <label class="sr-only" for="password">Password</label>
		            <div class="input-group">
			            <div class="input-group-append">
			            	<span class="input-group-text">#</span>
			            </div>
		            	<input class="form-control" type="password" name="password" id="password" placeholder="Password">
		        	</div>
		        </div>
		        <div class="d-flex justify-content-center mt-3 login-btn-container">
		        	<button type="submit" class="btn btn-primary">Login</button>   
		        </div>

			</form>
		</div>
	</div>
</div>
</div>

<?php
    require 'footer.php';
?>

