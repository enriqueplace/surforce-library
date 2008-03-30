<?php
  
  include_once('Zend/Gdata.php');
  
  class ZsurForce_ZGdata_Gmail extends Zend_Gdata{
      
      public function __construct($client = null, $applicationId = 'ZsurForce-ZGdata-1.0')
      {
        //$this->registerPackage('Zend_ZGdata_Gmail');
        //$this->registerPackage('Zend_ZGdata_Gmail_Extension');
        parent::__construct($client, $applicationId);
      }
      
      public function getContacts($user = null)
      {
        if ($user !== null) {
            $uri = 'http://www.google.com/m8/feeds/contacts/' . $user . '/base?max-results=300';
        } else {
            require_once 'ZsurForce/ZGdata/Gmail/EmptyArgumentException.php';
            throw new ZsurForce_ZGdata_Gmail_EmptyArgumentException(
                    'Falta el p&aacute;rametro "$user"');
        }
        
        $feed = parent::getFeed($uri, 'Zend_Gdata_Feed');
      
        foreach($feed as $entry) {
                $ExtensionElements = $entry->getExtensionElements();
                $ExtensionElements = $ExtensionElements[0];
                $ExtensionAttributes = $ExtensionElements->getExtensionAttributes();
                $emails[] .= $ExtensionAttributes['address']['value'];
        } 
        return  $emails;
      }
  
  } 