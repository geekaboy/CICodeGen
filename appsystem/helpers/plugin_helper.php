<?php
function generate_plugin($file_path){
  $import_script = '';
  foreach ($file_path as $key => $file) {
    if(substr($file, -3, 3) == '.js'){
      $import_script .= '<script src="'.base_url().$file.'"></script>
    ';
    }else{
      $import_script .= '<link rel="stylesheet" href="'.base_url().$file.'">
    ';
    }

  }
  return $import_script;

}//end function
?>
