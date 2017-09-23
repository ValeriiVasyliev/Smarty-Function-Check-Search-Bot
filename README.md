# Smarty {is_secured_request} function plugin

Checking whether the agent is a search bot

#Install

Copy to directory smarty/libs/plugins

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
````
