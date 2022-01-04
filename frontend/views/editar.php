<?php require_once '../components/index-apertura.php' ?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $url = "http://localhost/projects/crud-pokemon-inc/backend/models/usuarios.php";
  $parameters = "?httpMethods=GET&id={$id}";
  $endpoint = $url . $parameters;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  if (curl_errno($ch)) {
    echo (curl_error($ch));
  }
  curl_close($ch);
  $usuario = json_decode($response);
} else {
  header('Location: ../');
  exit();
}
?>


<main class="container">
  <div class="row justify-content-center">

    <div class="col-md-4 my-2">
      <div class="card">
        <div class="card-header">
          Editar usuario
        </div>
        <div class="card-body">
          <form method="POST" action="../../backend/models/usuarios.php">
            <div class="mb-3">
              <input type="text" name="id" class="form-control" id="id" aria-describedby="id" placeholder="Id" required value="<?= $id ?>" hidden />
            </div>
            <div class="mb-3">
              <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="usuario" placeholder="Usuario" required value="<?= $usuario->usuario ?>" />
            </div>
            <div class="mb-3">
              <input type="text" name="clave" class="form-control" id="clave" aria-describedby="clave" placeholder="Clave" required value="<?= $usuario->clave ?>" hidden />
            </div>
            <div class="mb-3">
              <input type="number" name="idRol" class="form-control" id="idRol" placeholder="Id Rol" required value="<?= $usuario->id_rol ?>" />
            </div>
            <button type="submit" class="btn btn-success w-100" name="httpMethods" value="PUT">Editar</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</main>

<?php require_once '../components/index-cierre.php' ?>