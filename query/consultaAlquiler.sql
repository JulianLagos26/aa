SELECT p.id, p.nombre, c.id, c.calle,c.numero ,a.duracionMeses,a.costo FROM alquiler a
      INNER JOIN persona p ON a.persona_id = p.id
      INNER JOIN casa c ON a.casa_id = c.id;