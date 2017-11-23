<?php

namespace ShInUeXx\Gerrit\Endpoints;

class Accounts extends \ShInUeXx\Gerrit\Endpoints\Endpoint{
    protected static $name = 'accounts';

    private static $capabilitiesIds = array(
            'accessDatabase',
            'administrateServer',
            'createAccount',
            'createGroup',
            'createProject',
            'emailReviewers',
            'flushCaches',
            'killTask',
            'maintainServer',
            'priority',
            'queryLimit',
            'runAs',
            'runGC',
            'streamEvents',
            'viewAllAccounts',
            'viewCaches',
            'viewConnections',
            'viewPlugins',
            'viewQueue',
    );

    public function queryAccount($queryString,$extra = array()){
        $extra['q'] = $queryString;
        return $this->_get("",$extra);
    }
    public function getAccount($accountId = 'self',$extra = array()){
        return $this->_get(urlencode($accountId),$extra);
    }
    public function createAccount($username,$accountInput){
        return $this->_put(urlencode($username),[],$accountInput);
    }
    public function getAccountDetails($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'detail');
        return $this->_get($url,$extra);
    }
    public function getAccountName($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'name');
        return $this->_get($url, $extra);
    }
    public function setAccountName($accountId, $accountNameInput){
        $url = self::UrlPath($accountId,'name');
        return $this->_put($url,[],$accountNameInput);
    }
    public function deleteAccountName($accountId = 'self'){
        $url = self::UrlPath($accountId,'name');
        return $this->_delete($url);
    }
    public function getAccountStatus($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'status');
        return $this->_get($url,$extra);
    }
    public function setAccountStatus($accountId,$accountStatusInput){
        $url = self::UrlPath($accountId,'status');
        return $this->_put($url,[],$accountStatusInput);
    }
    public function getUsername($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'username');
        return $this->_get($url,$extra);
    }
    public function setUsername($accountId,$usernameInput){
        $url = self::UrlPath($accountId,'username');
        return $this->_put($url,[],$usernameInput);
    }
    public function getActive($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'active');
        return $this->_get($url,$extra,null,false);
    }
    public function setActive($accountId = 'self'){
        $url = self::UrlPath($accountId,'active');
        return $this->_put($url);
    }
    public function deleteActive($accountId = 'self'){
        $url = self::UrlPath($accountId,'active');
        return $this->_delete($url);
    }
    public function setGenerateHTTPPassword($accountId,$httpPasswordInput){
        $url = self::UrlPath($accountId,'password.http');
        return $this->_put($url,[],$httpPasswordInput);
    }
    public function deleteHTTPPassword($accountId = 'self'){
        $url = self::UrlPath($accountId,'password.http');
        return $this->_delete($url);
    }
    public function getOAuthAccessToken($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'oauthtoken');
        return $this->_get($url,$extra);
    }
    public function listAccountEmails($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'emails');
        return $this->_get($url, $extra);
    }
    public function getAccountEmail($accountId = 'self',$emailId = 'preferred',$extra = array()){
        $url = self::UrlPath($accountId,'emails',$emailId);
        return $this->_get($url,$extra);
    }
    public function createAccountEmail($accountId,$emailId,$emailInput){
        $url = self::UrlPath($accountId,'emails',$emailId);
        return $this->_put($url,[],$emailInput);
    }
    public function deleteAccountEmail($accountId = 'self', $emailId = 'preferred'){
        $url = self::UrlPath($accountId,'emails',$emailId);
        return $this->_delete($url);
    }
    public function setPreferredEmail($accountId,$emailId){
        $url = self::UrlPath($accountId,'emails',$emailId,'preferred');
        return $this->_put($url);
    }
    public function listSSHKeys($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'sshkeys');
        return $this->_get($url,$extra);
    }
    public function getSSHKey($accountId = 'self',$sshKeyId = 1,$extra = array()){
        $url = self::UrlPath($accountId,'sshkeys',$sshKeyId);
        return $this->_get($url,$extra);
    }
    public function addSSHKey($accountId,$sshKeyRaw){
        $this->contentType = 'plain/text';
        $url = self::UrlPath($accountId,'sshkeys');
        $r = $this->_post($url,[],$sshKeyRaw);
        $this->contentType = 'application/json';
        return $r;
    }
    public function deleteSSHKey($accountId = 'self',$sshKeyId = 1){
        $url = self::UrlPath($accountId,'sshkeys',$sshKeyId);
        return $this->_delete($url);
    }
    public function listGPGKeys($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'gpgkeys');
        return $this->_get($url , $extra);
    }
    public function getGPGKey($accountId,$gpgKeyId,$extra = array()){
        $url = self::UrlPath($accountId,'gpgkeys',$gpgKeyId);
        return $this->_get($url,$extra);
    }
    public function addDeleteGPGKeys($accountId,$gpgKeysInput){
        $url = self::UrlPath($accountId,'gpgkeys');
        return $this->_post($url,[],$gpgKeysInput);
    }
    public function deleteGPGKey($accountId,$gpgKeyId){
        $url = self::UrlPath($accountId,'gpgkeys',$gpgKeyId);
        return $this->_delete($url);
    }
    public function listAccountCapabilities($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'capabilities');
        return $this->_get($url,$extra);
    }
    public function checkAccountCapability($accountId = 'self',$capabilityId = 'queryLimit',$extra = array()){
        if(!in_array($capabilityId,self::$capabilitiesIds))
            throw new \InvalidArgumentException("Invalid capability-id: '$capabilityId'");
        $url = self::UrlPath($accountId,'capabilities',$capabilityId);
        return $this->_get($url,$extra,null,false);
    }
    public function listGroups($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'groups','');
        return $this->_get($url,$extra);
    }
    public function getAvatar($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'avatar');
        return $this->_get($url,$extra);
    }
    public function getAvatarChangeURL($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'avatar.change.url');
        return $this->_get($url,$extra);
    }
    public function getUserPreferences($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'preferences');
        return $this->_get($url, $extra);
    }
    public function setUserPreferences($accountId,$preferencesInput){
        $url = self::UrlPath($accountId,'preferences');
        return $this->_put($url, [],$preferencesInput);
    }
    public function getDiffPreferences($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'preferences.diff');
        return $this->_get($url, $extra);
    }
    public function setDiffPreferences($accountId,$diffPreferencesInput){
        $url = self::UrlPath($accountId,'preferences.diff');
        return $this->_put($url, [], $diffPreferencesInput);
    }
    public function getEditPreferences($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'preferences.edit');
        return $this->_get($url, $extra);
    }
    public function setEditPreferences($accountId,$editPreferencesInput){
        $url = self::UrlPath($accountId,'preferences.edit');
        return $this->_put($url, [], $editPreferencesInput);
    }
    public function getWatchedProjects($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'watched.projects');
        return $this->_get($url, $extra);
    }
    public function addUpdateListofWatchedProjectEntities($accountId,$projectWatchInfoList){
        $url = self::UrlPath($accountId,'watched.projects');
        return $this->_post($url, [],$projectWatchInfoList);
    }
    public function deleteWatchedProjects($accountId,$projectWatchInfoList){
        $url = self::UrlPath($accountId,'watched.projects:delete');
        return $this->_post($url, [],$projectWatchInfoList);
    }
    public function getAccountExternalIDs($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'external.ids');
        return $this->_get($url, $extra);
    }
    public function deleteAccountExternalIDs($accountId,$externalIdsList){
        $url = self::UrlPath($accountId,'external.ids:delete');
        return $this->_post($url , [], $externalIdsList);
    }
    public function getChangesWithDefaultStar($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'starred.changes');
        return $this->_get($accountId . '/starred.changes', $extra);
    }
    public function putDefaultStarOnChange($accountId,$changeId){
        $url = self::UrlPath($accountId,'starred.changes',$changeId);
        return $this->_put($url);
    }
    public function removeDefaultStarFromChange($accountId,$changeId){
        $url = self::UrlPath($accountId,'starred.changes',$changeId);
        return $this->_delete($url);
    }
    public function getStarredChanges($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'stars.changes');
        return $this->_get($url, $extra);
    }
    public function getStarLabelsFromChange($accountId,$changeId,$extra = array()){
        $url = self::UrlPath($accountId,'stars.changes',$changeId);
        return $this->_get($url, $extra);
    }
    public function updateStarLabelsOnChange($accountId,$changeId,$starsInput){
        $url = sprintf("%s/stars.changes/%s", urlencode($accountId),urlencode($changeId));
        return $this->_post($url,[],$starsInput);
    }
    public function listContributorAgreements($accountId = 'self',$extra = array()){
        $url = self::UrlPath($accountId,'agreements');
        return $this->_get($url, $extra);
    }
    public function signContributorAgreement($accountId,$contributorAgreementInput){
        $url = self::UrlPath($accountId,'agreements');
        return $this->_post($url,[],$contributorAgreementInput);
    }
    public function indexAccount($accountId,$extra = array()){
        $url = self::UrlPath($accountId,'index');
        return $this->_get($url, $extra);
    }
}