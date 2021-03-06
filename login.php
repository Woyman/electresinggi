<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    
    <!-- <div class="container"> -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <div class="mx-auto"> 
                <h4 class="text-white"> Login Page </h4>
            </div>
            
        </div>
      </nav>
      
    <div class="container"> 
        
        <div class="row mt-5"> 
            <div class="col-6 mx-auto">
                <div class="card">                   
                    <div class="card-header bg-primary text-white">Login as Admin</div>
                    <div class="card-body">

                        <?php 
                            if( isset($_GET['error']) && $_GET['error'] == '1' )
                            { ?>
                                
                                <div class="alert alert-warning" role="alert">
                                    Username atau password salah!
                                </div>

                        <?php }elseif(isset($_GET['error']) && $_GET['error'] == '2' ) { ?>
                                
                                <div class="alert alert-warning" role="alert">
                                    Anda belum login!
                                </div>

                        <?php } ?>


                        <?php 
                            if(isset($_GET['logout']))
                            { ?>
                                
                                <div class="alert alert-info" role="alert">
                                    Anda telah logout
                                </div>

                            <?php }
                        ?>

                        <form action="admin/login.php" method="post">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            <div class="form-group">                                
                                    <button class="btn btn-primary col-12" name="login">Login</button>                                
                            </div>

                        </form>
                    </div>
                  </div>
            </div>
        </div>

    </div>


  
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>