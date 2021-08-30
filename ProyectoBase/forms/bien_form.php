<fieldset>
    <script type="text/javascript">
        function total() {

            m1 = document.getElementById("Cantidad").value;
            m2 = document.getElementById("UM").value;

            document.getElementById('Monto').value = m1*m2;
        }
    </script>

    <div class="form-group">
        <label for="CodigoBien">Código Bien *</label>
        <input type="text" name="CodigoBien" value="<?php echo htmlspecialchars($edit ? $bien['CodigoBien'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Código Bien" class="form-control" required="required" id="CodigoBien">
    </div>

    <div class="form-group">
        <label for="Descripcion">Descripción *</label>
        <input type="text" name="Descripcion" value="<?php echo htmlspecialchars($edit ? $bien['Descripcion'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Descripción" class="form-control" required="required" id="Descripcion">
    </div>

    <div class="form-group">
        <label for="UM">UM</label>
        <input name="UM" value="<?php echo htmlspecialchars($edit ? $bien['UM'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="UM" class="form-control" type="float" id="UM" onchange="total();">
    </div>

    <div class="form-group">
        <label for="Cantidad">Cantidad</label>
        <input name="Cantidad" value="<?php echo htmlspecialchars($edit ? $bien['Cantidad'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Cantidad" class="form-control" type="number" id="Cantidad" onchange="total();">
    </div>

    <div class="form-group">
        <label for="Monto">Monto</label>
        <input name="Monto" value="<?php echo htmlspecialchars($edit ? $bien['Monto'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Monto" class="form-control" type="text" id="Monto" readonly>
    </div>
    
    <!--
    <div class="form-group">
        <label>Estado </label>
        <?php $opt_arr = array("Bueno", "Regular", "Malo");
        ?>
        <select name="estado" class="form-control selectpicker" required>
            <option value=" ">Seleccione estado</option>
            <?php
            foreach ($opt_arr as $opt) {
                if ($edit && $opt == $bien['estado']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                echo '<option value="' . $opt . '"' . $sel . '>' . $opt . '</option>';
            }

            ?>
        </select>
    </div>
        -->

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning">Agregar <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>