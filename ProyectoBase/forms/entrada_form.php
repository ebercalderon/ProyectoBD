<fieldset>

    <div class="form-group">
        <label for="CodigoEntrada">Codigo Entrada*</label>
        <input type="text" name="CodigoEntrada" value="<?php echo htmlspecialchars($edit ? $entrada['CodigoEntrada'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Codigo Entrada" class="form-control" required="required" id="CodigoEntrada">
    </div>

    <div class="form-group">
        <label>Proveedor </label>

        <?php

        $link = conectarse();

        $query = "SELECT CodigoProveedor, Nombre FROM proveedor";

        $result = mysqli_query($link, $query) or die("Fallo en la obtener la data");

        $nQuery = mysqli_num_rows($result);

        if ($nQuery > 0) {
            for ($i = 0; $i < $nQuery; $i++) {
                $verQuery = mysqli_fetch_array($result);
                $CargaID[$i] = $verQuery["CodigoProveedor"];
                $ValID[$CargaID[$i]] = $verQuery["Nombre"];
            }
        }

        /*
        $col_values = array();

        while ($row = mysqli_fetch_array($result)) {
            $col_values = $row['CodigoProveedor'];
        }
        */

        ?>
        <select name="CodigoProveedor_" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione su proveedor</option>
            <?php
            if ($nQuery > 0) {
                for ($i = 0; $i < $nQuery; $i++) {
                    if ($edit && $CargaID[$i] == $entrada['CodigoProveedor_']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="' . $CargaID[$i] . '"' . $sel . '>' . $ValID[$CargaID[$i]] . '</option>';
                }
            }
            /*
            foreach ($col_values as $opt) {
                if ($edit && $opt == $entrada['CodigoProveedor']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                echo '<option value="' . $opt . '"' . $sel . '>' . $opt . '</option>';
            }
            */

            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Codigo Proyecto </label>

        <?php

        $link = conectarse();

        $query = "SELECT CodigoProyecto FROM proyecto";

        $result = mysqli_query($link, $query);

        $col_values = array();

        while ($row = mysqli_fetch_array($result)) {
            $col_values[] = $row['CodigoProyecto'];
        }

        ?>
        <select name="CodigoProyecto_" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione su proyecto</option>
            <?php
            foreach ($col_values as $opt) {
                if ($edit && $opt == $entrada['CodigoProyecto_']) {
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
        <label>Bien </label>

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
        <select name="CodigoBien_" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione un bien</option>
            <?php
            if ($nQuery > 0) {
                for ($i = 0; $i < $nQuery; $i++) {
                    if ($edit && $CargaID[$i] == $entrada['CodigoBien_']) {
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

    <div class="form-group">
        <label>Fecha</label>
        <input name="Fecha" value="<?php echo htmlspecialchars($edit ? $entrada['Fecha'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Fecha" class="form-control" type="date">
    </div>

    <div class="form-group">
        <label for="Factura">Factura *</label>
        <input type="text" name="Factura" value="<?php echo htmlspecialchars($edit ? $entrada['Factura'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Factura" class="form-control" required="required" id="Factura">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning">Agregar <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>