<?php

$token = isset($token) ? $token : $_GET['token'];


/**
 * 包含SDK
 */
require("../classes/yb-globals.inc.php");

// 配置文件
require_once 'config.php';

//初始化配置信息，并获取token
$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$api->bind($token);

?>
<html>
<meta charset="utf-8">
<body>
	<p>初始化YBOpenApi类</p>
	<p>$api = YBOpenApi::getInstance()->init($appID, $appSecret, $callback_url);(此demo中参数从config.php文件中获取)</p>
	<p>$api->bind($token);(轻应用token获取方法见同目录iapp.php文件)</p>
	<p>使用YBOpenApi类的request方法来调用api:</p>
	<p>function request($url, $param, $isPOST, $applyToken)</p>
	<p>$url			String	具体调用的接口名称,例如user/me</p>
	<p>$param		Array	接口请求参数数组</p>
	<p>$isPOST  	Boolean	是否使用POST方式请求,默认使用GET方式</p>
	<p>$applyToken	Boolean	请求参数中是否需要添加access_token，设置为true时自动添加之前绑定的token到参数数组中</p>
	
	<p style="font-weight: bold;"><a target="_blank" href="https://o.yiban.cn/wiki/index.php?page=%E6%98%93%E7%8F%ADapi">开放平台易班API接口查询</a></p>
	<br/>
	<table style="width: 960px;margin-top:10px;margin-bottom:10px;" border="1">
		<tr>
			<td style="width: 15%;">API介绍</td>
			<td style="width: 30%;">调用方法</td>
			<td style="width: 50%;">返回结果</td>
			<td style="width: 5%;">接口说明</td>
		</tr>
		<tr>
			<td colspan=4>用户接口</td>
		</tr>
		<tr>
			<td>获取当前用户基本信息</td>
			<td>$api->request('user/me');</td>
			<td><?php var_dump($api->request('user/me'));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=user/me" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>获取指定用户基本信息</td>
			<td>$api->request('user/other', array('yb_userid'=>1));</td>
			<td><?php var_dump($api->request('user/other', array('yb_userid'=>25815102)));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=user/other" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>获取当前用户实名信息</td>
			<td>$api->request('user/real_me');</td>
			<td><?php var_dump($api->request('user/real_me'));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=user/real_me" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>获取当前用户校方认证信息</td>
			<td>$api->request('user/verify_me');</td>
			<td><?php var_dump($api->request('user/verify_me'));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=user/verify_me" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>指定用户是否实名认证</td>
			<td>$api->request('user/is_real', array('yb_userid'=>1));</td>
			<td><?php var_dump($api->request('user/is_real', array('yb_userid'=>1)));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=user/is_real" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td colspan=4>好友分组接口</td>
		</tr>
		<tr>
			<td>获取当前用户好友列表</td>
			<td>$api->request('friend/me_list', array('page'=>1,'count'=>3));</td>
			<td><?php var_dump($api->request('friend/me_list', array('page'=>1,'count'=>3)));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=friend/me_list" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>当前用户与指定用户是否为好友关系</td>
			<td>$api->request('friend/check', array('yb_friend_uid'=>1));</td>
			<td><?php var_dump($api->request('friend/check', array('yb_friend_uid'=>1)));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=friend/me_list" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>获取推荐好友列表</td>
			<td>$api->request('friend/recommend', array('count'=>3));</td>
			<td><?php var_dump($api->request('friend/recommend', array('count'=>3)));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=friend/recommend" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td colspan=4>分享评论接口</td>
		</tr>
		<tr>
			<td>获取当前用户动态列表</td>
			<td>$api->request('share/me_list', array('page'=>1, 'count'=>3));</td>
			<td><?php var_dump($api->request('share/me_list', array('page'=>1, 'count'=>3)));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=share/me_list" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td colspan=4>授权接口</td>
		</tr>
		<tr>
			<td>开发者主动取消指定用户的授权</td>
			<td>$api->request('oauth/revoke_token', array('client_id'=>$api->getConfig('appid')), true);</td>
			<td><a href="revoke.php?token=<?=$token?>">点击撤销用户授权</a></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=oauth/revoke_token" target="_blank">查看</a></td>
		</tr>
		<tr>
			<td>查询用户access_token的相关授权信息</td>
			<td>$api->request('oauth/token_info', array('client_id'=>$api->getConfig('appid')), true);</td>
			<td><?php var_dump($api->request('oauth/token_info', array('client_id'=>$api->getConfig('appid')), true));?></td>
			<td><a href="https://o.yiban.cn/wiki/index.php?page=oauth/token_info" target="_blank">查看</a></td>
		</tr>
	</table>
	<a href="index.php">返回demo首页</a>
	
</body>
</html>