<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Greatfood</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css.css" />
    <script type="text/javascript" src="../js.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">GreatFood</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="platos.php" tabindex="-1">Platos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1">Contacto</a>
                </li>
                <li class="nav-item ">
                 <?php
          session_start();
          require_once("../db/db.php");
          
          if (isset($_SESSION['dni'])) {
          ?>
            <a class="nav-link " href="area_personal.php" tabindex="-1">
              Area personal
            </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="logout.php" tabindex="-1">
            Logout
          </a>
        </li>
      <?php

          } else {
      ?>
        <a class="nav-link " href="login.php" tabindex="-1">
          Login
        </a>
        </li>


      <?php
          }
      ?>


            </ul>
        </div>
    </nav>
    <div id="bienvenida">

        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Contacto</h4>
                Si tienes cualquier problema sobre el producto o sobre el funcionamiento de la pagina no dude en contactarnos.
                <hr>

                <form action="datos.php" method="POST">
                    <div class="form-group" id="login">
                        <p>Nombre*<input type="text" name="name" class="form-control" required /></p>
                        <p>Apellido*:<input type="text" name="lastname" class="form-control" required /></p><br />
                        <p>Teléfono(Opcional):<input type="tel" name="telefono" class="form-control" /></p><br />
                        <p>Numero de pedido*:<input type="text" name="num_pedido" class="form-control" required /></p><br />
                        <input type="submit" value="Envio" class="btn btn-warning " />
                        <br>
                        <p color="red">*:son obligatorios</p>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>