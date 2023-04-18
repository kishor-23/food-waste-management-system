<?php

session_start();
session_unset();
session_destroy();
// ob_start();
header("location:index.html");
// ob_end_flush(); 

exit();

?>