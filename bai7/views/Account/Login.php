<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <br>
    <br>
    <div class="containner">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" size="20" name="txtUser" class="form-control" />
                        <label class="form-label" for="form2Example1">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" size="20" name="txtPassword" class="form-control" />
                        <label class="form-label"  for="form2Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" name="btnLogin" value="Login"  class="btn btn-primary btn-block mb-4"/>
                    <input type="reset" name="btnReset" value="Reset"  class="btn btn-primary btn-block mb-4"/>
                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>
                </form>
                
                <?php
                    if(isset($_POST["btnLogin"])){
                        if($_POST["txtUsername"] == "admin"){
                            echo '<script type="text/javascript">
                            window.location = "admin.php"
                        </script>';
                        }else{
                            echo '<script type="text/javascript">
                                alert("Sai ten dang nhap");
                        </script>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>