<?php

class BuSiNiaoApi{
    private $appid='';
    private $appkey='';
    private $url=BUSINIAO_API_HOST;
    function __construct($appid,$appkey){
        $this->appid=$appid;
        $this->appkey=$appkey;
        
    }
    function get_url($api_type){
        $this->url.=$api_type;
        $this->url.=sprintf('?appid=%s&appkey=%s',$this->appid,$this->appkey);
        return $this->url;
        
    }
}

class UrlCycleCheck{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_UrlCycleCheck);
        
    }
    /** 添加
     * 
     * **/
    function add($url,int $frequency,$is_monitor=false){
        $postArr['type']='add';
        $postArr['url']=$url;
        $postArr['is_monitor']=$is_monitor;
        $postArr['frequency']=$frequency;
        return $this->curl($postArr);
    }
    function edit($url,int $frequency=null,bool $is_monitor=null){
        $postArr['type']='edit';
        $postArr['url']=$url;
        $postArr['is_monitor']=$is_monitor;
        $postArr['frequency']=$frequency;
        return $this->curl($postArr);
    }
    function delete($url){
        $postArr['type']='delete';
        $postArr['url']=$url;
        return $this->curl($postArr);
    }
    function list(int $page=1,int $rows=10){
        $postArr['type']='list';
        $postArr['page']=$page;
        $postArr['rows']=$rows;
        return $this->curl($postArr);
    }
    function frequency(){
        $postArr['type']='frequency';
        return $this->curl($postArr);
    }
    function help(){
        $postArr['type']='help';
        return $this->curl($postArr);
    }
    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
    
}
class CheckIp{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_CheckIp);
        
    }
    /**
     * $ip:ipv4
     * $search_range:可以是 369,tencent,jinshan,baidu;多个 请用逗号隔开。
     * 具体查看官方接口https://wechaturl.gitbook.io/wechaturl/check_ip
     */
    function CheckIp($ip=null,$search_range=''){
        if($ip==''){
            $ip=$this->get_real_client_ip();
        }
        $postArr['ip']=$ip;
        $postArr['user_agent']=$_SERVER['HTTP_USER_AGENT'];
        $postArr['referer']=$_SERVER['HTTP_REFERER'];
        $postArr['current_url']=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if($search_range!=""){
            $postArr['search_range']=$search_range;
        }
        return $this->curl($postArr);
    }
    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
    private function get_real_client_ip(){
        $real_client_ip=$_SERVER['REMOTE_ADDR'];
        $ng_client_ip=( isset($_SERVER['HTTP_X_FORWARDED_FOR'])  ?   $_SERVER['HTTP_X_FORWARDED_FOR']    :   "");//反向代理
        
        if(isset($_SERVER['HTTP_CLIENTIP'])){
            $real_client_ip=$_SERVER['HTTP_CLIENTIP'];
        }
        if($ng_client_ip!="" and strlen($ng_client_ip)>5){
            if(strstr($ng_client_ip, ',')!=""){
                $a=explode(',', $ng_client_ip);
                $real_client_ip=$a[0];
                if($this->check_intranet_ip($real_client_ip)){
                    if(isset($_SERVER['HTTP_X_REAL_IP'])){
                        $real_client_ip=$_SERVER['HTTP_X_REAL_IP'];
                    }
                }
            }else{
                $real_client_ip=$ng_client_ip;
            }
        }
        return $real_client_ip;
    }
    //检查下内网ip
    private function check_intranet_ip($ip){
        if(!IS_CHECK_INTRANET_IP){
            return ;
        }
        
        //排除google cloud自己的内网ip
        if(startWith($ip, '10.170.0.')){
            return ;
        }
        $ip_num_list=[
            [ip2long('192.168.0.0'),ip2long('192.168.255.255')],
            [ip2long('10.0.0.0'),ip2long('10.255.255.255')],
            [ip2long('172.16.0.0'),ip2long('172.31.255.255')],
            [ip2long('100.64.0.0'),ip2long('100.127.255.255')],
            [ip2long('127.0.0.0'),ip2long('127.255.255.255')]
        ];
        $ip_long=ip2long($ip);
        $find=false;
        foreach ($ip_num_list as $item){
            if($ip_long>=$item[0] AND $ip_long<=$item[1]){
                $find=true;
                break;
            }
        }
        if(!$find){
            return;
        }
        return $find;
    }
}

