<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>agregar Casa</h1>
  <?php
require 'src/vista/menu.php';?>
  <form action="index.php?c=casa&m=agregar" method="post">
    <label for="calle">calle</label>
    <input type="text" name="calle" id="calle" value="calle">
    <br>
    <label for="numero">numero</label>
    <input type="number" name="numero" id="numero" value="numero">
    <input type="submit" value="Enviar">
    <br>
  </form>

</body>

</html>