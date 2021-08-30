<fieldset>

    <div class="form-group">
        <label for="Codigo_Movimiento_">Codigo Movimiento*</label>
        <input type="text" name="Codigo_Movimiento_" value="<?php echo htmlspecialchars($edit ? $movimiento['Codigo_Movimiento_'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Codigo Movimiento" class="form-control" required="required" id="Codigo_Movimiento_">
    </div>

    <div class="form-group">
        <label for="Descripcion">Descripción *</label>
        <input type="text" name="Descripcion" value="<?php echo htmlspecialchars($edit ? $movimiento['Descripcion'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Descripción" class="form-control" required="required" id="Descripcion">
    </div>

    <div class="form-group">
        <label>Fecha</label>
        <input name="Fecha" value="<?php echo htmlspecialchars($edit ? $movimiento['Fecha'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Fecha" class="form-control" type="date">
    </div>

    <div class="form-group">
        <label>Proyecto </label>

        <?php

        $link = conectarse();

        $query = "SELECT CodigoProyecto, Nombre FROM proyecto";

        $result = mysqli_query($link, $query) or die("Fallo en la obtener la data");

        $nQuery = mysqli_num_rows($result);

        if ($nQuery > 0) {
            for ($i = 0; $i < $nQuery; $i++) {
                $verQuery = mysqli_fetch_array($result);
                $CargaID[$i] = $verQuery["CodigoProyecto"];
                $ValID[$CargaID[$i]] = $verQuery["Nombre"];
            }
        }

        ?>
        <select name="Codigo_Proyecto_" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione su bien</option>
            <?php
            if ($nQuery > 0) {
                for ($i = 0; $i < $nQuery; $i++) {
                    if ($edit && $CargaID[$i] == $movimiento['Codigo_Proyecto_']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="' . $CargaID[$i] . '"' . $sel . '>' . $ValID[$CargaID[$i]] . '</option>';
                }
            }

            ?>
        </select>
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning">Agregar <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>