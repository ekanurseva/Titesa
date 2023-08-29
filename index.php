<?php
require_once 'controller/mainController.php';

if (!isset($_COOKIE['mGpTw'])) {
    echo "<script>
  document.location.href='login.php';
  </script>";
    exit;
} else {
    echo "<script>
  document.location.href='logout.php';
  </script>";
    exit;
}
?>