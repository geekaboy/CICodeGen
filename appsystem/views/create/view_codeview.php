<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$folder_name  = $ex[1];

$form_group = '';
foreach ($input_list as $key => $input) {
    switch ($input['input_type']) {
        case 'text':
        case 'number':
        case 'email':
        $form_group.='
                <fieldset class="form-group col-md-6">
                  <label for="'.$input['column_name'].'">'.$input['label'].'</label>
                  <input type="'.$input['input_type'].'" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="">
                </fieldset>';
        break;

        case 'radio':
        if($input['option'] != ''){
            $radio ='';
            foreach ($input['option']  as $key => $option) {
            $radio.='
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="'.$input['column_name'].'"  value="'.$option['value'].'">
                      <label class="form-check-label">'.$option['title'].'</label>
                    </div>';
            }
            $form_group .='
                <fieldset class="form-group col-md-6">
                    <label for="'.$input['column_name'].'">'.$input['label'].'</label><br>'
                .$radio.'
                </fieldset>';

        }else{

            $form_group.='
                <fieldset class="form-group col-md-6">
                  <label for="'.$input['column_name'].'">'.$input['label'].'</label>
                  <input type="text" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="">
                </fieldset>';
        }

            break;

        case 'checkbox':
        if($input['option'] != ''){
            $checkbox ='';
            foreach ($input['option']  as $key => $option) {
            $checkbox.='
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="'.$input['column_name'].'[]" value="'.$option['value'].'">
                      <label class="form-check-label" >'.$option['title'].'</label>
                    </div>';
            }
            $form_group .='
                <fieldset class="form-group col-md-6">
                    <label for="'.$input['column_name'].'">'.$input['label'].'</label><br>'
                .$checkbox.'
                </fieldset>';

        }else{

            $form_group.='
                <fieldset class="form-group col-md-6">
                  <label for="'.$input['column_name'].'">'.$input['label'].'</label>
                  <input type="text" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="">
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
              <input type="text" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="">
            </fieldset>';
        }
            break;

        case 'textarea':
        $form_group.='
                <fieldset class="form-group col-md-6">
                  <label for="'.$input['column_name'].'">'.$input['label'].'</label>
                  <textarea class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" rows="3"></textarea>
                </fieldset>';
            break;
    }
}

$html = '
<main role="main" class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
            <form name="'.$form_name.'" class="row">'.$form_group.'
                <div class="col-md-12 text-center mt-3">
                    <button type="button" class="btn btn-lg btn-primary btn-save" onclick="save()">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</main>';
?>

<div class="row">
    <div class="col-md-4">
        <strong><i class="fa fa-cubes" aria-hidden="true"></i> Plugins list</strong>
        <ol>
            <li>Bootstrap v.4</li>
            <li>JQuery</li>
            <li>SerializeJSON</li>
        </ol>
    </div>
</div>
<h5>
    Step 1 Create file <span class="text-info">add_view.php</span>
    in folder views/<?php echo $folder_name;?> and copy below code to <span class="text-info">add_view.php</span>
</h5>

<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($html); ?></code></pre>
<hr>
<div class="col-md-12 mt-3">
    <div class="text-center mb-5">
        <h5><i class="fa fa-file-code-o" aria-hidden="true"></i> Preview </h5>
    </div>

    <?php echo $html; ?>
</div>
