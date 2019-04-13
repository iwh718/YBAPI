<?php 
require 'config.php';

$appUrl = isset($config['CallBack'])?$config['CallBack']:'javaScript:;';

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>易班开放平台DEMO</title>
	<style>	* { line-height: 32px; } </style>
</head>
<body>
	<div>
		<p style="font-weight: bold;">
			轻应用SDK使用DEMO
		</p>
		<p style="font-weight: bold;">
			1、<a href="https://o.yiban.cn/manage/index" target="_blank">开放平台管理中心</a>左侧导航栏中选择"轻应用"中的应用（若无应用则创建新应用）
		</p>
		<p style="font-weight: bold;">
			2、设置应用中的“使用场景"选项为"兼容易班客户端、PC/手机浏览器",以便在浏览器中运行DEMO
		</p>
		<p style="font-weight: bold;">
			3、设置应用中的"应用地址"为此DEMO中iapp.php所在的URL
		</p>
		<p style="font-weight: bold;">
			4、修改此DEMO中config.php文件，填写应用信息(Appid和AppSecret),CallBack填轻应用的授权回调地址
		</p>
		<p style="font-weight: bold;">
			以上步骤操作完成后点击下方链接测试DEMO
		</p>
	</div>
	<div>
		<a href="<?=$appUrl?>">轻应用DEMO</a>
	</div>
</body>
</html>