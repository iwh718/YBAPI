<?php
session_start();
require('../config.php');
$AppID  = $config['AppID'];
$AppSec = $config['AppSecret'];
$CALLBACK  = $config['CallBack'];
$state = time();
header("Location: https://openapi.yiban.cn/oauth/authorize?client_id=$AppID&redirect_uri=$CALLBACK&state=$state");
?>
