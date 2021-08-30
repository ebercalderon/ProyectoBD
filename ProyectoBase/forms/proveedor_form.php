<fieldset>

    <div class="form-group">
        <label for="CodigoProveedor">Codigo *</label>
        <input type="text" name="CodigoProveedor" value="<?php echo htmlspecialchars($edit ? $proveedor['CodigoProveedor'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Codigo" class="form-control" required="required" id="CodigoProveedor">
    </div>

    <div class="form-group">
        <label for="Nombre">Nombre *</label>
        <input type="text" name="Nombre" value="<?php echo htmlspecialchars($edit ? $proveedor['Nombre'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nombre" class="form-control" required="required" id="Nombre">
    </div>

    <div class="form-group">
        <label>Rubro </label>
        <?php $opt_arr = array("Construccion", "Industria", "General");
        ?>
        <select name="Rubro" class="form-control selectpicker" required>
            <option value=" ">Por favor seleccione su rubro</option>
            <?php
            foreach ($opt_arr as $opt) {
                if ($edit && $opt == $proveedor['Rubro']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                echo '<option value="' . $opt . '"' . $sel . '>' . $opt . '</option>';
            }

            ?>
        </select>
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning">Agregar <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>