<?php
  require_once('Zend/Gdata/AuthSub.php');
  class Zsurforce_ZGdata_AuthSub{
  
      static function getAuthSubTokenUri($url = null){
          
          if($url !== null){
              $next = $url;
          }else{ 
              $next = 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
          }
          
          $scope = 'http://www.google.com/m8/feeds/';
          $secure = 0;
          $session = 1;
          
      return Zend_Gdata_AuthSub::getAuthSubTokenUri($next,$scope,$secure,$session);
      }
  }
?>
