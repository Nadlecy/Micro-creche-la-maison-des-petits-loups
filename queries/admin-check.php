<?php
if ( !isset($_SESSION['user']) || $_SESSION['user']['admin'] == 0){
    header('Location:index.php');
}