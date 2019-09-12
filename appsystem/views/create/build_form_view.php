<div class="col-md-12">
  <h5><span class="badge badge-pill badge-success">2</span> Build form view :</h5>
</div>
<fieldset class="form-group col-md-4">
    <label for="inputDeveloper">Form name :</label>
    <input type="text" class="form-control" id="inputDeveloper" placeholder="Ex. SS2SEK">
</fieldset>
<fieldset class="form-group col-md-4">
    <label for="inputDeveloper">Developer name :</label>
    <input type="text" class="form-control" id="inputDeveloper" placeholder="Ex. SS2SEK">
</fieldset>

<div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
            <tr class="bg-info">
                <th width="30">#</th>
                <th class="text-center" width="50">Select</th>
                <th class="text-center">Column name</th>
                <th class="text-center">Data type</th>
                <th class="text-center">Default value</th>
                <th class="text-center" width="200">Input type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i_row = 0;
            foreach ($column_list as $key => $column):
                $i_row++;
            ?>
                <tr>
                    <td><?php echo $i_row; ?></td>
                    <td class="text-center">
                        <input type="checkbox" name="input_form[]"
                            data-column-name="<?php echo $column->column_name; ?>"
                            data-column-default="<?php echo $column->column_default; ?>"
                            data-data-type="<?php echo $column->data_type; ?>" checked/>
                    </td>
                    <td><?php echo $column->column_name; ?></td>
                    <td><?php echo $column->data_type ?></td>
                    <td><?php echo $column->column_default ?></td>
                    <td>
                        <select class="form-control input-type" name="<?php echo $column->column_name; ?>_type"
                            id="<?php echo $column->column_name; ?>_type"
                            data-column-name="<?php echo $column->column_name; ?>">
                            <option value="text">TEXT</option>
                            <option value="number">NUMBER</option>
                            <option value="radio">RADIO</option>
                            <option value="checkbox">CHECKBOX</option>
                            <option value="textarea">TEXTAREA</option>
                            <option value="email">EMAIL</option>
                        </select>
                        <div id="show_option_<?php echo $column->column_name; ?>"></div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
      </table>
    </div>

    <div class="text-center">
        <button type="button" class="btn btn-primary" onclick="generate()">
            Let's cook 🔥
        </button>
    </div>
    <hr>
</div>
