<?php

namespace ShInUeXx\Gerrit\Endpoints;

abstract class Endpoint{

    const MAGIC_PREFIX = ")]}'";
    const USER_AGENT = "PHP Gerrit Rest by ShInUeXx v1.0";
    const TIMESTAMP_FORMAT = 'Y-m-d H:i:s.u000';

    protected static $name;

    protected $url;
    protected $authType;
    protected $auth;
    protected $contentType = 'application/json';

    private $limit;

    public function __construct($url, $authType, $auth){
        $this->url = $url;
        $this->authType = $authType;
        $this->auth = $auth;
    }

    private function _execute($url,$method,$httpBuildQuery = array(),$input = null,$decodeJson = true){
        $input = (is_array($input)) ? json_encode($input) : (string) $input;
        $curl = curl_init();

        $finalUrl = $this->url;
        $curlHeaders = [
                'Content-Type: '.$this->contentType,
                'Content-Length: ' . strlen($input),
        ];
        if($this->authType == 1){
            $finalUrl .= "a/";
            $curlHeaders[] = 'Authorization: Basic ' . $this->auth;
        }

        $finalUrl .= static::$name .'/'. $url;

        if($this->limit !== null){
            $httpBuildQuery['n'] = $this->limit;
        }

        if(!empty($httpBuildQuery)){
            $finalUrl .= "?" . self::http_build_query($httpBuildQuery);
        }

        curl_setopt($curl, CURLOPT_URL, $finalUrl);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $curlHeaders);
        curl_setopt($curl, CURLOPT_USERAGENT, self::USER_AGENT);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HEADER, true);

        if(php_sapi_name() == 'cli')
            curl_setopt($ch, CURLOPT_MUTE, true);

        $result = curl_exec($curl);

        if($result === false) {
            throw new \Exception(curl_error($curl),curl_errno($curl));
        }

        $responseCode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($curl,CURLINFO_HEADER_SIZE);
        $headers = substr($result,0,$headerSize);
        $result = substr($result,$headerSize);

        curl_close($curl);

        $response = new \stdClass();
        $response->URL = $finalUrl;
        //$response->AuthorizationBasic = base64_decode($this->auth);
        $response->Code = $responseCode;
        $response->Headers = array_filter(explode("\r\n",$headers));

        $isJSON = (strpos($result,self::MAGIC_PREFIX) === 0);

        if($isJSON)
            $result = ltrim(substr($result,strlen(self::MAGIC_PREFIX)));

        $response->Body = $isJSON ? json_decode($result,true) : ($decodeJson ? trim($result) : $result);

        return $response;
    }

    protected function _get($url, $httpBuildQuery = array(), $input = null, $decodeJson = true){
        return $this->_execute($url,'GET',$httpBuildQuery,$input,$decodeJson);
    }
    protected function _post($url, $httpBuildQuery = array(), $input = null, $decodeJson = true){
        return $this->_execute($url,'POST',$httpBuildQuery,$input,$decodeJson);
    }
    protected function _put($url, $httpBuildQuery = array(), $input = null, $decodeJson = true){
        return $this->_execute($url,'PUT',$httpBuildQuery,$input,$decodeJson);
    }
    protected function _delete($url, $httpBuildQuery = array(), $input = null, $decodeJson = true){
        return $this->_execute($url,'DELETE',$httpBuildQuery,$input,$decodeJson);
    }
    public function setLimit($limit){
        $this->limit = (int) $limit;
        return $this;
    }
    public static function UrlPath($pathArg){
        return implode('/',array_map('rawurlencode',func_get_args()));
    }

    protected static function http_build_query($array){
        $r = [];
        foreach($array as $key => $value){
            $k = rawurlencode($key);
            if(is_array($value)){
                foreach($value as $in){
                    $r[] = sprintf("%s=%s",$k,rawurlencode($in));
                }
            }else{
                $r[] = sprintf("%s=%s",$k,rawurlencode($value));
            }
        }
        return implode("&",$r);
    }
}