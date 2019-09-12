<?php
$form_group = '';
foreach ($input_list as $key => $input) {
    switch ($input['input_type']) {
        case 'text':
        case 'number':
        case 'email':
    $form_group.='
    <fieldset class="form-group">
      <label for="'.$input['column_name'].'">'.$input['column_name'].'</label>
      <input type="'.$input['input_type'].'" class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" placeholder="">
    </fieldset>
';
            break;

        case 'radio':
    $form_group.='
    <div class="radio">
      <label>
        <input type="radio" name="'.$input['column_name'].'" id="'.$input['column_name'].'" value="option1">
        Option one is this and that&mdash;be sure to include why its great
      </label>
    </div>
';
            break;

        case 'checkbox':
    $form_group.='
    <div class="checkbox">
      <label>
        <input type="checkbox" name="'.$input['column_name'].'"> Option variable
      </label>
    </div>
';
            break;

        case 'textarea':
    $form_group.='
    <fieldset class="form-group">
      <label for="'.$input['column_name'].'">'.$input['column_name'].'</label>
      <textarea class="form-control" name="'.$input['column_name'].'" id="'.$input['column_name'].'" rows="3"></textarea>
    </fieldset>
';
            break;
    }
}

$html = '<form>'.
$form_group.
'    <button type="button" class="btn btn-primary">Submit</button>
</form>';
?>
<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($html); ?></code></pre>
