一、文档目录结构

-- /
  |
  |-- classes/      开放平台SDK(轻应用)
  |
  |-- demo/     测试实例
    |
    |-- config.php      配置文件，您需要修改这个文件写入对应的 AppID 等信息
    |
    |-- index.php       DEMO入口
    |
    |-- iapp.php        轻应用授权流程(使用DEMO时请将管理中心->应用详细中应用地址指向此文件所在的URL)
    |
    |-- apitest.php     功能接口测试（需要完成授权流程获取到access_token才能进行接口测试）
    |
    |-- revoke.php      撤销授权功能调用测试
  |
  |-- README.txt          本文档

二、SDK初始化简要说明

1、将 classes/ 目录下所有文件放到您的项目中，保持里面的目录结构
2、引用classes/下yb-globals.inc.php文件
3、通过$api = YBOpenApi::getInstance()->init() 实例化对象并配置应用信息
4、(轻应用授权)通过 $api->getIApp()->perform() 完成用户授权，获得access_token(可参考demo中iapp.php文件)
5、通过$api->bind()绑定access_token

三、SDK接口调用简要说明

完成初始化后，通过YBOpenApi::getInstance()->request($url, $param, $isPOST, $applyToken)来调用易班api
参数说明：
$url			String	具体调用的接口名称,例如user/me
$param			Array	接口请求参数数组
$isPOST  		Boolean	是否使用POST方式请求,默认使用GET方式
$applyToken		Boolean	请求参数中是否需要添加access_token，设置为true时自动添加之前绑定的token到参数数组中(如果为true请先通过bind()将token绑定至实例中)

以 获取当前用户信息 为例：（接口说明  https://o.yiban.cn/wiki/index.php?page=user/me ）
$url 		= 'user/me';
$param 		= array();
$isPOST		= false;
$applyToken = true;
$result = YBOpenApi::getInstance()->request($url, $param, $isPOST, $applyToken);//获取接口返回信息











