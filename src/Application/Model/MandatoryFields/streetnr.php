<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Boniversum @version 4.0.1.0 SourceGuardian (13.06.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
