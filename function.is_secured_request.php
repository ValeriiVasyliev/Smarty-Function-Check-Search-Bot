<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
 

/**
 * smarty_function_is_secured_request()
 * 
 * @param mixed $params
 * @param mixed $smarty
 * @return
 */
 
/*
# Example

1.

````
{is_secured_request assign="is_secured_request_status"}

{if $is_secured_request_status}

    {* your code *}

{/if}
````
2.

````
{is_secured_request ip = "127.0.0.1" agent = "google" assign="is_secured_request_status"}

{if $is_secured_request_status}

    {* your code *}

{/if}
*/
function smarty_function_is_secured_request($params, &$smarty) {
    
    function is_bot_ip($ip) {

	       $is_search_bot_ip=false;
	
           $hostname = gethostbyaddr($ip); //"crawl-66-249-66-1.googlebot.com"

           if (preg_match('/\.googlebot|google\.com$/i', $hostname)) {
		          $is_search_bot_ip=true;
	       }
	
           if (preg_match('/\.yandexbot|yandex\.com$/i', $hostname)) {
		          $is_search_bot_ip=true;
	       }
	
	       return $is_search_bot_ip;
    }
    
    
    if(is_null($params['ip'])){

        $ip=$_SERVER['REMOTE_ADDR'];
    }

    if(is_null($params['agent'])){

        $agent=$_SERVER['HTTP_USER_AGENT'];
    }

    $is_bot_request=false;

    if (strpos($agent, 'Google')!==false || is_bot_ip($ip) || strpos($agent, 'Yandex')!==false) {

        $is_bot_request=true;
    }
    
    if (!empty($params['assign'])) {
        $smarty->assign($params['assign'],$is_bot_request);
    } else {
        return $is_bot_request;
    }
}