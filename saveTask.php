<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $pais = $_POST['pais'];
  $ciudad = $_POST['ciudad'];
  $gmail = $_POST['gmail'];


  $query = "INSERT INTO tbl_cliente(id, nombre, apellido, direccion, pais, ciudad, gmail, fecha) 
  VALUES (null, '$nombre', '$apellido', '$direccion', '$pais', '$ciudad', '$gmail', null)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>