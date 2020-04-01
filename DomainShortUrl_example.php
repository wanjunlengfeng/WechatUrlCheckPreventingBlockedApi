<?php
include_once 'src/businiao.lib/businiao.lib.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
/**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo 免费获取
 * 本页面api超级详细介绍页面：https://wechaturl.gitbook.io/
 * 本功能对应的网页版前端：https://www.wechaturl.us/user/index.html#business_management/domain_url_list
 * 本测试页面的功能：本功能会自动启动监控微信封杀情况,如果你设置了多个落地页域名.某个落地页域名封,会自动切换到可用的域名.同时我们会以短信/微信/邮箱实时通知你
 返回code代码汇总：https://wechaturl.gitbook.io/
 * ***/
$appid='12345678';
$appkey='GetAppKeyAtThe:https://www.wechaturl.us';

//new 方法
$DomainShortUrl=new DomainShortUrl($appid,$appkey);
//如果你需要帮助，执行下面即可
echo "<br>------------------下面你能获取本功能所有帮助---------------------------------<br>\n";
$help_result=$DomainShortUrl->help();
print_r(json_decode($help_result,true));

//获取落地页域名列表
echo "<br>------------------下面是获取落地页域名列表，你在添加URL前，需要先添加落地页域名---------------------------------<br>\n";
$LandDomainList_result=$DomainShortUrl->GetLandDomainList();
print_r(json_decode($LandDomainList_result,true));

//添加网址,
echo "<br>------------------下面是添加监控返回结果---------------------------------<br>\n";
$add_result=$DomainShortUrl->add('http://www.baidu.com','jump','网站标题','网站关键词','网站描述');
print_r(json_decode($add_result,true));


//修改属性，请自己接触下面2段代码注释
echo "<br>------------------下面修改监控属性返回结果---------------------------------<br>\n";
$edit_result=$DomainShortUrl->edit('http://www.baidu.com','jump','网站标题1','网站关键词1','网站描述1');
print_r(json_decode($edit_result,true));



//删除，请自己接触下面2段代码注释
echo "<br>------------------下面是删除监控返回结果---------------------------------<br>\n";
//$delete_result=$DomainShortUrl->delete('http://www.baidu.com');
//print_r(json_decode($delete_result,true));


//获取列表
echo "<br>------------------下面是获取列表---------------------------------<br>\n";
$list_result=$DomainShortUrl->list();
print_r(json_decode($list_result,true));

//超高频率检测是否被封,api调用不受到任何时间限制
echo "<br>------------------超高频率检测是否被封,api调用不受到任何时间限制---------------------------------<br>\n";
$list_result=$DomainShortUrl->HighFrequencyCheck('http://www.baidu.com');
print_r(json_decode($list_result,true));


