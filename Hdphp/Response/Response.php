<?php namespace Hdphp\Response;

class Response{

	/**
	 * HTTP 状态码
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	static function sendHttpStatus($code) 
	{
		static $_status = array(
			// Informational 1xx
			100 => 'Continue',
			101 => 'Switching Protocols',

			// Success 2xx
			200 => 'OK',
			201 => 'Created',
			202 => 'Accepted',
			203 => 'Non-Authoritative Information',
			204 => 'No Content',
			205 => 'Reset Content',
			206 => 'Partial Content',

			// Redirection 3xx
			300 => 'Multiple Choices',
			301 => 'Moved Permanently',
			302 => 'Found',  // 1.1
			303 => 'See Other',
			304 => 'Not Modified',
			305 => 'Use Proxy',
			// 306 is deprecated but reserved
			307 => 'Temporary Redirect',

			// Client Error 4xx
			400 => 'Bad Request',
			401 => 'Unauthorized',
			402 => 'Payment Required',
			403 => 'Forbidden',
			404 => 'Not Found',
			405 => 'Method Not Allowed',
			406 => 'Not Acceptable',
			407 => 'Proxy Authentication Required',
			408 => 'Request Timeout',
			409 => 'Conflict',
			410 => 'Gone',
			411 => 'Length Required',
			412 => 'Precondition Failed',
			413 => 'Request Entity Too Large',
			414 => 'Request-URI Too Long',
			415 => 'Unsupported Media Type',
			416 => 'Requested Range Not Satisfiable',
			417 => 'Expectation Failed',
			// Server Error 5xx
			500 => 'Internal Server Error',
			501 => 'Not Implemented',
			502 => 'Bad Gateway',
			503 => 'Service Unavailable',
			504 => 'Gateway Timeout',
			505 => 'HTTP Version Not Supported',
			509 => 'Bandwidth Limit Exceeded'
			);

if (isset($state[$code])) {
	header('HTTP/1.1 ' . $code . ' ' . $state[$code]);
	header('Status:' . $code . ' ' . $state[$code]);
}
}

	/**
	 * 异步响应数据
	 * @param  int 		$code    编码
	 * @param  mixed 	$message 内容
	 * @param  string 	$url     跳转地址
	 * @return void
	 */
	public function ajax($data, $type = "JSON")
	{
		$type = strtoupper($type);
        switch ($type) {
            case "HTML" :
            case "TEXT" :
                $_data = $data;
                break;
            case "XML" :
                //XML处理
                header( 'Content-Type: application/xml' );
                $_data = Xml::create($data);
                break;
            default :
                //JSON处理
                header( 'Content-Type: application/json' );
                $_data = json_encode($data);
        }
        echo $_data;
        exit;
	}

}