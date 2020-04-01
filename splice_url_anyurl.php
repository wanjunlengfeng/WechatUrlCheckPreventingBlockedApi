<?php
/**
 * 本功能(拼接入口网址）对应的文档，https://wechaturl.gitbook.io/wechaturl/domain/domain_url_anyurl
 * 
 * appid 和 appkey请到https://www.wechaturl.us/user/index.html#userinfo/userinfo  会员中心免费获取
 * ***/
$appid='get the value from www.wechaturl.us';

//$request_uri 如果你的网址是 http://www.a.com/abc.html?a=1 那么 /abc.html?a=1就是这里的$request_uri
$request_uri='/index.html?a=1&b=2#page1';

//$group_id进入会员中心-->业务管理-->域名防封-->我的域名池 这里对应的分组。默认0
$group_id=0;

//$visit_type详细查看，https://wechaturl.gitbook.io/wechaturl/visit_types
$visit_type='browser';

//$short_domain进入会员中心-->业务管理-->入口域名池-->短网址域名列表 ,使用“入口域名”
//当然你也可以通过api智能获取https://wechaturl.gitbook.io/wechaturl/shorturl/user_short_domain_list
$short_domain='http://www.yourshortdoman.com';
$is_hide_qq_menu=true;//如果希望把qq右上角菜单隐藏，则true,否则false;
$urlanyurl=new UrlAnyurl($appid,$short_domain,$request_uri,$visit_type,$group_id);
$url=$urlanyurl->get($is_hide_qq_menu);

echo '得到的拼接的网址:<br>'.$url;

/************如果分享出去觉得网址很长，比如分享出去后，用户能看到这个短网址。那么可以用下面方法缩短。否则跳过********************8
/**
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
$appkey='get the value from www.wechaturl.us';

$GetWechatShortUrl_result=(new GetWechatShortUrl($appid,$appkey))->get($url);
$result=json_decode($GetWechatShortUrl_result,true);
if(!empty($result['data']['short_url'])){
    echo $result['data']['short_url'];
}else{
    echo '错误';
}
**/
class  UrlAnyurl{
    private $data=[];
    private $short_domain="";
    function __construct($appid,$short_domain,$request_uri,$visit_type='browser',$group_id=0){
        $this->data=[
            'appid'=>$appid,
            'group_id'=>$group_id,
            'visit_type'=>$visit_type,
            'request_uri'=>$request_uri
        ];
        $this->short_domain=$short_domain;
    }
    
    function get($is_hide_qq_menu=true){
        $url=$this->short_domain;
        $url.='/'.$this->march_prefix();
        $url.=base64_encode(json_encode($this->data));
        if($is_hide_qq_menu){
            $url.='?_wv=2';
        }
        return $url;
    }
    
    /**
     * 
     * @param string $get_one
     * @return mixed|array
     * 你将会得到下面的数组结合
     * /s/,/x/,/y/,/z/,/sa/,/sb/,/sc/,/sd/,/se/,/sf/,/sg/,/sh/,/si/,/sj/,/sk/,/sl/,/sm/,/sn/,/so/,/sp/,/sq/,/sr/,/ss/,/st/,/su/,/sv/,/sw/,/sx/,/sy/,/sz/,/xa/,/xb/,/xc/,/xd/,/xe/,/xf/,/xg/,/xh/,/xi/,/xj/,/xk/,/xl/,/xm/,/xn/,/xo/,/xp/,/xq/,/xr/,/xs/,/xt/,/xu/,/xv/,/xw/,/xx/,/xy/,/xz/,/ya/,/yb/,/yc/,/yd/,/ye/,/yf/,/yg/,/yh/,/yi/,/yj/,/yk/,/yl/,/ym/,/yn/,/yo/,/yp/,/yq/,/yr/,/ys/,/yt/,/yu/,/yv/,/yw/,/yx/,/yy/,/yz/,/za/,/zb/,/zc/,/zd/,/ze/,/zf/,/zg/,/zh/,/zi/,/zj/,/zk/,/zl/,/zm/,/zn/,/zo/,/zp/,/zq/,/zr/,/zs/,/zt/,/zu/,/zv/,/zw/,/zx/,/zy/,/zz/
     */
    private function march_prefix($get_one=true){
        $array=array_merge($this->A_Z_array('s'),$this->A_Z_array('x'),$this->A_Z_array('y'),$this->A_Z_array('z'));
        $array[]='s/';$array[]='x/';$array[]='y/';$array[]='z/';
        if($get_one){
            $i=rand(0,count($array)-1);
            return $array[$i];
        }
        
        return $array;
    }
    /*
     * 获取字符串
     * */
    private function A_Z_array($value=''){
        $array=[
            'a','b','c','d','e','f','g',
            'h','i','j','k','l','m','n',
            'o','p','q','r','s','t',
            'u','v','w','x','y','z'
        ];
        if($value!=""){
            for ($i=0;$i<count($array);$i++){
                $array[$i]=$value.$array[$i].'/';
            }
        }
        
        return $array;
    }
    
}