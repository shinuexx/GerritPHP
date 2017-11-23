<?php
namespace ShInUeXx\Gerrit\Endpoints;

class Plugins extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = 'plugins';

    public function listPlugins($extra = array()){
        return $this->_get('',$extra);
    }

    public function installPlugin($pluginId){
        $url = self::UrlPath($pluginId);
        return $this->_put($url);
    }

    public function getPluginStatus($pluginId,$extra = array()){
        $url = self::UrlPath($pluginId,'gerrit~status');
        return $this->_get($url,$extra);
    }

    public function enablePlugin($pluginId){
        $url = self::UrlPath($pluginId,'gerrit~enable');
        return $this->_post($url);
    }

    public function disablePlugin($pluginId){
        $url = self::UrlPath($pluginId,'gerrit~disable');
        return $this->_post($url);
    }

    public function reloadPlugin($pluginId){
        $url = self::UrlPath($pluginId,'gerrit~reload');
        return $this->_post($url);
    }

}