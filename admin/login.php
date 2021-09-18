<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin Panel</title>
        <link href="css/datatable.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
		<div id="layoutAuthentication">
			<div id="layoutAuthentication_content">
				<main>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-5">
								<div class="card shadow-lg border-0 rounded-lg mt-5">
									<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
									<div class="card-body">
										<form action="login_process.php" method="post">
											<div class="form-floating mb-3">
												<input name="unm" class="form-control" id="inputEmail" type="text" placeholder="name@example.com"/>
												<lable for="inputEmail">username</lable>
											</div>
											<div class="form-floating mb-3">
												<input name="pwd" class="form-control" id="inputPassword" type="password" placeholder="password"/>
												<lable for="inputEmail">password</lable>
											</div>
											<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
												<a class="small" href="password.html">forgot password?</a>
												<button type="submit" class="btn btn-primary">Login</button>
											</div>
										</form>
									</div>
									<div class="card-footer text-center py-3">
										<div class"small"><a href="register.html">Need an account? sign up!</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
      
               
                            
        <script src="js/scripts.js"></script>
    </body>
</html>