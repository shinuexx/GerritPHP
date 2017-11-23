<?php

namespace ShInUeXx\Gerrit\Endpoints;

class Changes extends \ShInUeXx\Gerrit\Endpoints\Endpoint{

    protected static $name = 'changes';

    public function createChange($changeInput){
        return $this->_post("",[],$changeInput);
    }

    public function queryChanges($queryString,$extra = array()){
        $extra['q'] = $queryString;
        return $this->_get("",$extra);
    }

    public function getChange($changeId,$extra = array()){
        $url = self::UrlPath($changeId);
        return $this->_get($url,$extra);
    }

    public function getChangeDetail($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'detail');
        return $this->_get($url,$extra);
    }

    public function createMergePatchSetForChange($changeId,$mergePatchSetInput){
        $url = self::UrlPath($changeId,'merge');
        return $this->_post($url,[],$mergePatchSetInput);
    }

    public function setCommitMessage($changeId,$commitMessageInput){
        $url = self::UrlPath($changeId,'message');
        return $this->_put($url,[],$commitMessageInput);
    }

    public function getTopic($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'topic');
        return $this->_get($url,$extra);
    }

    public function setTopic($changeId,$topicInput){
        $url = self::UrlPath($changeId,'topic');
        return $this->_put($url,[],$topicInput);
    }

    public function deleteTopic($changeId){
        $url = self::UrlPath($changeId,'topic');
        return $this->_delete($url);
    }

    public function getAssignee($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'assignee');
        return $this->_get($url,$extra);
    }

    public function getPastAssignees($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'past_assignees');
        return $this->_get($url,$extra);
    }

    public function setAssignee($changeId,$assigneeInput){
        $url = self::UrlPath($changeId,'assignee');
        return $this->_put($url,[],$assigneeInput);
    }

    public function deleteAssignee($changeId){
        $url = self::UrlPath($changeId,'assignee');
        return $this->_delete($url);
    }

    public function getPureRevert($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'pure_revert');
        return $this->_get($url,$extra);
    }

    public function abandonChange($changeId,$abandonInput = null){
        $url = self::UrlPath($changeId,'abandon');
        return $this->_post($url,[],$abandonInput);
    }

    public function restoreChange($changeId,$restoreInput = null){
        $url = self::UrlPath($changeId,'restore');
        return $this->_post($url,[],$restoreInput);
    }

    public function rebaseChange($changeId,$rebaseInput = null){
        $url = self::UrlPath($changeId,'rebase');
        return $this->_post($url,[],$rebaseInput);
    }

    public function moveChange($changeId,$moveInput){
        $url = self::UrlPath($changeId,'move');
        return $this->_post($url,[],$moveInput);
    }

    public function revertChange($changeId,$revertInput = null){
        $url = self::UrlPath($changeId,'revert');
        return $this->_post($url,[],$revertInput);
    }

    public function submitChange($changeId,$submitInput){
        $url = self::UrlPath($changeId,'submit');
        return $this->_post($url,[],$submitInput);
    }

    public function changesSubmittedTogether($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'submitted_together');
        if(!isset($extra['o']))
            $extra['o'] = [];
        $extra['o'][] = 'NON_VISIBLE_CHANGES';
        return $this->_get($url,$extra);
    }

    public function deleteChange($changeId){
        $url = self::UrlPath($changeId);
        return $this->_delete($url);
    }

    public function getIncludedIn($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'in');
        return $this->_get($url,$extra);
    }

    public function indexChange($changeId){
        $url = self::UrlPath($changeId,'index');
        return $this->_post($url);
    }

    public function listChangeComments($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'comments');
        return $this->_get($url,$extra);
    }

    public function listChangeRobotComments($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'robotcomments');
        return $this->_get($url,$extra);
    }

    public function listChangeDrafts($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'drafts');
        return $this->_get($url,$extra);
    }

    public function checkChange($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'check');
        return $this->_get($url,$extra);
    }

    public function fixChange($changeId, $fixInput = null){
        $url = self::UrlPath($changeId,'check');
        return $this->_post($url,[],$fixInput);
    }

    public function setWorkInProgress($changeId,$workInProgressInput = null){
        $url = self::UrlPath($changeId,'wip');
        return $this->_post($url,[],$workInProgressInput);
    }

    public function setReadyForReview($changeId,$workInProgressInput = null){
        $url = self::UrlPath($changeId,'ready');
        return $this->_post($url,[],$workInProgressInput);
    }

    public function markPrivate($changeId,$privateInput){
        $url = self::UrlPath($changeId,'private');
        return $this->_post($url,[],$privateInput);
    }

    public function unmarkPrivate($changeId,$privateInput){
        $url = self::UrlPath($changeId,'private');
        return $this->_delete($url,[],$privateInput);
    }

    public function ignore($changeId){
        $url = self::UrlPath($changeId,'ignore');
        return $this->_put($url);
    }

    public function unignore($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'unignore');
        return $this->_put($url);
    }

    public function markAsReviewed($changeId){
        $url = self::UrlPath($changeId,'reviewed');
        return $this->_put($url);
    }

    public function markAsUnreviewed($changeId){
        $url = self::UrlPath($changeId,'unreviewed');
        return $this->_put($url);
    }

    public function getHashtags($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'hashtags');
        return $this->_get($url,$extra);
    }

    public function setHashtags($changeId,$hashtagsInput){
        $url = self::UrlPath($changeId,'hashtags');
        return $this->_post($url,[],$hashtagsInput);
    }

    public function getChangeEditDetails($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'edit');
        return $this->_get($url,$extra);
    }

    public function changeFileContentInChangeEdit($changeId,$pathToFile,$fileContent = ""){
        $url = self::UrlPath($changeId,'edit',$pathToFile);
        return $this->_put($url,[],$fileContent);
    }

    public function restoreFileContentOrRenameFilesInChangeEdit($changeId,$changeEditInput){
        $url = self::UrlPath($changeId,'edit');
        return $this->_post($url,[],$changeEditInput);
    }

    public function changeCommitMessageInChangeEdit($changeId,$changeEditMessageInput){
        $url = self::UrlPath($changeId,'edit:message');
        return $this->_put($url,[],$changeEditMessageInput);
    }

    public function deleteFileInChangeEdit($changeId,$pathToFile){
        $url = self::UrlPath($changeId,'edit',$pathToFile);
        return $this->_delete($url);
    }

    public function retrieveFileContentFromChangeEdit($changeId,$pathToFile,$extra = array()){
        $url = self::UrlPath($changeId,'edit',$pathToFile);
        return $this->_get($url,$extra,null,false);
    }

    public function retrieveMetaDataOfAFileFromChangeEdit($changeId,$pathToFile,$extra = array()){
        $url = self::UrlPath($changeId,'edit',$pathToFile,'meta');
        return $this->_get($url,$extra);
    }

    public function retrieveCommitMessageFromChangeEditOrCurrentPatchSetOfTheChange($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'edit:message');
        return $this->_get($url,$extra,null,false);
    }

    public function publishChangeEdit($changeId,$publishChangeEditInput){
        $url = self::UrlPath($changeId,'edit:publish');
        return $this->_post($url,[],$publishChangeEditInput);
    }

    public function rebaseChangeEdit($changeId){
        $url = self::UrlPath($changeId,'edit:rebase');
        return $this->_post($url);
    }

    public function deleteChangeEdit($changeId){
        $url = self::UrlPath($changeId,'edit');
        return $this->_delete($url);
    }

    public function listReviewers($changeId,$extra = array()){
        $url = self::UrlPath($changeId,'reviewers','');
        return $this->_get($url,$extra);
    }

    public function suggestReviewers($changeId,$queryString,$extra = array()){
        $url = self::UrlPath($changeId,'suggest_reviewers');
        $extra['q'] = $queryString;
        return $this->_get($url,$extra);
    }

    public function getReviewer($changeId,$accountId,$extra = array()){
        $url = self::UrlPath($changeId,'reviewers',$accountId);
        return $this->_get($url,$extra);
    }

    public function addReviewer($changeId,$reviewerInput){
        $url = self::UrlPath($changeId,'reviewers');
        return $this->_get($url,[],$reviewerInput);
    }

    public function deleteReviewer($changeId,$accountId,$deleteReviewerInput = null){
        if($deleteReviewerInput === null){
            $url = self::UrlPath($changeId,'reviewers',$accountId);
            return $this->_delete($url);
        }
        else{
            $url = self::UrlPath($changeId,'reviewers',$accountId,'delete');
            return $this->_post($url,[],$deleteReviewerInput);
        }
    }

    public function listVotes($changeId,$accountId,$extra = array()){
        $url = self::UrlPath($changeId,'reviewers',$accountId,'votes','');
        return $this->_get($url,$extra);
    }

    public function deleteVote($changeId,$accountId,$labelId,$deleteVoteInput = null){
        if($deleteVoteInput=== null){
            $url = self::UrlPath($changeId,'reviewers',$accountId,'votes',$labelId);
            return $this->_delete($url);
        }
        else{
            $url = self::UrlPath($changeId,'reviewers',$accountId,'votes',$labelId,'delete');
            return $this->_post($url,[],$deleteVoteInput);
        }
    }

    public function getCommit($changeId,$revisionId = 'current', $extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'commit');
        return $this->_get($url,$extra);
    }

    public function getDescription($changeId,$revisionId = 'current', $extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'description');
        return $this->_get($url,$extra);
    }

    public function setDescription($changeId,$revisionId,$descriptionInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'description');
        return $this->_put($url,[],$descriptionInput);
    }

    public function getMergeList($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'mergelist');
        return $this->_get($url,$extra);
    }

    public function getRevisionActions($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'actions');
        return $this->_get($url,$extra);
    }

    public function getReview($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'review');
        return $this->_get($url,$extra);
    }

    public function getRelatedChanges($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'related');
        return $this->_get($url,$extra);
    }

    public function setReview($changeId,$revisionId,$reviewInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'review');
        return $this->_post($url,[],$reviewInput);
    }

    public function rebaseRevision($changeId,$revisionId = 'current',$rebaseInput = null){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'rebase');
        return $this->_post($url,[],$rebaseInput);
    }

    public function submitRevision($changeId,$revisionId = 'current'){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'submit');
        return $this->_post($url,$extra);
    }

    public function getPatch($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'patch');
        return $this->_get($url,$extra,null,false);
    }

    public function submitPreview($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'preview_submit');
        return $this->_get($url,$extra,null,false);
    }

    public function getMergeable($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'mergeable');
        return $this->_get($url,$extra);
    }

    public function getSubmitType($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'submit_type');
        return $this->_get($url,$extra);
    }

    public function testSubmitType($changeId,$revisionId,$ruleInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'test.submit_type');
        return $this->_post($url,[],$ruleInput);
    }

    public function testSubmitRule($changeId,$revisionId,$ruleInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'test.submit_rule');
        return $this->_post($url,[],$ruleInput);
    }

    public function listRevisionDrafts($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'drafts');
        return $this->_get($url,$extra);
    }

    public function createDraft($changeId,$revisionId,$commentInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'drafts');
        return $this->_put($url,[],$commentInput);
    }

    public function getDraft($changeId,$revisionId,$draftId,$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'drafts',$draftId);
        return $this->_get($url,$extra);
    }

    public function updateDraft($changeId,$revisionId,$draftId,$commentInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'drafts',$draftId);
        return $this->_put($url,[],$commentInput);
    }

    public function deleteDraft($changeId,$revisionId,$draftId){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'drafts',$draftId);
        return $this->_delete($url);
    }

    public function listRevisionComments($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'comments','');
        return $this->_get($url,$extra);
    }

    public function getComment($changeId,$revisionId,$commentId,$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'comments',$commentId);
        return $this->_get($url,$extra);
    }

    public function deleteComment($changeId,$revisionId,$commentId,$deleteCommentInput = null){
        if($deleteCommentInput === null){
            $url = self::UrlPath($changeId,'revisions',$revisionId,'comments',$commentId);
            return $this->_delete($url);
        }
        else{
            $url = self::UrlPath($changeId,'revisions',$revisionId,'comments',$commentId,'delete');
            return $this->_post($url,[],$deleteCommentInput);
        }
    }

    public function listRobotComments($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'robotcomments','');
        return $this->_get($url,$extra);
    }

    public function getRobotComment($changeId,$revisionId,$commentId,$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'robotcomments',$commentId);
        return $this->_get($url,$extra);
    }

    public function applyFix($changeId,$revisionId,$fixId){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'fixed',$fixId,'apply');
        return $this->_post($url);
    }

    public function listFiles($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files','');
        return $this->_get($url,$extra);
    }

    public function getContent($changeId,$revisionId = 'current',$fileId = '/COMMIT_MSG',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files',$fileId,'content');
        return $this->_get($url,$extra,null,false);
    }

    public function downloadContent($changeId,$revisionId = 'current',$fileId = '/COMMIT_MSG',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files',$fileId,'download');
        return $this->_get($url,$extra.null,false);
    }

    public function getDiff($changeId,$revisionId = 'current',$fileId = '/COMMIT_MSG',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files',$fileId,'diff');
        return $this->_get($url,$extra);
    }

    public function getBlame($changeId,$revisionId = 'current',$fileId = '/COMMIT_MSG',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files',$fileId,'blame');
        return $this->_get($url,$extra);
    }

    public function setReviewed($changeId,$revisionId = 'current',$fileId = '/COMMIT_MSG'){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files',$fileId,'reviewed');
        return $this->_put($url);
    }

    public function deleteReviewed($changeId,$revisionId = 'current',$fileId = '/COMMIT_MSG'){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'files',$fileId,'reviewed');
        return $this->_delete($url);
    }

    public function cherryPickRevision($changeId,$revisionId,$cherryPickInput){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'cherrypick');
        return $this->_post($url,[],$cherryPickInput);
    }

    public function listRevisionReviewers($changeId,$revisionId = 'current',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'reviewers','');
        return $this->_get($url,$extra);
    }

    public function listRevisionVotes($changeId,$revisionId = 'current',$accountId = 'self',$extra = array()){
        $url = self::UrlPath($changeId,'revisions',$revisionId,'reviewers',$accountId,'votes','');
        return $this->_get($url,$extra);
    }

    public function deleteRevisionVote($changeId,$revisionId,$accountId,$labelId,$deleteVoteInput = null){
        if($deleteVoteInput === null){
            $url = self::UrlPath($changeId,'revisions',$revisionId,'reviewers',$accountId,'votes',$labelId);
            return $this->_delete($url);
        }
        else{
            $url = self::UrlPath($changeId,'revisions',$revisionId,'reviewers',$accountId,'votes',$labelId,'delete');
            return $this->_post($url,[],$deleteVoteInput);
        }
    }


}