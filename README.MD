## 由于版权原因,请在开发商官网的github https://github.com/wechaturl/wechat_url_api.git

## api完整教程镜像版 https://wechaturl.gitbook.io/

```shell
注意:php版本必须是php 7.* 或以上
如果你采用composer安装，复制下面的即可
composer require goodyes/wechat_url_check_preventing_blocked_api ^1.1.0
#https://packagist.org/packages/goodyes/wechat_url_check_preventing_blocked_api
```
# 不死鸟微信防封杀系统免费版

### 我们的官方网站:https://www.wechaturl.us , 为了使你更快更轻松的使用本API,可以先简单浏览api各个模块.[点我查看](https://wechaturl.gitbook.io/ "点我查看")

### 不死鸟微信/QQ防封杀系统是适应当下微信封杀规则,开发的一整套防封杀解决方案：

##### CheckIp_example.php 功能:屏蔽中国最大的社交聊天软件所在公司以及其他厂商的云端IP检测

##### splice_url_anyurl.php 功能:自定义参数传递(无需api,即可实现防封)

##### DomainShortUrl_example.php 功能:域名防封相关接口案例

##### SingleShortUrl_example.php 功能:任意网址防封相关接口案例

##### UrlCheck.GetWeiboUrl.GetWechatUrl_example.php 功能:网址实时检测是否被红.将长网址转短网址

##### UrlCycleCheck_example.php 功能:管理网址检测


####  一、查询功能

	1.获取微信短网址（本api已经支持）
	2.获取微博短网址（本api已经支持）
	3.查询URL网址连接是否被微信拦截/封停（本api已经支持）

#### 二、微信URL网址连接系统循环检测系统

###### 按照你设定的频率自动检测，如果出现异常，比如被微信拦截，系统会以微信(绑定微信号)、短信、邮箱实时通知你，以减少业务损失

	1.url添加（本api已经支持）
	2.url检测属性修改（本api案例已经支持演示）
	3.获取支持检测频率（本api案例已经支持演示）
	4.删除url（本api案例已经支持演示）

### 防止封杀系统

#### 三、落地页打开方式：

	(1)在微信里面直接打开(默认)
	(2)被封链接恢复正常。如果你的链接已经被微信封杀，可以使用这个方法
	(3)提示浏览器打开。当然非微信浏览器则直接打开
	(4)如果是android微信，会自动打开系统默认浏览器(如apk安装包下载)
	(5)链接阅读即焚。需要你的系统和我们的防封杀系统能相互传递数据。

###### 目前不死鸟防封杀系统包含 单个网址URL网址链接防止封杀系统 和 多域名无限URL网址连接防止封杀系统

#### 四、微信单个网址URL网址链接（任意网址添加）防止封杀系统

###### 当你添加后，会自动启动监控微信封杀情况.如果某个网址被封,我们会以短信/微信/邮箱实时通知你.如果需要自动切换到可用网页,请使用”多域名无限网址”功能的防封列表 	 当你添加后，会自动启动监控微信封杀情况.如果某个网址被封,我们会以短信/微信/邮箱实时通知你.如果需要自动切换到可用网页,请使用”多域名无限网址”功能的防封列表

 	1.查询你已经添加了落地页域名列表（本api案例已经支持演示）。 添加/修改/删除域名需要到网页版会员中心去操作：https://www.wechaturl.us/user/index.html#business_management/land_domain
 	2.添加链接（本api案例已经支持演示）
 	3.编辑链接属性（本api案例已经支持演示）
	4.删除链接（本api案例已经支持演示）

#### 五、微信多域名无限URL网址连接（添加前需要指定落地页域名）防止封杀系统

##### 当你添加后，会自动启动监控微信封杀情况,如果你设置了多个落地页域名.某个落地页域名封,会自动切换到可用的域名.同时我们会以短信/微信/邮箱实时通知你。本功能能使你的业务0损失。

 	 1.查询你已经添加了落地页域名列表（本api案例已经支持演示）。 添加/修改/删除域名需要到网页版会员中心去操作：https://www.wechaturl.us/user/index.html#business_management/land_domain
 	 2.添加链接（本api案例已经支持演示）
 	 3.编辑链接属性（本api案例已经支持演示）
 	 4删除链接（本api案例已经支持演示）

#### 六、自定义短域名

	如果你的业务非常重要，使用自己的短域名。可以查看https://www.wechaturl.us/user/index.html#business_management/user_short_domain_list

#### 七、各个厂商黑名单ip查询

	系统已经完整集成厂商ip黑名单，当然如果你的业务同时集成这个黑名单，效果更好。https://wechaturl.gitbook.io/wechaturl/check_ip

#### 八、还有更多功能

	请到 https://www.wechaturl.us 查看

我们宗旨：如果你的项目依赖微信发展用户，面对微信对第三方封杀越来越严格情况下，产品经理免费微信频繁封杀是非常头疼的事情。
不死鸟提供这一整套防封杀解决方案，希望能为你解决实际问题。
当你下载源码，可以看到以上功能的演示


UrlCheck.GetWeiboUrl.GetWechatUrl_example.php

