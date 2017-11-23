<?php
namespace ShInUeXx\Gerrit\Endpoints;
class Projects extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = 'projects';

    public function listProjects($extra = array()){
        return $this->_get('',$extra);
    }

    public function queryProjects($queryString,$extra = array()){
        $extra['query'] = $queryString;
        return $this->_get('',$extra);
    }

    public function getProject($projectName,$extra = array()){
        $url = self::UrlPath($projectName);
        return $this->_get($url,$extra);
    }

    public function createProject($projectName,$projectInput = null){
        $url = self::UrlPath($projectName,'');
        return $this->_put($url,[],$projectInput);
    }

    public function getProjectDescription($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'description');
        return $this->_get($url,$extra);
    }

    public function setProjectDescription($projectName,$projectDescriptionInput){
        $url = self::UrlPath($projectName,'description');
        return $this->_put($url,[],$projectDescriptionInput);
    }

    public function deleteProjectDescription($projectName){
        $url = self::UrlPath($projectName,'description');
        return $this->_delete($url);
    }

    public function getProjectParent($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'parent');
        return $this->_get($url,$extra);
    }

    public function setProjectParent($projectName,$projectParentInput){
        $url = self::UrlPath($projectName,'parent');
        return $this->_put($url,[],$projectParentInput);
    }

    public function getHEAD($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'HEAD');
        return $this->_get($url,$extra);
    }

    public function setHEAD($projectName,$headInput){
        $url = self::UrlPath($projectName,'HEAD');
        return $this->_put($url,[],$headInput);
    }

    public function getRepositoryStatistics($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'statistics.git');
        return $this->_get($url,$extra);
    }

    public function getConfig($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'config');
        return $this->_get($url,$extra);
    }

    public function setConfig($projectName,$configInput){
        $url = self::UrlPath($projectName,'config');
        return $this->_put($url,[],$configInput);
    }

    public function runGc($projectName,$gcInput = null){
        $url = self::UrlPath($projectName,'gc');
        return $this->_post($url,[],$gcInput);
    }

    public function banCommit($projectName,$banInput){
        $url = self::UrlPath($projectName,'ban');
        return $this->_post($url,[],$banInput);
    }

    public function listAccessRightsForProject($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'access');
        return $this->_get($url,$extra);
    }

    public function addUpdateAndDeleteAccessRightsForProject($projectName,$projectAccessInput){
        $url = self::UrlPath($projectName,'access');
        return $this->_post($url,[],$projectAccessInput);
    }

    public function createAccessRightsChangeForReview($projectName,$projectAccessInput){
        $url = self::UrlPath($projectName,'access:review');
        return $this->_put($url,[],$projectAccessInput);
    }

    public function checkAccess($accessCheckInput){
        $url = self::UrlPath('MyProject','check.access');
        return $this->_post($url,[],$accessCheckInput);
    }

    public function indexAllChangesInAProject(){
        $url = self::UrlPath('MyProject');
        return $this->_post($url);
    }

    public function listBranches($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'branches','');
        return $this->_get($url,$extra);
    }

    public function getBranch($projectName,$branchId = 'HEAD',$extra = array()){
        $url = self::UrlPath($projectName,'branches',$branchId);
        return $this->_get($url,$extra);
    }

    public function createBranch($projectName,$branchId,$branchInput = null){
        $url = self::UrlPath($projectName,'branches',$branchId);
        return $this->_put($url,[],$branchInput);
    }

    public function deleteBranch($projectName,$branchId){
        $url = self::UrlPath($projectName,'branches',$branchId);
        return $this->_delete($url);
    }

    public function deleteBranches($projectName,$deleteBranchesInput){
        $url = self::UrlPath($projectName,'branches:delete');
        return $this->_post($url,[],$deleteBranchesInput);
    }

    public function getContentHeadRevision($projectName,$branchId = 'HEAD',$fileId = '/COMMIT_MSG',$extra = array()){
        $url = self::UrlPath($projectName,'branches',$branchId,'files',$fileId,'content');
        return $this->_get($url,$extra,null,false);
    }

    public function getMergeableInformation($projectName,$branchId = 'HEAD',$extra = array()){
        $url = self::UrlPath($projectName,'branches',$branchId,'mergeable');
        return $this->_get($url,$extra);
    }

    public function getReflog($projectName,$branchId = 'HEAD',$extra = array()){
        $url = self::UrlPath($projectName,'branches',$branchId,'reflog');
        return $this->_get($url,$extra);
    }

    public function listChildProjects($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'children','');
        return $this->_get($url,$extra);
    }

    public function getChildProject($projectName,$childProjectName,$extra = array()){
        $url = self::UrlPath($projectName,'children',$childProjectName);
        return $this->_get($url,$extra);
    }

    public function createTag($projectName,$tagId,$tagInput = null){
        $url = self::UrlPath($projectName,'tags',$tagId);
        return $this->_put($url,[],$tagInput);
    }

    public function listTags($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'tags','');
        return $this->_get($url,$extra);
    }

    public function getTag($projectName,$tagId,$extra = array()){
        $url = self::UrlPath($projectName,'tags',$tagId);
        return $this->_get($url,$extra);
    }

    public function deleteTag($projectName,$tagId){
        $url = self::UrlPath($projectName,'tags',$tagId);
        return $this->_delete($url);
    }

    public function deleteTags($projectName,$deleteTagsInput){
        $url = self::UrlPath($projectName,'tags:delete');
        return $this->_post($url,[],$deleteTagsInput);
    }

    public function getCommit($projectName,$commitId,$extra = array()){
        $url = self::UrlPath($projectName,'commits',$commitId);
        return $this->_get($url,$extra);
    }

    public function getIncludedIn($projectName,$commitId,$extra = array()){
        $url = self::UrlPath($projectName,'commits',$commitId,'in');
        return $this->_get($url,$extra);
    }

    public function getContentCommit($projectName,$commitId,$fileId = '/COMMIT_MSG',$extra = array()){
        $url = self::UrlPath($projectName,'commits',$commitId,'files',$fileId,'content');
        return $this->_get($url,$extra,null,false);
    }

    public function cherryPickCommit($projectName,$commitId,$cherryPickInput){
        $url = self::UrlPath($projectName,'commits',$commitId,'cherrypick');
        return $this->_post($url,[],$cherryPickInput);
    }

    public function listDashboards($projectName,$extra = array()){
        $url = self::UrlPath($projectName,'dashboards','');
        return $this->_get($url,$extra);
    }

    public function getDashboard($projectName,$dashboardId = 'default',$extra = array()){
        $url = self::UrlPath($projectName,'dashboards',$dashboardId);
        return $this->_get($url,$extra);
    }

    public function setDashboard($projectName,$dashboardId,$dashboardInput){
        $url = self::UrlPath($projectName,'dashboards',$dashboardId);
        return $this->_put($url,[],$dashboardInput);
    }

    public function deleteDashboard($projectName,$dashboardId = 'default', $dashboardInput = null){
        $url = self::UrlPath($projectName,'dashboards',$dashboardId);
        return $this->_delete($url,[],$dashboardInput);
    }

}