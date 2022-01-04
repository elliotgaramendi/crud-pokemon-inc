<?php require_once './components/index-apertura.php' ?>

<?php
$url = "http://localhost/projects/crud-pokemon-inc/backend/models/usuarios.php";
$parameters = "?httpMethods=GET";
$endpoint = $url . $parameters;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if (curl_errno($ch)) {
  echo (curl_error($ch));
}
curl_close($ch);
$usuarios = json_decode($response);
?>

<main class="container">
  <div class="row justify-content-center">

    <?php
    if (isset($_GET['mensaje'])) {
      if (empty($_GET['mensaje'])) {
      } else {
    ?>
        <div class="alert <?= $_GET['clase']; ?> alert-dismissible fade show" role="alert">
          <strong><?= $_GET['mensaje']; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
      }
    }
    ?>

    <div class="col-md-8 my-2">
      <div class="card">
        <div class="card-header">
          Listado de usuarios
        </div>
        <div class="card-body">
          <table class="table table-dark table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($usuarios as $elemento) {
                echo "
                  <tr>
                    <td>{$elemento->id}</td>
                    <td>{$elemento->usuario}</td>
                    <td>{$elemento->descripcion}</td>
                    <td>
                      <a href='./views/editar.php?id={$elemento->id}' class='text-decoration-none'>✏</a>
                      <a href='../backend/models/usuarios.php?httpMethods=DELETE&id={$elemento->id}' class='text-decoration-none'>🗑</a>
                    </td>
                  </tr>
                ";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4 my-2">
      <div class="card">
        <div class="card-header">
          Crear usuario
        </div>
        <div class="card-body">
          <form method="POST" action="../backend/models/usuarios.php">
            <div class="mb-3">
              <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="usuario" placeholder="Usuario" required />
            </div>
            <div class="mb-3">
              <input type="password" name="clave" class="form-control" id="clave" placeholder="Clave" required />
            </div>
            <select class="form-select mb-3" aria-label="Rol" name="idRol" id="idRol" required>
              <option value="1">Administrador</option>
              <option value="2" selected>Entreneador</option>
            </select>
            <button type="submit" class="btn btn-primary w-100" name="httpMethods" value="POST">Registrar</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</main>

<?php require_once './components/index-cierre.php' ?>