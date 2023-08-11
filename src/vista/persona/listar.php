<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/main.css" type="text/css">
  <link rel="stylesheet" href="public/css/producto/listar.css" type="text/css">
  <title>Document</title>
</head>

<body>
  <h1>pagina principal vista</h1>
  <?php
  require 'src/vista/menu.php'; ?>
  <table>
    <tr>
      <th>Id</th>
      <th>persona</th>
    </tr>
    <?php foreach ($this->datos as $persona) { ?>
    <tr>
      <td><?= $persona->getId(); ?></td>
      <td><?= $persona->getnombre(); ?></td>
    </tr>
    <?php }; ?>
  </table>
  <script src="public/js/listar.js"></script>
</body>

</html>