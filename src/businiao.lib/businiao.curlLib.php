<?php
/* $url='http://www.sm.com/face/index.php?at=index&ac=web_pay';
$url='http://a_agent.short.systempanel.org/check.txt';
$curl=new ApiCurlLib($url);
ob_clean();
echo $curl->curl(); */

//把上面的注释掉
class ApiCurlLib {
    private $url="";//远程访问的地址
    private  $hosts=[];
    private $postArr=[];
    private $customize_get=[];//['a'=>'b']
    private $customize_post=[];//['c'=>'d']
    private $customize_files=[];
    /*@
     * $customize_get:自定义GET
     * $customize_post:自定义POST
     * $customize_files:自定义files
     */
    public function __construct($url,$customize_get=[],$customize_post=[],$customize_files=[]) {
        $this->url=$url;
        $this->hosts=parse_url($this->url);
        $this->customize_get=$customize_get;
        $this->customize_post=$customize_post;
        $this->customize_files=$customize_files;
    }
    
    //获取$_GET
    public function content_get($customize=[]){
        $query=(isset($this->hosts['query'])  ?  $this->hosts['query'] :'');
        $get=['api_version'=>BUSINIAO_API_VERSION];
        //print_r($this->hosts);
        //print_r($get);
        if($query!=""){
            $query=$query.'&';
        }
        foreach ($get as $key=>$value){
            $query=$query.$key."=".$value."&";
        }
        foreach ($customize as $key=>$value){
            $query=$query.$key."=".$value."&";
        }
        
        
        $query=trim($query,"&");
        
        $this->url=$this->hosts['scheme'].'://'.
                            $this->hosts['host'].
                            (!isset($this->hosts['path']) ? '/' :  $this->hosts['path'] ).
                            ($query=="" ? '' :  '?'.$query );
        
        //echo $this->url;
    }
    //获取$_POST
    public function content_post($customize=[]){
        $post=['api_version'=>BUSINIAO_API_VERSION];
        if(count($customize)!=0){
            $post=array_merge($post,$customize);
        }
        $this->postArr=$post;
       // print_r($post);

    }
    //获取$_files
    public function content_files($customize=[]){
    
    }
    private $disale_post=false;
    public function disale_post($is=true){
        $this->disale_post=$is;
    }

    public function curl($customize_config=[],$other_type=null){
        $this->content_get($this->customize_get);
        $this->content_post($this->customize_post);
        $this->content_files($this->customize_files);
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        if(!empty($this->postArr) and !$this->disale_post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$this->postArr);
        }

        
        for($i=0;$i<count($customize_config);$i++){
            curl_setopt($ch, $customize_config[$i][0],$customize_config[$i][1]);
        }
        
        
        if($this->hosts['scheme']=='https'){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        $output = curl_exec($ch);;
        $getinfo= curl_getinfo($ch);    
        curl_close($ch);
        if($other_type=='curl_getinfo'){
            return $getinfo;
        }
        return $output;

    }
}