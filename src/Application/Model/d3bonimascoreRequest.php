<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Boniversum @version 4.0.1.0 SourceGuardian (21.09.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
