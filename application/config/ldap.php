<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| LDAP Configuration
|--------------------------------------------------------------------------
*/

$config['ldap_enabled'] = TRUE;
$config['ldap_server'] = '10.20.2.165';
$config['ldap_port'] = 389;
$config['ldap_domain'] = 'USPHARMALTD.com';
$config['ldap_base_dn'] = 'DC=uspharmaltd,DC=com';
$config['ldap_user_filter'] = '(&(objectClass=user)(sAMAccountName=%s))';
$config['ldap_auto_create_user'] = TRUE; // Auto-create user on first login
$config['ldap_default_user_type'] = USER_MEMBER; // Default role for new AD users
