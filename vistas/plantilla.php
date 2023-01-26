<?php
// Start session 
session_start();

// Retrieve session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

//header
include('includes/header.php');
?>
<?php 
if(isset($_GET["pagina"])){
    if($_GET["pagina"] == "addedit" || $_GET["pagina"] == "start"){
        include "paginas/".$_GET["pagina"].".php";
    }else{
        include "paginas/404.php";
    }
}else{
    include "paginas/start.php";
}
?>
<?php
//footer
include('includes/footer.php');
?>