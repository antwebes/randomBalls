<?php

    $db_host="mysql";
    $db_nombre="ortografia";
    $db_usuario="root";
    $db_contra="pass";

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);

    if(mysqli_connect_errno()){

      echo "Fallo al conectar la BBDD";

      exit();

    }

    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");

    mysqli_set_charset($conexion, "utf8");

    $consulta="SELECT * FROM palabras ORDER BY RAND() LIMIT 10";

    $resultados=mysqli_query($conexion, $consulta);
    echo "{\n\"palabras\":\n[\n";

    $esUltimoResultado = mysqli_num_rows($resultados);
    $counter = 0;
      while ($fila = mysqli_fetch_array($resultados)) {
        if (++$counter == $esUltimoResultado) {
          printf("{\n\"palabra\": \"%s\",  \"resultado\": %s\n}\n", $fila[0], $fila[1]);
        } else {
          printf("{\n\"palabra\": \"%s\",  \"resultado\": %s\n},\n", $fila[0], $fila[1]);

        }
      }
  echo "]}";
  mysqli_close($conexion);
?>
