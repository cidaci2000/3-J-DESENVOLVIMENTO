<?php
session_start();
session_unset();
session_destroy();
header('Location: home barbearia.php');
exit;