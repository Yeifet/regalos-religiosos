<?php

$protocol = 'http://';

if (isset($_SERVER['HTTPS'])){ $protocol = 'https://'; }

define('URL', $protocol . $_SERVER['HTTP_HOST'] . '/regalos-religiosos/')
?>