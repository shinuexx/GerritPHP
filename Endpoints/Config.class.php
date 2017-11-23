<?php
namespace ShInUeXx\Gerrit\Endpoints;
class Config extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = 'config';

    public function getVersion($extra = array()){
        $url = self::UrlPath('server','version');
        return $this->_get($url,$extra);
    }

    public function getServerInfo($extra = array()){
        $url = self::UrlPath('server','info');
        return $this->_get($url,$extra);
    }

    public function checkConsistency($consistencyCheckInput){
        $url = self::UrlPath('server','check.consistency');
        return $this->_post($url,[],$consistencyCheckInput);
    }

    public function confirmEmail($emailConfirmationInput){
        $url = self::UrlPath('server','email.confirm');
        return $this->_put($url,[],$emailConfirmationInput);
    }

    public function listCaches($extra = array()){
        $url = self::UrlPath('server','caches','');
        return $this->_get($url,$extra);
    }

    public function cacheOperations($cacheOperationInput){
        $url = self::UrlPath('server','caches','');
        return $this->_post($url,[],$cacheOperationInput);
    }

    public function getCache($cacheName,$extra = array()){
        $cacheName = is_array($cacheName) ? implode('-',$cacheName) : 'gerrit-'.$cacheName;
        $url = self::UrlPath('server','caches',$cacheName);
        return $this->_get($url,$extra);
    }

    public function flushCache(){
        $cacheName = is_array($cacheName) ? implode('-',$cacheName) : 'gerrit-'.$cacheName;
        $url = self::UrlPath('server','caches',$cacheName,'flush');
        return $this->_post($url);
    }

    public function getSummary($extra = array()){
        $url = self::UrlPath('server','summary');
        return $this->_get($url,$extra);
    }

    public function listCapabilities($extra = array()){
        $url = self::UrlPath('server','capabilities');
        return $this->_get($url,$extra);
    }

    public function listTasks($extra = array()){
        $url = self::UrlPath('server','tasks','');
        return $this->_get($url,$extra);
    }

    public function getTask($taskId,$extra = array()){
        $url = self::UrlPath('server','tasks',$taskId);
        return $this->_get($url,$extra);
    }

    public function deleteTask($taskId){
        $url = self::UrlPath('server','tasks',$taskId);
        return $this->_delete($url);
    }

    public function getTopMenus($extra = array()){
        $url = self::UrlPath('server','top-menus');
        return $this->_get($url,$extra);
    }

    public function getDefaultUserPreferences($extra = array()){
        $url = self::UrlPath('server','preferences');
        return $this->_get($url,$extra);
    }

    public function setDefaultUserPreferences($preferencesInput){
        $url = self::UrlPath('server','preferences');
        return $this->_put($url,[],$preferencesInput);
    }

    public function getDefaultDiffPreferences($extra = array()){
        $url = self::UrlPath('server','preferences.diff');
        return $this->_get($url,$extra);
    }

    public function setDefaultDiffPreferences($diffPreferencesInput){
        $url = self::UrlPath('server','preferences.diff');
        return $this->_put($url,[],$diffPreferencesInput);
    }
}