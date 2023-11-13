<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Apellido" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="direccion" class="form-control" placeholder="Direccion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="pais" class="form-control" placeholder="Pais" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="gmail" class="form-control" placeholder="Gmail" autofocus>
          </div>

          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Gmail</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_cliente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['pais']; ?></td>
            <td><?php echo $row['gmail']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>