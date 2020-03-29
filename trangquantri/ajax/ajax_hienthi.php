<?php
    include ("ajax_config.php");

    if(isset($_POST["id"])){
        $sql = "update ".(string)$_POST["bang"]." SET ".(string)$_POST["type"]."=".(string)$_POST["value"]." WHERE  id = ".(int)$_POST["id"]."";
        $d->reset();
        $data = $d->query($sql);
        echo $sql;
    }
?>