```php
<?php
//include 'vendor/autoload.php';
include_once 'businiao.lib/businiao.lib.php';
$appid='12345678';
$appkey='GetAppKeyAtThe:https://www.wechaturl.us';

/**
 * 返回code代码汇总：https://wechaturl.gitbook.io/wechaturl/code_summary
 * 本案例做了3个功能
 * 1.微信url检测状态
 * 2.获取微信短网址
 * 3.获取微博短网址
 * */
$url='https://www.baidu.com';
/**微信url检测状态
 * api详细帮助：https://wechaturl.gitbook.io
 * 
 * */
$UrlCheck_result=(new UrlCheck($appid,$appkey))->get($url);
print_r(json_decode($UrlCheck_result,true));

/**获取微信短网址
 * https://wechaturl.gitbook.io
 * */
$GetWechatShortUrl_result=(new GetWechatShortUrl($appid,$appkey))->get($url);
print_r(json_decode($GetWechatShortUrl_result,true));

/**获取微博短网址
 * 
 * https://wechaturl.gitbook.io
 * **/
$GetWeiboShortUrl_result=(new GetWeiboShortUrl($appid,$appkey))->get($url);
print_r(json_decode($GetWeiboShortUrl_result,true));
```

UrlCycleCheck_example.php

```php
<?php
//include 'vendor/autoload.php';
include_once 'businiao.lib/businiao.lib.php';
 /**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo 免费获取
 * 本页面api超级详细介绍页面：https://wechaturl.gitbook.io
 * 本功能对应的网页版前端：https://www.wechaturl.us/user/index.html#business_management/url_cycle_check
 * 本测试页面的功能：按照你设置的频率定时循环检测url($is_monitor 需要开启监控才行)，如果url被微信封杀，则系统会通过微信，短信，邮件实时通知你，以减少你的损失
 返回code代码汇总：https://wechaturl.gitbook.io/wechaturl/code_summary
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
$add_result=$UrlCycleCheck->add('http://www.baidu.com',$frequency_arr['data'][0],0);
print_r(json_decode($add_result,true));


//修改监控属性，请自己接触下面2段代码注释
echo "<br>------------------下面修改监控属性返回结果---------------------------------<br>\n";
//$edit_result=$UrlCycleCheck->edit('http://www.baidu.com',$frequency_arr['data'][0],1);
//print_r(json_decode($edit_result,true));



//删除监控属性，请自己接触下面2段代码注释
echo "<br>------------------下面是删除监控返回结果---------------------------------<br>\n";
//$delete_result=$UrlCycleCheck->delete('http://www.google.com');
//print_r(json_decode($delete_result,true));


//获取列表
echo "<br>------------------下面是监控列表---------------------------------<br>\n";
$list_result=$UrlCycleCheck->list();
print_r(json_decode($list_result,true));



```

SingleShortUrl_example.php

```php
<?php
//include 'vendor/autoload.php';
include_once 'businiao.lib/businiao.lib.php';
/**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo 免费获取
 * 本页面api超级详细介绍页面：https://wechaturl.gitbook.io/wechaturl/code_summary
 * 本功能对应的网页版前端：https://www.wechaturl.us/user/index.html#business_management/single_url_list
 * 本测试页面的功能：你可以添加任何一个url地址，并生成微博短网址，你只需要将短网址公开。当然系统会实时监控url是否被微信封杀，如果封杀，我们会及时通过微信，短信，邮箱通知你
 *  如果你希望添加无限个网址或被封网址自动更换，请选择另一个接口案例DomainShortUrl_example.php,
 返回code代码汇总：https://wechaturl.gitbook.io/wechaturl/code_summary
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


//修改属性，请自己接触下面2段代码注释
echo "<br>------------------下面修改监控属性返回结果---------------------------------<br>\n";
$edit_result=$SingleShortUrl->edit('http://www.baidu.com','jump','网站标题1','网站关键词1','网站描述1');
print_r(json_decode($edit_result,true));



//删除，请自己接触下面2段代码注释
echo "<br>------------------下面是删除监控返回结果---------------------------------<br>\n";
//$delete_result=$SingleShortUrl->delete('http://www.baidu.com');
//print_r(json_decode($delete_result,true));


//获取列表
echo "<br>------------------下面是获取列表---------------------------------<br>\n";
$list_result=$SingleShortUrl->list();
print_r(json_decode($list_result,true));



```

DomainShortUrl_example.php

```php
<?php
//include 'vendor/autoload.php';
include_once 'businiao.lib/businiao.lib.php';
/**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo 免费获取
 * 本页面api超级详细介绍页面：https://wechaturl.gitbook.io/wechaturl/code_summary
 * 本功能对应的网页版前端：https://www.wechaturl.us/user/index.html#business_management/domain_url_list
 * 本测试页面的功能：本功能会自动启动监控微信封杀情况,如果你设置了多个落地页域名.某个落地页域名封,会自动切换到可用的域名.同时我们会以短信/微信/邮箱实时通知你
 返回code代码汇总：https://wechaturl.gitbook.io/wechaturl/code_summary
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



```
