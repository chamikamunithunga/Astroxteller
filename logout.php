<?php
session_start();
session_unset();
session_destroy();
echo "success"; // Send a response to JavaScript
?>
