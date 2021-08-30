<fieldset>

    <div class="form-group">
        <label for="CodigoProyecto">Codigo *</label>
        <input type="text" name="CodigoProyecto" value="<?php echo htmlspecialchars($edit ? $proyecto['CodigoProyecto'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Codigo" class="form-control" required="required" id="CodigoProyecto">
    </div>

    <div class="form-group">
        <label for="Nombre">Descripcion *</label>
        <input type="text" name="Nombre" value="<?php echo htmlspecialchars($edit ? $proyecto['Nombre'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nombre" class="form-control" required="required" id="Nombre">
    </div>

    <div class="form-group">
        <label for="Encargado">Encargado *</label>
        <input type="text" name="Encargado" value="<?php echo htmlspecialchars($edit ? $proyecto['Encargado'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Encargado" class="form-control" required="required" id="Encargado">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning">Agregar <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>