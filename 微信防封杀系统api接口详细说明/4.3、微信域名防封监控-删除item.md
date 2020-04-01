## 防封监控-删除item-不死鸟微信网址防封杀免费API接口
不死鸟防封系统是完整的,目前已经支持 "实时监控封杀状态","被封域名网址恢复正常","提示浏览器打开","多域名自动切换","多级安全级别跳转",网址"阅读即焚",程序的功能都可以免费使用!https://www.v94.cn

**本API接口对应的会员中心页面(删除按钮):**
 - `https://www.v94.cn/user/index.html#business_management/url_cycle_check `
 
**请求URL：** 
- ` https://v94.cn/api/UrlCycleCheck.json  `
  
**请求方式：**
- POST 或者GET(如果用GET,特殊字符串需要url编码)

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|appid |  是  |    int   |    http://www.v94.cn/user/index.html 去免费获取appid   |
|appkey |  是  |    string   |    http://www.v94.cn/user/index.html 去免费获取appkey   |
|url |  是  |    string   |    输入http(s)://开头的网址   |
|type |  是  |    string   |   值:delete   |
**返回示例**
- `https://v94.cn/api/UrlCycleCheck.json?appid=37****15&appkey=a50d38748960******80ae1a725b7c95&url=http://www.baidu.com&type=delete `

``` 
{
  "code": 1,
  "message": "删除成功！"
}

```
**[查看所有CODE、STATUS值含义](https://github.com/wanjunlengfeng/WechatUrlCheckPreventingBlockedApi/blob/master/微信防封杀系统api接口详细说明/CODE代码汇总.md "查看所有CODE、STATUS值含义")**