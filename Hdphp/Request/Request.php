<?php namespace Hdphp\Request;

//请求处理
class Request{

    public function __call($method,$params)
    { 
        $params[0] = $method.'.'.$params[0];
        return call_user_func_array(array($this,'getVar'), $params);
    }

    public function getVar($var, $default = null, $filter = array())
    {
        //支持get.id 或 id
        $var = explode(".", $var);

        if (count($var) == 1)
        {
            array_unshift($var, 'REQUEST');
        }
        
        switch (strtoupper($var[0])) {
            case 'GET' :
            $data = &$_GET;
            break;
            case 'POST' :
            $data = &$_POST;
            break;
            case 'REQUEST' :
            $data = &$_REQUEST;
            break;
            case 'FILES' :
            $data = &$_FILES;
            break;
            case 'SESSION' :
            $data = &$_SESSION;
            break;
            case 'COOKIE' :
            $data = &$_COOKIE;
            break;
            case 'SERVER' :
            $data = &$_SERVER;
            break;
            case 'GLOBALS' :
            $data = &$GLOBALS;
            break;
            default :
            return ;
        }
        //没有执行参数如q("post.")时返回所有数据
        if (empty($var[1]))
        {
            return $data;
        }
        else if (isset($data[$var[1]]))
        {
            $value = $data[$var[1]];
            //参数过滤函数
            if (!empty($filter)) {
                
                //过滤处理
                foreach ((array)$filter as $func)
                {
                    if (function_exists($func))
                    {
                        $value = is_array($value) ? array_map($func, $value) : $func($value);
                    }
                }
                $data[$var[1]] = $value;
                return $value;
            }
            return $value;
        } else {
            return $data[$var[1]] = $default;
        }
    }

	//客户端IP
    public function ip($type = 0)
    {
      $type = intval($type);
    	//保存客户端IP地址
      if (isset($_SERVER)) {
       if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
} else {
   if (getenv("HTTP_X_FORWARDED_FOR")) {
    $ip = getenv("HTTP_X_FORWARDED_FOR");
} else if (getenv("HTTP_CLIENT_IP")) {
    $ip = getenv("HTTP_CLIENT_IP");
} else {
    $ip = getenv("REMOTE_ADDR");
}
}
$long = ip2long($ip);
$clientIp = $long ? array($ip, $long) : array("0.0.0.0", 0);
return $clientIp[$type];
}

	//https请求
public function isHttps()
{
  if (isset($_SERVER['HTTPS']) && ('1' == $_SERVER['HTTPS'] || 'on' == strtolower($_SERVER['HTTPS']))) {
   return true;
} elseif (isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'])) {
   return true;
}
return false;
}
}