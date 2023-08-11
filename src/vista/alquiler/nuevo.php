<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>agregar producto</h1>
  <?php
  require 'src/vista/menu.php'; ?>
  <form action="index.php?c=producto&m=crear" method="post">
    <label for="codigo">Duracion</label>
    <input type="number" name="Duracion" id="Duracion" value="Duracion">
    <br>
    <label for="descripcion">Costo</label>
    <input type="number" name="Costo" id="Costo" value="Costo">
    <br>
    <label for="precio">Persona</label>
    <input type="text" name="Persona" id="Persona" value="Persona">
    <br>
    <label for="fecha">Casa</label>
    <input type="text" name="Casa" id="Casa" value="Casa">
    <input type="submit" value="Enviar">
  </form>

</body>

</html>