<?php
include_once 'src/businiao.lib/businiao.lib.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
 /**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo 免费获取
 * 本页面api超级详细介绍页面：https://wechaturl.gitbook.io/
 * 本功能对应的网页版前端：https://www.wechaturl.us/user/index.html#business_management/url_cycle_check
 * 本测试页面的功能：按照你设置的频率定时循环检测url($is_monitor 需要开启监控才行)，如果url被微信封杀，则系统会通过微信，短信，邮件实时通知你，以减少你的损失
 返回code代码汇总：https://wechaturl.gitbook.io/
 * ***/
$appid='12345678';
$appkey='GetAppKeyAtThe:https://www.wechaturl.us';

//new 方法
$UrlCycleCheck=new UrlCycleCheck($appid,$appkey);
//如果你需要帮助，执行下面即可
echo "<br>------------------下面你能获取本功能所有帮助---------------------------------<br>\n";
$help_result=$UrlCycleCheck->help();
print_r(json_decode($help_result,true));


//获取你当前会员可用的监控频率（比如60，那么系统每60秒钟检测网址是否被封，如果被封，会提示你）
echo "<br>------------------下面你的权限支持的监控频率---------------------------------<br>\n";
$frequency_result=$UrlCycleCheck->frequency();
$frequency_arr=json_decode($frequency_result,true);
print_r($frequency_arr);


//添加监控的网址,
echo "<br>------------------下面是添加监控返回结果---------------------------------<br>\n";
if($frequency_arr['code']==1){
    $add_result=$UrlCycleCheck->add('http://www.baidu.com',$frequency_arr['data'][0],0);
    print_r(json_decode($add_result,true));
}



//修改监控属性，如果你演示代码，上面新添加的这里马上就会被修改，请自行注释下面代码
echo "<br>------------------下面修改监控属性返回结果---------------------------------<br>\n";
$edit_result=$UrlCycleCheck->edit('http://www.baidu.com',$frequency_arr['data'][0],1);
print_r(json_decode($edit_result,true));



//删除监控属性，如果你演示代码，上面新添加的这里马上就会被删除，请自行注释下面代码
echo "<br>------------------下面是删除监控返回结果---------------------------------<br>\n";
$delete_result=$UrlCycleCheck->delete('http://www.baidu.com');
print_r(json_decode($delete_result,true));


//获取列表
echo "<br>------------------下面是监控列表---------------------------------<br>\n";
$list_result=$UrlCycleCheck->list();
print_r(json_decode($list_result,true));


