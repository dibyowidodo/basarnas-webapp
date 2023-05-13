<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in for Basarnas Webapp</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="assets/icon" href="assets/Basarnas_Logo.ico">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body class="text-center">
    
    <main class="form-signin w-100 m-auto">
      <form id="form_input" method="post" action="login_validation.php">
        <img class="mb-4" src="assets/Basarnas_Logo.png" alt="" width="102" height="102">
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating">
          <input type="registered-email" name="email" id="floatingInput" placeholder="name@example.com" class="form-control" required>
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" id="floatingPassword" placeholder="Password" class="form-control" required>
          <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" value="Login">Log in</button>
        <p class="mt-4 mb-3">Don't have an account? <a href="create_account.php">Sign up now</a></p>
        <p class="mt-1 mb-3 text-muted">&copy; 2022–2023</p>
      </form>
    </main>


    
  </body>
</html>
