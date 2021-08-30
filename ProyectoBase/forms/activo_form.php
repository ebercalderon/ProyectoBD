<fieldset>

    <div class="form-group">
        <label for="CodigoActivo">Codigo Activo*</label>
        <input type="text" name="CodigoActivo" value="<?php echo htmlspecialchars($edit ? $activo['CodigoActivo'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Codigo Activo" class="form-control" required="required" id="CodigoActivo">
    </div>

    <div class="form-group">
        <label>Estado </label>
        <?php $opt_arr = array("Bueno", "Regular", "Malo");
        ?>
        <select name="Estado" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione su estado</option>
            <?php
            foreach ($opt_arr as $opt) {
                if ($edit && $opt == $activo['Estado']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                echo '<option value="' . $opt . '"' . $sel . '>' . $opt . '</option>';
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Activo </label>

        <?php

        $link = conectarse();

        $query = "SELECT CodigoBien, Descripcion FROM bien";

        $result = mysqli_query($link, $query) or die("Fallo en la obtener la data");

        $nQuery = mysqli_num_rows($result);

        if ($nQuery > 0) {
            for ($i = 0; $i < $nQuery; $i++) {
                $verQuery = mysqli_fetch_array($result);
                $CargaID[$i] = $verQuery["CodigoBien"];
                $ValID[$CargaID[$i]] = $verQuery["Descripcion"];
            }
        }

        ?>
        <select name="Codigo_Bien" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione su bien</option>
            <?php
            if ($nQuery > 0) {
                for ($i = 0; $i < $nQuery; $i++) {
                    if ($edit && $CargaID[$i] == $activo['Codigo_Bien']) {
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