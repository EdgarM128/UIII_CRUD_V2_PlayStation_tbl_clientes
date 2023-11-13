<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_cliente WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $ciudad = $row['ciudad'];
    $pais = $row['pais'];
    $gmail = $row['gmail'];
    $fecha = $row['fecha'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $pais = $_POST['pais'];
  $ciudad = $_POST['ciudad'];
  $gmail = $_POST['gmail'];
  $fecha = $_POST['fecha'];
  

  $query = "UPDATE tbl_cliente set nombre = '$nombre', apellido = '$apellido', 
  direccion = '$direccion', ciudad = '$ciudad', pais = '$pais', gmail = '$gmail', fecha = '$fecha'
  WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group">
            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" value="<?php echo $apellido; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ciudad" class="form-control"value="<?php echo $ciudad; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="pais" class="form-control" value="<?php echo $pais; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="gmail" class="form-control" value="<?php echo $gmail; ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="fecha" class="form-control" value="<?php echo $fecha; ?>" disabled>
          </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>