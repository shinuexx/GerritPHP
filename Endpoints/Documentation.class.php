<?php
namespace ShInUeXx\Gerrit\Endpoints;
class Documentation extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = "Documentation";

    public function searchDocumentation($queryString,$extra = array()){
        $extra['q'] = $queryString;
        return $this->_get('',$extra);
    }
}