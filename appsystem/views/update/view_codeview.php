<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$folder_name  = $ex[1];

$form_group = '
        <input type="hidden" value="<?php echo $id; ?>" id="id" name="id"/>';
foreach ($input_list as $key => $input) {
    switch ($input['input_type']) {
        case 'text':
        case 'number':
        case 'email':
        $form_group.='
        <fieldset class="form-group col-md-6">
          <label for="'.$input['column_name'].'">'.$input['label'].'</label>
          <input type="'.$input['input_type'].'" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="" value="<?php echo $rdata->'.$input['column_name'].'; ?>">
        </fieldset>';
            break;

        case 'radio':
        if($input['option'] != ''){
            $radio ='';
            foreach ($input['option']  as $key => $option) {
            $radio.='
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="'.$input['column_name'].'" id="'.$option['id'].'" value="'.$option['value'].'" value="<?php echo $rdata->'.$input['column_name'].'; ?>">
              <label class="form-check-label" for="'.$option['id'].'">'.$option['title'].'</label>
            </div>';
            }
        $form_group .='     <fieldset class="form-group col-md-6">
            <label for="'.$input['column_name'].'">'.$input['label'].'</label><br>'
        .$radio.'
        </fieldset>';

        }else{

        $form_group.='
        <fieldset class="form-group col-md-6">
          <label for="'.$input['column_name'].'">'.$input['label'].'</label>
          <input type="text" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="" value="<?php echo $rdata->'.$input['column_name'].'; ?>">
        </fieldset>';
        }

            break;

        case 'checkbox':
        if($input['option'] != ''){
            $checkbox ='';
            foreach ($input['option']  as $key => $option) {
            $checkbox.='
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="'.$input['column_name'].'[]" id="'.$option['id'].'" value="'.$option['value'].'">
              <label class="form-check-label" for="'.$option['id'].'">'.$option['title'].'</label>
            </div>';
            }
        $form_group .='     <fieldset class="form-group col-md-6">
            <label for="'.$input['column_name'].'">'.$input['label'].'</label><br>'
        .$checkbox.'
        </fieldset>';

        }else{

        $form_group.='
        <fieldset class="form-group col-md-6">
          <label for="'.$input['column_name'].'">'.$input['label'].'</label>
          <input type="text" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="" value="<?php echo $rdata->'.$input['column_name'].'; ?>">
        </fieldset>';
        }
            break;

        case 'select':
        if($input['option'] != ''){
            $option_el = '';
            foreach ($input['option']  as $key => $option) {
                $option_el .= '<option value="'.$option['value'].'">'.$option['title'].'</option>';
            }
            $form_group.='
        <fieldset class="form-group col-md-6">
          <label for="'.$input['column_name'].'">'.$input['label'].'</label>
          <select class="form-control" id="'.$input['column_name'].'" name="'.$input['column_name'].'">
            '.$option_el.'
          </select>
        </fieldset>';
        }else{

        $form_group.='
        <fieldset class="form-group col-md-6">
          <label for="'.$input['column_name'].'">'.$input['label'].'</label>
          <input type="text" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="" value="<?php echo $rdata->'.$input['column_name'].'; ?>">
        </fieldset>';
        }
            break;

        case 'textarea':
        $form_group.='
        <fieldset class="form-group">
          <label for="'.$input['column_name'].'">'.$input['label'].'</label>
          <textarea class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" rows="3"><?php echo $rdata->'.$input['column_name'].'; ?></textarea>
        </fieldset>';
            break;
    }
}

$html = '<form name="'.$form_name.'">
    <div class="row">'.
    $form_group.'
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-edit">SAVE</button>
    </div>
</form>';
?>

<div class="row">
    <div class="col-md-4">
        <strong><i class="fa fa-cubes" aria-hidden="true"></i> Plugins list</strong>
        <ol>
            <li>Bootstrap v.4</li>
            <li>JQuery</li>
            <li>SerializeJSON</li>
            <li>PNotify</li>
            <li>SweetAlert2</li>
        </ol>
    </div>
</div>
<h5>
    Step 1 Create file <span class="text-info">edit_view.php</span>
    in folder views/<?php echo $folder_name;?> and copy below code to <span class="text-info">edit_view.php</span>
</h5>

<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($html); ?></code></pre>
