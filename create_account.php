<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="style.css" rel="stylesheet">
</head>
<body>
   <div class="row">
     <div class="col-md-1"></div>
     <div class="col-md-10">
        <div class="wrapper">
        <p class="p_create">Create Account</p>
        <form id="form_input" method="post" action="create_account_validation.php">
        <input type="fullname" name="fullname" id="fullname" placeholder="Full name" class="form-control" required >
        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required >
        <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>        
        <input type="submit" id="btn_submit" class="btn btn-lg btn-success form-control" value="Sign Up">
        </form>
        </div>
     </div>
     <div class="col-md-1"></div>
   </div>
</body>
</html>