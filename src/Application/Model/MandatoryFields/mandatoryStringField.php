<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Boniversum @version 4.0.1.0 SourceGuardian (13.06.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
