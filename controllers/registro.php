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
  <script type="text/javascript">
    var peticion1;

    if(document.addEventListener){window.addEventListener("load",iniciar)}
    else if(document.attachEvent){window.attachEvent("onload",iniciar)}

    function iniciar() {
      
      if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      peticion1 = new XMLHttpRequest();
      } else if (window.ActiveXObject) { // IE
      peticion1 = new ActiveXObject("Microsoft.XMLHTTP");
      }

      if(document.addEventListener){peticion1.addEventListener("readystatechange",muestra)}
      else if(document.attachEvent){peticion1.attachEvent("onreadystatechange",muestra)}

      peticion1.open("GET","cargarmunicipios.php",true);

      peticion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");//Esta para XML

      peticion1.send(null);
    }
    function muestra() {
      if (peticion1.readyState==4) {
        if (peticion1.status==200) {
          var respuestaXML=peticion1.responseXML;
          //alert(respuestaXML);
          var datos=respuestaXML.getElementsByTagName("datos").item(0);
          var misMunicipios=datos.getElementsByTagName("municipios").item(0);
          var misCodigos=datos.getElementsByTagName("codigos").item(0);
          var todosLosMunicipios=misMunicipios.getElementsByTagName("municipio");
          var todosLosCodigos=misCodigos.getElementsByTagName("codigo");
          var miselect=document.getElementById("miselect");
          for (var VnbIndice = 0; VnbIndice < todosLosMunicipios.length; VnbIndice++) {
            var mm=todosLosMunicipios.item(VnbIndice).textContent;
            var elemento=document.createElement("option");
            var valor=document.createTextNode(mm);
            elemento.appendChild(valor);
            elemento.setAttribute('value',todosLosCodigos.item(VnbIndice).textContent);
            miselect.appendChild(elemento);
          }
        }
      }
    }

  </script>

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
                    <a class="nav-link " href="contacto.php" tabindex="-1">Contacto</a>
                </li>
                <li class="nav-item ">
                    <?php
                    //session_start();
                    require_once("../db/db.php");
                    ?>
                    <a class="nav-link " href="login.php" tabindex="-1">
                        Login
                    </a>
                </li>


            </ul>
        </div>
    </nav>
    <?php
    if (isset($_SESSION['fallo'])) {
        if ($_SESSION['fallo'] == "registro") {
    ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>DNI incorrecto</strong> Ya existe un usuario con ese DNI.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }
    }
    ?>
    <div id="bienvenida">

        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Zona de Registro</h4>
                ¡Rellena tus datos y pide cuando quieras!
                <hr>

                <form method="POST" action="procesar_registro.php">
                    <div class="form-group" id="login">
                        <p>DNI<input type="text" name="dni" class="form-control" required /></p>
						<p>Contraseña<input type="password" name="password" class="form-control" required /></p>
                        <p>Nombre:<input type="text" name="nombre" class="form-control" required /></p>
                        <p>Apellidos:<input type="text" name="apellidos" class="form-control" required /></p>
                        <p>Direccion:<input type="text" name="direccion" class="form-control" required /></p>
						<p>Codigo Postal<input type="text" name="cp" class="form-control" required /></p>
                        <p>Municipio:<select id="miselect" name="municipio" class="form-control" required></select></p>
                        <p>Teléfono:<input type="tel" name="telefono" class="form-control" required /></p>
                        <p>Fecha de Nacimiento:<input type="date" name="fecha_nac" class="form-control" required /></p>
                        <input type="submit" value="Regístrate" class="btn btn-warning " />
                        <br>
                    </div>
                </form>
				<?php
					if ($_POST!=null) {
						require("../models/registro.php");
					}
				?>
            </div>
        </div>

    </div>

</body>

</html>