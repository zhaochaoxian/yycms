<?php
namespace Yycms/Aliyun;
use Aliyun\OTS\OTSServerException;

class Ots{
    
	public static function __callStatic($method,$parameters){  
		Vendor('vendor.autoload');
		$otsClient = new \Aliyun\OTS\OTSClient(array(
	        'EndPoint' => C('ALIYUN.OTS_APIURL'),
	        'AccessKeyID' => C('ALIYUN.ACCESS_KEY'),
	        'AccessKeySecret' => C('ALIYUN.ACCESS_SECRET'),
	        'InstanceName' => C('ALIYUN.OTS_NAME'),
	        'DebugLogHandler'=>false,
	        'ErrorLogHandler'=>false
	    ));
	    
		try {
		    return $otsClient->$method(...$parameters);
		} catch (OTSServerException $e) {
			return ['code'=>$e->getOTSErrorCode(),'msg'=>$e->getOTSErrorMessage()];
		}
  	}
}