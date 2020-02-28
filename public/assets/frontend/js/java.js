var PublicSiteServices=function() {
PublicSiteServices.initializeBase(this);
this._timeout = 0;
this._userContext = null;
this._succeeded = null;
this._failed = null;
}
PublicSiteServices.prototype={
_get_path:function() {
 var p = this.get_path();
 if (p) return p;
 else return PublicSiteServices._staticInstance.get_path();},
LocatorMap_getData:function(pagePartId,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'LocatorMap_getData',false,{pagePartId:pagePartId},succeededCallback,failedCallback,userContext); },
NewSignup_CheckSubdomainAvailability:function(subdomain,accountId,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'NewSignup_CheckSubdomainAvailability',false,{subdomain:subdomain,accountId:accountId},succeededCallback,failedCallback,userContext); },
Timeline_getEventData:function(eventId,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'Timeline_getEventData',false,{eventId:eventId},succeededCallback,failedCallback,userContext); },
FileCabinet_getData:function(pagePartId,token,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'FileCabinet_getData',false,{pagePartId:pagePartId,token:token},succeededCallback,failedCallback,userContext); },
FileCabinet_getFolderItems:function(folderId,pageSize,pageIndex,sortType,sortDir,token,pagePartId,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'FileCabinet_getFolderItems',false,{folderId:folderId,pageSize:pageSize,pageIndex:pageIndex,sortType:sortType,sortDir:sortDir,token:token,pagePartId:pagePartId},succeededCallback,failedCallback,userContext); },
FileCabinet_getSearchResults:function(pagePartId,rootFolderId,searchParam,pageSize,pageIndex,sortType,sortDir,token,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'FileCabinet_getSearchResults',false,{pagePartId:pagePartId,rootFolderId:rootFolderId,searchParam:searchParam,pageSize:pageSize,pageIndex:pageIndex,sortType:sortType,sortDir:sortDir,token:token},succeededCallback,failedCallback,userContext); },
NPCChallenge_getQuestionAnswerResults:function(pagePartId,token,questionNum,answerNums,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'NPCChallenge_getQuestionAnswerResults',false,{pagePartId:pagePartId,token:token,questionNum:questionNum,answerNums:answerNums},succeededCallback,failedCallback,userContext); },
NPCChallenge_saveResults:function(pagePartId,token,formData,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'NPCChallenge_saveResults',false,{pagePartId:pagePartId,token:token,formData:formData},succeededCallback,failedCallback,userContext); },
EmailAPerson_send:function(pagePartId,token,details,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'EmailAPerson_send',false,{pagePartId:pagePartId,token:token,details:details},succeededCallback,failedCallback,userContext); },
ShareItemEmail_send:function(refType,refNumber,token,senderName,senderEmail,senderMsg,sendToEmail,shareURL,greCaptcha,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'ShareItemEmail_send',false,{refType:refType,refNumber:refNumber,token:token,senderName:senderName,senderEmail:senderEmail,senderMsg:senderMsg,sendToEmail:sendToEmail,shareURL:shareURL,greCaptcha:greCaptcha},succeededCallback,failedCallback,userContext); },
TheCityAdminAPIGetGroups:function(page,search,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'TheCityAdminAPIGetGroups',false,{page:page,search:search},succeededCallback,failedCallback,userContext); },
TheCityAdminAPIGetGroup:function(id,succeededCallback, failedCallback, userContext) {
return this._invoke(this._get_path(), 'TheCityAdminAPIGetGroup',false,{id:id},succeededCallback,failedCallback,userContext); }}
PublicSiteServices.registerClass('PublicSiteServices',Sys.Net.WebServiceProxy);
PublicSiteServices._staticInstance = new PublicSiteServices();
PublicSiteServices.set_path = function(value) { PublicSiteServices._staticInstance.set_path(value); }
PublicSiteServices.get_path = function() { return PublicSiteServices._staticInstance.get_path(); }
PublicSiteServices.set_timeout = function(value) { PublicSiteServices._staticInstance.set_timeout(value); }
PublicSiteServices.get_timeout = function() { return PublicSiteServices._staticInstance.get_timeout(); }
PublicSiteServices.set_defaultUserContext = function(value) { PublicSiteServices._staticInstance.set_defaultUserContext(value); }
PublicSiteServices.get_defaultUserContext = function() { return PublicSiteServices._staticInstance.get_defaultUserContext(); }
PublicSiteServices.set_defaultSucceededCallback = function(value) { PublicSiteServices._staticInstance.set_defaultSucceededCallback(value); }
PublicSiteServices.get_defaultSucceededCallback = function() { return PublicSiteServices._staticInstance.get_defaultSucceededCallback(); }
PublicSiteServices.set_defaultFailedCallback = function(value) { PublicSiteServices._staticInstance.set_defaultFailedCallback(value); }
PublicSiteServices.get_defaultFailedCallback = function() { return PublicSiteServices._staticInstance.get_defaultFailedCallback(); }
PublicSiteServices.set_enableJsonp = function(value) { PublicSiteServices._staticInstance.set_enableJsonp(value); }
PublicSiteServices.get_enableJsonp = function() { return PublicSiteServices._staticInstance.get_enableJsonp(); }
PublicSiteServices.set_jsonpCallbackParameter = function(value) { PublicSiteServices._staticInstance.set_jsonpCallbackParameter(value); }
PublicSiteServices.get_jsonpCallbackParameter = function() { return PublicSiteServices._staticInstance.get_jsonpCallbackParameter(); }
PublicSiteServices.set_path("/App_WebServices/PublicSiteServices.asmx");
PublicSiteServices.LocatorMap_getData= function(pagePartId,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.LocatorMap_getData(pagePartId,onSuccess,onFailed,userContext); }
PublicSiteServices.NewSignup_CheckSubdomainAvailability= function(subdomain,accountId,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.NewSignup_CheckSubdomainAvailability(subdomain,accountId,onSuccess,onFailed,userContext); }
PublicSiteServices.Timeline_getEventData= function(eventId,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.Timeline_getEventData(eventId,onSuccess,onFailed,userContext); }
PublicSiteServices.FileCabinet_getData= function(pagePartId,token,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.FileCabinet_getData(pagePartId,token,onSuccess,onFailed,userContext); }
PublicSiteServices.FileCabinet_getFolderItems= function(folderId,pageSize,pageIndex,sortType,sortDir,token,pagePartId,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.FileCabinet_getFolderItems(folderId,pageSize,pageIndex,sortType,sortDir,token,pagePartId,onSuccess,onFailed,userContext); }
PublicSiteServices.FileCabinet_getSearchResults= function(pagePartId,rootFolderId,searchParam,pageSize,pageIndex,sortType,sortDir,token,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.FileCabinet_getSearchResults(pagePartId,rootFolderId,searchParam,pageSize,pageIndex,sortType,sortDir,token,onSuccess,onFailed,userContext); }
PublicSiteServices.NPCChallenge_getQuestionAnswerResults= function(pagePartId,token,questionNum,answerNums,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.NPCChallenge_getQuestionAnswerResults(pagePartId,token,questionNum,answerNums,onSuccess,onFailed,userContext); }
PublicSiteServices.NPCChallenge_saveResults= function(pagePartId,token,formData,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.NPCChallenge_saveResults(pagePartId,token,formData,onSuccess,onFailed,userContext); }
PublicSiteServices.EmailAPerson_send= function(pagePartId,token,details,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.EmailAPerson_send(pagePartId,token,details,onSuccess,onFailed,userContext); }
PublicSiteServices.ShareItemEmail_send= function(refType,refNumber,token,senderName,senderEmail,senderMsg,sendToEmail,shareURL,greCaptcha,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.ShareItemEmail_send(refType,refNumber,token,senderName,senderEmail,senderMsg,sendToEmail,shareURL,greCaptcha,onSuccess,onFailed,userContext); }
PublicSiteServices.TheCityAdminAPIGetGroups= function(page,search,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.TheCityAdminAPIGetGroups(page,search,onSuccess,onFailed,userContext); }
PublicSiteServices.TheCityAdminAPIGetGroup= function(id,onSuccess,onFailed,userContext) {PublicSiteServices._staticInstance.TheCityAdminAPIGetGroup(id,onSuccess,onFailed,userContext); }
var gtc = Sys.Net.WebServiceProxy._generateTypedConstructor;
if (typeof(EmailAPersonDetails) === 'undefined') {
var EmailAPersonDetails=gtc("EmailAPersonDetails");
EmailAPersonDetails.registerClass('EmailAPersonDetails');
}
if (typeof(AjaxItem) === 'undefined') {
var AjaxItem=gtc("AjaxItem");
AjaxItem.registerClass('AjaxItem');
}
