<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tbl_cliente WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta fallida.");
  }

  $_SESSION['message'] = 'Borrado con Exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>