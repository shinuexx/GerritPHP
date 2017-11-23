<?php
namespace ShInUeXx\Gerrit\Endpoints;

class Groups extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = 'groups';

    public function listGroups($extra = array()){
        return $this->_get('',$extra);
    }

    public function queryGroups($queryString,$extra = array()){
        $extra['query2'] = $queryString;
        return $this->_get('',$extra);
    }

    public function getGroup($groupId,$extra = array()){
        $url = self::UrlPath($groupId);
        return $this->_get($url,$extra);
    }

    public function createGroup($groupName,$groupInput = null){
        $url = self::UrlPath($groupName);
        return $this->_put($url,[],$groupInput);
    }

    public function getGroupDetail($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'detail');
        return $this->_get($url,$extra);
    }

    public function getGroupName($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'name');
        return $this->_get($url,$extra);
    }

    public function renameGroup($groupId,$newName){
        $url = self::UrlPath($groupId,'name');
        return $this->_put($url,[],['name' => $newName]);
    }

    public function getGroupDescription($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'description');
        return $this->_get($url,$extra);
    }

    public function setGroupDescription($groupId,$newDescription){
        $url = self::UrlPath($groupId,'description');
        return $this->_put($url,[],['description' => $newDescription]);
    }

    public function deleteGroupDescription($groupId){
        $url = self::UrlPath($groupId,'description');
        return $this->_delete($url);
    }

    public function getGroupOptions($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'options');
        return $this->_get($url,$extra);
    }

    public function setGroupOptions($groupId,$groupOptionsInput){
        $url = self::UrlPath($groupId,'options');
        return $this->_put($url,[],$groupOptionsInput);
    }

    public function getGroupOwner($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'owner');
        return $this->_get($url,$extra);
    }

    public function setGroupOwner($groupId,$newOwner){
        $url = self::UrlPath($groupId,'owner');
        return $this->_put($url,[],['owner' => $newOwner]);
    }

    public function getAuditLog($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'log.audit');
        return $this->_get($url,$extra);
    }

    public function indexGroup($groupId){
        $url = self::UrlPath($groupId,'index');
        return $this->_post($url);
    }

    public function listGroupMembers($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'members','');
        return $this->_get($url,$extra);
    }

    public function getGroupMember($groupId,$accountId,$extra = array()){
        $url = self::UrlPath($groupId,'members',$accountId);
        return $this->_get($url,$extra);
    }

    public function addGroupMember($groupId,$accountId,$extra = array()){
        $url = self::UrlPath($groupId,'members',$accountId);
        return $this->_put($url);
    }

    public function addGroupMembers($groupId,$membersInput){
        $url = self::UrlPath($groupId,'members.add');
        return $this->_post($url,[],$membersInput);
    }

    public function removeGroupMember($groupId,$accountId){
        $url = self::UrlPath($groupId,'members',$accountId);
        return $this->_delete($url);
    }

    public function removeGroupMembers($groupId,$memberInput){
        $url = self::UrlPath($groupId,'members.delete');
        return $this->_post($url,[],$memberInput);
    }

    public function listSubgroups($groupId,$extra = array()){
        $url = self::UrlPath($groupId,'groups','');
        return $this->_get($url,$extra);
    }

    public function getSubgroup($groupId,$subGroupId,$extra = array()){
        $url = self::UrlPath($groupId,'groups',$subGroupId);
        return $this->_get($url,$extra);
    }

    public function addSubgroup($groupId,$subGroupId){
        $url = self::UrlPath($groupId,'groups',$subGroupId);
        return $this->_put($url);
    }

    public function addSubgroups($groupId,$groupsInput){
        $url = self::UrlPath($groupId,'groups.add');
        return $this->_post($url,[],$groupsInput);
    }

    public function removeSubgroup($groupId,$subGroupId){
        $url = self::UrlPath($groupId,'groups');
        return $this->_delete($url);
    }

    public function removeSubgroups($groupId,$groupsInput){
        $url = self::UrlPath($groupId,'groups.delete');
        return $this->_post($url,[],$groupsInput);
    }
}