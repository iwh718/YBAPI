<?php

	/**
	 * 轻应用授权
	 * 
	 */
    

	/**
	 * 包含SDK
	 */
	require("../classes/yb-globals.inc.php");

	//配置文件
	require_once 'config.php';
	
	//初始化
	$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
	$iapp  = $api->getIApp();
	
	try {
	   //轻应用获取access_token，未授权则跳转至授权页面
	   $info = $iapp->perform();
	} catch (YBException $ex) {
	   echo $ex->getMessage();
	}
	
	
	$token = $info['visit_oauth']['access_token'];//轻应用获取的token
	
	
?>
<html>
<meta charset='utf-8'/>
<body>
	<p><?php if (isset($token)&&$token){?>授权成功，点击下方链接查看通用接口测试<?php }?></p>
	<a href="apitest.php?token=<?=$token?>">点击查看通用接口调用测试页面</a>
	<p></p>
	<a target="_blank" href="https://o.yiban.cn/wiki/index.php?page=%E8%BD%BB%E5%BA%94%E7%94%A8%E5%BC%80%E5%8F%91%E6%8C%87%E5%8D%97">轻应用开发指南</a>
</body>
</html>