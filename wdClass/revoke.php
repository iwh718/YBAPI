<!DOCTYPE html>
<html>
<head>
	<title>xx</title>
	<meta charset="UTF-8">
</head>
<body>

<?php
session_start();
//回收授权操作
$token = $_SESSION['token'];

/**
 * 包含SDK
 */
require("../classes/yb-globals.inc.php");

// 配置文件
require_once 'config.php';

$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$api->bind($token);
?>
<p>调用取消用户授权后的返回结果</p>
<p>
<?php 
$res = $api->request('oauth/revoke_token', array('client_id'=>$api->getConfig('appid')), true);
?>
</p>
<p><?php if ($res['status']==200) {?>撤销授权成功，下次访问DEMO时会重新要求用户授权<?php }?></p>
<a href="http://f.yiban.cn/iapp390020">返回首页！</a>

</body>
</html>