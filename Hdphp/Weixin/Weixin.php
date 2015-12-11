<?php namespace Hdphp\Weixin;

class Weixin{
	
	use Error,Button,Event,Receive,Reply;
  	
  	//TOKEN定义
    private $token='weixin';

    //API 根地址
    const API_URL = 'https://api.weixin.qq.com';

    private $appID='wxcf444c17dbd095b9';

    private $appsecret='6fd451c0cff05b6c39c51dd7f7bff562';

    //微信 服务器发来的数据
	private $receive;

    #-------------------请求----------------
    //请求文本消息
	CONST MSG_TYPE_TEXT = 'text';

	//请求图片消息
	CONST MSG_TYPE_IMAGE = 'image';

	//请求语音消息
	CONST MSG_TYPE_VOICE = 'voice';

	//请求地理位置消息
	CONST MSG_TYPE_LOCATION = 'location';

	//请求链接消息
	CONST MSG_TYPE_LINK = 'link';

	//请求小视频消息
	CONST MSG_TYPE_SMALL_VIDEO = 'shortvideo';

	//请求视频消息
	CONST MSG_TYPE_VIDEO = 'video';

	#-------------------事件----------------
	//关注事件
	CONST EVENT_TYPE_SUBSCRIBE = 'subscribe';

	//取消关注事件
	CONST EVENT_TYPE_UNSUBSCRIBE = 'unsubscribe';

	//未关注用户扫描二维码事件
	CONST EVENT_TYPE_UNSUBSCRIBE_SCAN = 'subscribe';

	//关注用户扫描二维码事件
	CONST EVENT_TYPE_SUBSCRIBE_SCAN = 'SCAN';

	//上报地理位置事件
	CONST EVENT_TYPE_LOCATION = 'LOCATION';

	//点击菜单拉取消息时的事件
	CONST EVENT_TYPE_CLICK = 'CLICK';

	//点击菜单跳转链接时的事件
	CONST EVENT_TYPE_VIEW = 'VIEW';

	#-------------------回复内容----------------
	//回复文本
	CONST REPLY_TYPE_TEXT = 'text';

	//回复图文
	CONST REPLY_TYPE_IMAGE = 'image';

	//回复语音
   	CONST REPLY_TYPE_VOICE = 'voice';

   	//回复视频
   	CONST REPLY_TYPE_VIDEO = 'video';

   	//音乐消息
   	CONST REPLY_TYPE_MUSIC = 'music';

   	//图文信息
   	CONST REPLY_TYPE_NEWS = 'news';

    /**
     access_token是公众号的全局唯一票据，公众号调用各接口时都需使用access_token。开发者需要进行妥善保存。access_token的存储至少要保留512个字符空间。access_token的有效期目前为2个小时，需定时刷新，重复获取将导致上次获取的access_token失效，每天可获取2000次
     */
    private $access_token;

    //服务器返回的 access_token 过期时间，一般2小时
    private $expires_in;

    public function __construct()
    {
        //处理 微信服务器 发来的数据
        $this->parsetReceivePostData();
    }

    /**
     * 微信接口整合验证
     * @return [type] [description]
     */
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        //验证微信请求
        if($this->checkSignature())
        {
        	echo $echoStr;
        	exit;
        }
    }

    //获得微信服务器发来的数据
    public function getReceive()
    {
        return $this->receive;
    }

    //设置appID
    public function appID($appID)
    {
        $this->appID = $appID;
        return $this;
    }

    //设置appsecret
    public function appsecret($appsecret)
    {
        $this->appsecret = $appsecret;
        return $this;
    }

    /**
     * 验证微信请求
     * @return [type] [description]
     */
    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = $this->token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature )
        {
           return true;
        }
        else
        {
         return false;
        }
   }

   //设置 TOKEN
   public function setToken($token)
   {
        $this->token = $token;
        return $this;
   }
    /**
     * 获取accessToken
     * 只有获取到TOKEN才可以使用各种API接口
     * @return [type] [description]
     */
    public function getAccessToken()
    {
        $url = self::API_URL.'/cgi-bin/token?grant_type=client_credential&appid='.$this->appID.'&secret='.$this->appsecret;
        $cacheKey = md5($url);
        if($token = Cache::dir('storage/weixin')->get($cacheKey))
        {
            return $token;
        }
        $data = $this->curl($url);

        $json = json_decode($data,true);

        if(array_key_exists('errcode', $json) && $json['errcode'] !=0)
        {
            //获取失败
            return false;
        }
        else
        {
            $this->access_token=$json['access_token'];
            $this->expires_in = (int)$json['expires_in'];
            //应该保存缓存。。。
            Cache::dir('storage/weixin')->set($cacheKey,$this->access_token,$this->expires_in);
            return $this->access_token;
        }
    }

    //解析接收的微信服务器发来的POST XML 数据
    public function parsetReceivePostData()
    {
        $post = file_get_contents('php://input');
        // $post = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = simplexml_load_string($post,'SimpleXMLElement',LIBXML_NOCDATA);

        if($data !==false)
        {
            $this->receive = $data;
        }

        return $data;
    }

    //CURL请求
    private function curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        if(!curl_exec($ch))
        {
            $data='';
        }
        else
        {
            $data = curl_multi_getcontent($ch);
        }
        curl_close($ch);
        return $data;
    }

    //curl 提交数据
    private function curlPost($url,$jsonData)
    {
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        $data = curl_exec($ch);
        curl_close($ch);  
        return $data;
    }
}