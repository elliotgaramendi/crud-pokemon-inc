# [CRUD POKEMON INC](https://elliotgaramendi.000webhostapp.com/app/crud-pokemon-inc/frontend/) | [<img src="https://image.flaticon.com/icons/png/512/174/174857.png" height="20"/>](https://www.linkedin.com/in/elliotgaramendi/) | [<img src="https://image.flaticon.com/icons/png/512/733/733553.png" height="20"/>](https://github.com/ElliotXLeo) | [<img src="https://image.flaticon.com/icons/png/512/145/145802.png" height="20"/>](https://www.facebook.com/elliotgaramendi) | [<img src="https://image.flaticon.com/icons/png/512/1384/1384055.png" height="20"/>](https://api.whatsapp.com/send?phone=51997045329) | [<img src="https://image.flaticon.com/icons/png/512/975/975645.png" height="20"/>](https://nextjs-react-portafolio-fc.vercel.app) | [<img src="https://image.flaticon.com/icons/png/512/5439/5439199.png" height="20"/>](mailto:elliotgaramendi@gmail.com) | 

[![crud-pokemon-inc](https://i.postimg.cc/D0jDYfKZ/crud-pokemon-inc.png)](https://elliotgaramendi.000webhostapp.com/app/crud-pokemon-inc/frontend/)

## Resumen
Aplicación Web donde puedes administrar usuarios mediante un CRUD. La aplicación emplea MySQL como motor de base de datos, PHP de lado del Backend y PHP de lado del Frontend.

## Requisitos
- PHP 8.X
- MySQL 5.X
- Cliente Web (Opera, Firefox, Chrome, etc.)

## Instalación
- Archivos
  - Ubicarse en la carpeta dentro del servidor que contendrá la aplicación 
  - Abrir terminal de comandos
  - git clone https://github.com/ElliotXLeo/crud-pokemon-inc || descargar y copiar zip
  - cd crud-pokemon-inc || Ir desde el explorador de archivos
  - Abrir la aplicación en el editor de preferencia
  - Editar la variable $url de la línea 4 de /frontend/index.php y línea 6 de /frontend/views/editar.php a una ruta que coincida con el recurso /backend/models/usuarios.php en su servidor

- Base de datos
  - Ir a su cliente de Base de Datos
  - Crear la tabla develop
  - Usar la base de datos creada
  - Importar el script develop.sql
    - /base-de-datos

- Aplicación
  - Abrir un cliente web
  - Poner la url de su index principal (vista) del frontend
  - Disfrutar
  
## Posibles errores
- Si tiene credenciales diferentes en su motor de base de datos, deberá configurar el script ubicado en /backend/models/Conexion.php con su editor favorito.

## Tecnologías
| MYSQL | PHP | Bootstrap |
| --- | --- |--- |
| <img src="https://d1.awsstatic.com/asset-repository/products/amazon-rds/1024px-MySQL.ff87215b43fd7292af172e2a5d9b844217262571.png" width="1000"/> | <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" width="1000"/> | <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/1200px-Bootstrap_logo.svg.png" width="1000px"/> |

## Endpoints

### **usuarios**

> #### $_REQUEST['httpMethods'] == POST /backend/models/usuarios.php
> ##### Agrega un nuevo registro
**Nota:** Si emplea JavaScript desde el Frontend la data debe ser enviada empleando la clase **FormData**.

**Body**
```
{
  "usuario": "string",
  "clave": "string",
  "idRol": 0
}
```

> #### $_REQUEST['httpMethods'] == GET /backend/models/usuarios.php
> ##### Lee los registros

> #### $_REQUEST['httpMethods'] == GET /backend/models/usuarios.php
> ##### Lee un registro

**Body**
```
{
  "id": 0
}
```

> #### $_REQUEST['httpMethods'] == PUT /backend/models/usuarios.php
> ##### Actualiza un registro

**Body**
```
{
  "id": 0,
  "usuario": "string",
  "clave": "string",
  "idRol": 0
}
```

> #### $_REQUEST['httpMethods'] == DELETE /backend/models/usuarios.php
> ##### Elimina un registro

**Body**
```
{
  "id": 0
}
```

## Redes sociales
- LinkedIn: https://www.linkedin.com/in/elliotgaramendi/

- GitHub: https://github.com/ElliotXLeo

- Facebook: https://www.facebook.com/elliotgaramendi

- WhatsApp: https://api.whatsapp.com/send?phone=51997045329

- Personal Web: https://nextjs-react-portafolio-fc.vercel.app

- Correo: elliotgaramendi@gmail.com