<?php
namespace ShInUeXx\Gerrit;
require_once 'Endpoints/Endpoint.class.php';
require_once 'Endpoints/Access.class.php';
require_once 'Endpoints/Accounts.class.php';
require_once 'Endpoints/Changes.class.php';
require_once 'Endpoints/Documentation.class.php';
require_once 'Endpoints/Groups.class.php';
require_once 'Endpoints/Plugins.class.php';
require_once 'Endpoints/Projects.class.php';

/**
 *
 * @author earkkal
 * @property-read \ShInUeXx\Gerrit\Endpoints\Access           $access
 * @property-read \ShInUeXx\Gerrit\Endpoints\Accounts         $accounts
 * @property-read \ShInUeXx\Gerrit\Endpoints\Changes          $changes
 * @property-read \ShInUeXx\Gerrit\Endpoints\Config           $config
 * @property-read \ShInUeXx\Gerrit\Endpoints\Groups           $groups
 * @property-read \ShInUeXx\Gerrit\Endpoints\Plugins          $plugins
 * @property-read \ShInUeXx\Gerrit\Endpoints\Projects         $projects
 * @property-read \ShInUeXx\Gerrit\Endpoints\Documentation    $Documentation
 */

class Gerrit{
    private static $endpoints = [
            'access',
            'accounts',
            'changes',
            'config',
            'groups',
            'plugins',
            'projects',
            'Documentation'
    ];

    protected $url;

    protected $auth = 0;
    protected $http_auth;

    public function __construct($url){
        $this->url = $url;
    }
    public function __get($name){
        return $this->getEndpoint($name);
    }

    public function setHTTPAuth($authKeyOrUser, $pass = null){
        if($pass !== null){
            $authKeyOrUser = sprintf("%s:%s",$authKeyOrUser,$pass);
            $authKeyOrUser = base64_encode($authKeyOrUser);
        }
        $this->http_auth = $authKeyOrUser;
        $this->auth = 1;
        return $this;
    }
    /**
     *
     * @param string $name
     * @throws \InvalidArgumentException
     * @return \ShInUeXx\Gerrit\Endpoints\Endpoint
     */
    public function getEndpoint($name){
        if(!in_array($name,self::$endpoints))
            throw new \InvalidArgumentException("Gerrit does not have endpoint called '$name'");

        $class =  __NAMESPACE__ . '\\Endpoints\\' . ucfirst($name);
        $refl = new \ReflectionClass($class);
        return $refl->newInstance($this->url,$this->auth,$this->http_auth);
    }
}