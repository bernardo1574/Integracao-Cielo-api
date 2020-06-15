<?php
require 'includes/header.php';
include 'functions/function.php';
if (isset($_GET['cod'])){
    include 'sub_modulo/messages.php';
}
if (empty($_GET['subMod'])) {
    include 'sub_modulo/view.php';
} else {?>
    <?php include 'sub_modulo/'.$_GET['subMod'].'.php';
}

require 'includes/footer.php';