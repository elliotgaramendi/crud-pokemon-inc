<?php
require_once './Conexion.php';

if (isset($_REQUEST['httpMethods']) && !empty($_REQUEST['httpMethods'])) {
  switch ($_REQUEST['httpMethods']) {
    case 'POST':
      if (empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['idRol'])) {
        header('Location: ../../frontend/?mensaje=Datos imcompletos&clase=alert-warning');
      } else {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $idRol = $_POST['idRol'];
        $claveEncriptada = md5($clave);

        $sentencia = $pdo->prepare('INSERT INTO usuarios(usuario, clave, id_rol) VALUES (?, ?, ?);');
        $resultado = $sentencia->execute([$usuario, $claveEncriptada, $idRol]);
        $pdo = null;
        if ($resultado === true) {
          header('Location: ../../frontend?mensaje=Registrado&clase=alert-primary');
        } else {
          header('Location: ../../frontend?mensaje=error');
        }
      }
      break;

    case 'GET':
      if (!isset($_GET['id']) || empty($_GET['id'])) {
        $sentencia = $pdo->query('SELECT usu.id, usu.usuario, rol.descripcion FROM usuarios usu INNER JOIN roles rol ON usu.id_rol = rol.id;');
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
      } else {
        $sentencia = $pdo->prepare('SELECT usuario, clave, id_rol FROM usuarios WHERE id = ?;');
        $sentencia->execute([$_GET['id']]);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
      }
      break;

    case 'PUT':
      if (empty($_POST['id']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['idRol'])) {
        header('Location: ../../frontend/?mensaje=Datos imcompletos&clase=alert-warning');
      } else {
        $id = $_POST['id'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $idRol = $_POST['idRol'];

        $sentencia = $pdo->prepare('UPDATE usuarios SET usuario=?, clave=?, id_rol=? WHERE id=?;');
        $resultado = $sentencia->execute([$usuario, $clave, $idRol, $id]);

        if ($resultado === true) {
          header('Location: ../../frontend/?mensaje=Editado&clase=alert-success');
        } else {
          header('Location: ../../frontend/?mensaje=error');
        }
      }

      break;

    case 'DELETE':
      if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: ../../frontend/?mensaje=Datos imcompletos&clase=alert-warning');
      } else {
        $id = $_GET['id'];

        $sentencia = $pdo->prepare('DELETE FROM usuarios WHERE id = ?;');
        $resultado = $sentencia->execute([$id]);

        if ($resultado === true) {
          header('Location: ../../frontend/?mensaje=Eliminado&clase=alert-danger');
        } else {
          header('Location: ../../frontend/?mensaje=error');
        }
      }
      break;

    default:
      echo ('Método no disponible');
      break;
  }
  if (isset($resultado) && !empty($resultado)) {
    $data = $resultado;
  } else {
    $data = null;
  }
} else {
  $data = ['error' => 'No httpMethods'];
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$pdo = null;
