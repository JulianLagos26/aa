use Leandro\app\modelo\Persona;
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="index.php?c=alquiler&m=alquilar" method="post">
    <label for="codigo">duracionMeses</label>
    <input type="text" value="duracionMeses" name="duracionMeses" id="duracionMeses" required>
    <br>
    <label for="codigo">costo</label>
    <input type="text" value="costo" name="costo" id="costo" required>
    <br>

    <!-- listar personas -->

    <select name="persona" id="">
      <?php foreach ($this->datos->personas as $persona) {?>
      <option value="<?=$persona->getId();?>"><?=$persona->getNombre();?></option>
      <?php }
;?>
    </select>
    <br>
    <label for="codigo">casa</label>
    <input type="text" value="casa" name="casa" id="casa" required>
    <br>
    <input type="submit" value="Enviar">
    <br>
  </form>

</body>

</html>