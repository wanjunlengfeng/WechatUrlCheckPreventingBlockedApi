<?php

exit("我们的会员中心已经集成这个功能了https://www.wechaturl.us/user/index.html#business_management/short_domain_wechatlogin_list");
/**
 *本功能简介:本功能是通过微信公众号登录来实现防封的。
 *但是本功能需要使用“动态设置任何URI参数”详细请见，https://wechaturl.gitbook.io/wechaturl/domain/domain_url_anyurl
 * 
 */
include_once 'src/businiao.lib/businiao.lib.php';
/**
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo  会员中心免费获取
 * ***/
$appid='get the value from www.wechaturl.us';
$appkey='get the value from www.wechaturl.us';
/**
 * $OfficialAccounts_appid 公众号的APPID，请到 公众号后台的 基本配置选项里面去查看
 */
$OfficialAccounts_appid='wx*********';
/**
 * $OfficialAccounts_domain 请到公众号设置-->功能设置-->网页授权域名 里面查看，可以设置2个域名
 */
$OfficialAccounts_domain=[
    'wx1.yourdomain.com',
    'wx2.yourdomain2.com'
];

/**
 * $visit_type:详细请见https://wechaturl.gitbook.io/wechaturl/visit_types
 * $group_id：详细请见 https://wechaturl.gitbook.io/wechaturl/domain/domain_url_anyurl
 */
function GetOfficialAccountsUrl($appid,$request_uri,$OfficialAccounts_appid,$OfficialAccounts_domain,$visit_type='jump',$group_id=0){
 

    $i=rand(0,count($OfficialAccounts_domain)-1);
    $url='http://'.$OfficialAccounts_domain[$i].'/s/';
    
    $data=[
        'appid'=>$appid,
        'group_id'=>$group_id,
        'visit_type'=>$visit_type,
        'request_uri'=>$request_uri
        
    ];
    $url.=base64_encode(json_encode($data));
    
    $real_url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$OfficialAccounts_appid.'&redirect_uri='.urlencode($url).'&response_type=code&scope=snsapi_base#wechat_redirect';
    return $real_url;
}



/**
 * $request_uri 如果你的网址是 http://www.a.com/abc.html?a=1 那么 /abc.html?a=1就是这里的$request_uri
 * 详细请见，https://wechaturl.gitbook.io/wechaturl/domain/domain_url_anyurl
 */
$request_uri='/app/index.php?i=1&c=entry&do=index&main_id=2&m=ndot_share&tid=6';

$url=GetOfficialAccountsUrl($appid,$request_uri,$OfficialAccounts_appid,$OfficialAccounts_domain,'jump',0);
/***
 *下面是$url转成短网址，如果不需要则可以跳过 
 */
$GetWechatShortUrl_result=(new GetWechatShortUrl($appid,$appkey))->get($url);
$result=json_decode($GetWechatShortUrl_result,true);
if(!empty($result['data']['short_url'])){
    echo $result['data']['short_url'];
}else{
    echo '错误';
}