<?php
include_once 'src/businiao.lib/businiao.lib.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
/**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo 免费获取
 * 本页面api超级详细介绍页面：https://wechaturl.gitbook.io/
 * 本功能对应的网页版前端：https://www.wechaturl.us/user/index.html#business_management/single_url_list
 * 本测试页面的功能：你可以添加任何一个url地址，并生成微博短网址，你只需要将短网址公开。当然系统会实时监控url是否被微信封杀，如果封杀，我们会及时通过微信，短信，邮箱通知你
 *  如果你希望添加无限个网址或被封网址自动更换，请选择另一个接口案例DomainShortUrl_example.php,
 返回code代码汇总：https://wechaturl.gitbook.io/
 * ***/
$appid='12345678';
$appkey='GetAppKeyAtThe:https://www.wechaturl.us';

//new 方法
$SingleShortUrl=new SingleShortUrl($appid,$appkey);
//如果你需要帮助，执行下面即可
echo "<br>------------------下面你能获取本功能所有帮助---------------------------------<br>\n";
$help_result=$SingleShortUrl->help();
print_r(json_decode($help_result,true));



//添加网址,
echo "<br>------------------下面是添加监控返回结果---------------------------------<br>\n";
$add_result=$SingleShortUrl->add('http://www.baidu.com','jump','网站标题','网站关键词','网站描述');
print_r(json_decode($add_result,true));


//修改属性，如果你演示代码，上面新添加的这里马上就会被修改，请自行注释下面代码
echo "<br>------------------下面修改监控属性返回结果---------------------------------<br>\n";
$edit_result=$SingleShortUrl->edit('http://www.baidu.com','jump','网站标题1','网站关键词1','网站描述1');
print_r(json_decode($edit_result,true));



//删除，上面新添加的这里马上就会被删除，请自行注释下面代码
echo "<br>------------------下面是删除监控返回结果---------------------------------<br>\n";
$delete_result=$SingleShortUrl->delete('http://www.baidu.com');
print_r(json_decode($delete_result,true));


//获取列表
echo "<br>------------------下面是获取列表---------------------------------<br>\n";
$list_result=$SingleShortUrl->list();
print_r(json_decode($list_result,true));


