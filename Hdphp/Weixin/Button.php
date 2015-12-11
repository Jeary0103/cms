<?php namespace Hdphp\Weixin;

//自定义菜单
trait Button
{
	//创建菜单
	public function createButton($button)
	{
		$url = self::API_URL.'/cgi-bin/menu/create?access_token='.$this->getAccessToken();
		$content = $this->curlPost($url,$button);

		$result = json_decode($content,true);

		return $this->get($result);
	}	

	//查询微信服务器上菜单
	public function queryButton()
	{
		$url = self::API_URL.'/cgi-bin/menu/get?access_token='.$this->getAccessToken();
		$content = $this->curl($url);

		return $this->get($content);
	}

	//删除菜单
	public function delButton()
	{
		$url = self::API_URL.'/cgi-bin/menu/delete?access_token='.$this->getAccessToken();
		$content = $this->curl($url);

		return $this->get($content);
	}
}