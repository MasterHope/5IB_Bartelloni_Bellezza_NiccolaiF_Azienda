<?php

function ErrorHandlerAcquisti($errno, $errstr){
    header('location: ErrorPage.php?errno='.$errno.'&errstr='.$errstr);
}