class SingleShortUrl{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_SingleShortUrl);
        
    }
    /** 添加
     *$visit_type值只能是:browser,frame,jump.默认 jump。如果你不知道它含义请到会员中心页面版查看
     * **/
    function add($url,$visit_type='jump',$title=null,$keywords=null,$description=null){
        $postArr['type']='add';
        $postArr['url']=$url;
        $postArr['visit_type']=$visit_type;
        
        if($title!=null){
            $postArr['title']=$title;
        }
        if($keywords!=null){
            $postArr['keywords']=$keywords;
        }
        if($description!=null){
            $postArr['description']=$description;
        }
        return $this->curl($postArr);
    }
    function edit($url,$visit_type=null,$title=null,$keywords=null,$description=null){
        $postArr['type']='edit';
        $postArr['url']=$url;
        if($visit_type!=null){
            $postArr['visit_type']=$visit_type;
        }
        if($title!=null){
            $postArr['title']=$title;
        }
        if($keywords!=null){
            $postArr['keywords']=$keywords;
        }
        if($description!=null){
            $postArr['description']=$description;
        }
        return $this->curl($postArr);
    }
    function delete($url){
        $postArr['type']='delete';
        $postArr['url']=$url;
        return $this->curl($postArr);
    }
    function list($url=null,int $page=1,int $rows=10){
        $postArr['type']='list';
        if($url!=null){
            $postArr['url']=$url;
        }
        $postArr['page']=$page;
        $postArr['rows']=$rows;
        return $this->curl($postArr);
    }
    function help(){
        $postArr['type']='help';
        return $this->curl($postArr);
    }
    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
    
}


class DomainShortUrl{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_DomainShortUrl);
        
    }
    function GetLandDomainList(){
        $postArr['type']='GetLandDomainList';
        return $this->curl($postArr);
    }
    /** 添加
     *$visit_type值只能是:browser,frame,jump.默认 jump。如果你不知道它含义请到会员中心页面版查看
     * **/
    function add($url,$visit_type='jump',$title=null,$keywords=null,$description=null){
        $postArr['type']='add';
        $postArr['url']=$url;
        $postArr['visit_type']=$visit_type;
        
        if($title!=null){
            $postArr['title']=$title;
        }
        if($keywords!=null){
            $postArr['keywords']=$keywords;
        }
        if($description!=null){
            $postArr['description']=$description;
        }
        return $this->curl($postArr);
    }
    function edit($url,$visit_type=null,$title=null,$keywords=null,$description=null){
        $postArr['type']='edit';
        $postArr['url']=$url;
        if($visit_type!=null){
            $postArr['visit_type']=$visit_type;
        }
        if($title!=null){
            $postArr['title']=$title;
        }
        if($keywords!=null){
            $postArr['keywords']=$keywords;
        }
        if($description!=null){
            $postArr['description']=$description;
        }
        return $this->curl($postArr);
    }
    function delete($url){
        $postArr['type']='delete';
        $postArr['url']=$url;
        return $this->curl($postArr);
    }
    function list($url=null,int $page=1,int $rows=10){
        $postArr['type']='list';
        if($url!=null){
            $postArr['url']=$url;
        }
        $postArr['page']=$page;
        $postArr['rows']=$rows;
        return $this->curl($postArr);
    }
    function HighFrequencyCheck($url){
        $postArr['type']='HighFrequencyCheck';
        $postArr['url']=$url;
        return $this->curl($postArr);
    }
    function help(){
        $postArr['type']='help';
        return $this->curl($postArr);
    }
    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
    
}
class UrlCheck{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_UrlCheck);
        
    }
    function get($url){
        $postArr['url']=$url;
        return $this->curl($postArr);
    }
    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
}
class GetWechatShortUrl{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_GetWechatShortUrl);
        
    }

    function get($url){
        $postArr['url']=$url;
        return $this->curl($postArr);
    }
    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
}

class GetWeiboShortUrl{
    private $curl_url='';
    function __construct($appid,$appkey){
        $this->curl_url=(new BuSiNiaoApi($appid,$appkey))->get_url(BUSINIAO_API_TYPE_GetWeiboShortUrl);
        
    }

    function get($url){
        $postArr['url']=$url;
        return $this->curl($postArr);
    }

    private function curl($postArr){
        $curl=new ApiCurlLib($this->curl_url,[],$postArr);
        return $curl->curl();
    }
}