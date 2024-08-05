<?php
session_start();
unset($_SESSION['username']);
session_destroy();
echo '<script language="javascript">document.location="../index.php";</script>';
?>
