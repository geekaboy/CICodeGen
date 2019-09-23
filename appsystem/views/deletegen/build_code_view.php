<div class="col-md-12">
  <h5><span class="badge badge-pill badge-success">2</span> Build form view :</h5>
</div>
<fieldset class="form-group col-md-3">
    <label for="developer_name">Developer name :</label>
    <input type="text" class="form-control" id="developer_name" placeholder="Ex. SS2SEK">
</fieldset>

<div class="col-md-12">
    <strong><i class="fa fa-filter" aria-hidden="true"></i> SELECT CONDITION</strong>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
            <tr class="bg-info">
                <th width="30">#</th>
                <th class="text-center" width="50">Select</th>
                <th class="text-center" width="200">Label</th>
                <th class="text-center" width="200">Column name</th>
                <th class="text-center" width="350">Data type</th>
                <th class="text-center">Operator</th>
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
                    <td>
                         <fieldset class="form-group">
                            <input type="text" class="form-control" id="input_label_<?php echo $column->column_name; ?>"
                                value="<?php echo $column->column_name; ?>">
                         </fieldset>
                    </td>
                    <td><?php echo $column->column_name; ?></td>
                    <td><?php echo $column->data_type ?></td>
                    <td>
                        <select class="form-control" name="op_<?php echo $column->column_name; ?>" id="op_<?php echo $column->column_name; ?>">
                            <option value="="> = (Equal to)</option>
                            <option value=">"> > (Greater than)</option>
                            <option value="<"> < (Less than)</option>
                            <option value=">="> >= (Greater than or equal to)</option>
                            <option value="!="> <> (Not equal to)</option>
                        </select>
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
