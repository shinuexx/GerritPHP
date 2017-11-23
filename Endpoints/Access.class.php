<?php
namespace ShInUeXx\Gerrit\Endpoints;

class Access extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = 'access';

    public function listAccessRights($projectName){
        $url = sprintf("?project=%s",urlencode($projectName));
        return $this->_get($url);
    }
}