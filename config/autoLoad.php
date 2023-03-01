<?php
spl_autoload_register(function ($className){
    include "src/" . $className . ".php";
})
?>