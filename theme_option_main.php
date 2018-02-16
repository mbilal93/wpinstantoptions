<?php
include('theme_option_main_controller.php');
?>
<script type="text/javascript">
    window.template_url = "<?php echo template_url ?>";
    window.plugin_dir = "<?php echo plugins_url().'/'.plugin_name?>";
</script>
<div class="wrap adminopt">
<h2>WP Instant Options</h2>
    <?php

    if((isset($_GET['view']) && $_GET['view'] === 'new_form' || query_all() > 0)){
      include('pages/backend.php');
    }elseif(query_all()===0){
        include('pages/welcome.php');
      include('controllers/optionpanel.php');
    }

    //Include controllers
    $dir = __DIR__.'/controllers/';
    $opendir = opendir($dir);

    while($file = readdir($opendir)){
      $length_of_filename = strlen($file);
      $ext = substr($file, -3, $length_of_filename);
    if($ext == "php" ) {
        include('controllers/optionpanel.php');
    }

    }
    ?>

</div>