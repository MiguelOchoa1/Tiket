<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ldap_auth {
    
    private $CI;
    private $ldap_connection;
    private $config;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->config->load('ldap', TRUE);
        $this->config = $this->CI->config->item('ldap');
    }
    
    /**
     * Authenticate user against Active Directory
     * @param string $username
     * @param string $password
     * @return array|false User info array on success, false on failure
     */
    public function authenticate($username, $password) {
        if (!$this->config['ldap_enabled']) {
            return false;
        }
        
        // Don't try LDAP for demo accounts
        if (strpos($username, '.demo') !== false) {
            return false;
        }
        
        // Connect to LDAP server
        $this->ldap_connection = ldap_connect($this->config['ldap_server'], $this->config['ldap_port']);
        
        if (!$this->ldap_connection) {
            log_message('error', 'LDAP: Could not connect to server ' . $this->config['ldap_server']);
            return false;
        }
        
        // Set LDAP options
        ldap_set_option($this->ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->ldap_connection, LDAP_OPT_REFERRALS, 0);
        
        // Try to bind with user credentials
        $bind_username = $username . '@' . $this->config['ldap_domain'];
        
        try {
            $bind = @ldap_bind($this->ldap_connection, $bind_username, $password);
            
            if (!$bind) {
                log_message('debug', 'LDAP: Authentication failed for user ' . $username);
                ldap_close($this->ldap_connection);
                return false;
            }
            
            // Authentication successful, get user info
            $user_info = $this->get_user_info($username);
            ldap_close($this->ldap_connection);
            
            return $user_info;
            
        } catch (Exception $e) {
            log_message('error', 'LDAP: Exception during authentication - ' . $e->getMessage());
            if ($this->ldap_connection) {
                ldap_close($this->ldap_connection);
            }
            return false;
        }
    }
    
    /**
     * Get user information from Active Directory
     * @param string $username
     * @return array User information
     */
    private function get_user_info($username) {
        $filter = sprintf($this->config['ldap_user_filter'], $username);
        $search = ldap_search($this->ldap_connection, $this->config['ldap_base_dn'], $filter);
        
        if (!$search) {
            return [
                'username' => $username,
                'email' => $username . '@' . strtolower($this->config['ldap_domain']),
                'first_name' => $username,
                'last_name' => '',
                'display_name' => $username
            ];
        }
        
        $entries = ldap_get_entries($this->ldap_connection, $search);
        
        if ($entries['count'] > 0) {
            $entry = $entries[0];
            
            return [
                'username' => $username,
                'email' => isset($entry['mail'][0]) ? $entry['mail'][0] : $username . '@' . strtolower($this->config['ldap_domain']),
                'first_name' => isset($entry['givenname'][0]) ? $entry['givenname'][0] : $username,
                'last_name' => isset($entry['sn'][0]) ? $entry['sn'][0] : '',
                'display_name' => isset($entry['displayname'][0]) ? $entry['displayname'][0] : $username,
                'department' => isset($entry['department'][0]) ? $entry['department'][0] : '',
                'title' => isset($entry['title'][0]) ? $entry['title'][0] : ''
            ];
        }
        
        return [
            'username' => $username,
            'email' => $username . '@' . strtolower($this->config['ldap_domain']),
            'first_name' => $username,
            'last_name' => '',
            'display_name' => $username
        ];
    }
}
