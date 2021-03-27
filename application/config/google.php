<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '195049498496-7hop732q78a6vj8ud6itb9uvgrngedg4.apps.googleusercontent.com';
$config['google']['client_secret']    = 'FidowLnrLF8Ec2oEWUPiT3Av';
$config['google']['redirect_uri']     =  site_url().'user/google_login_return';
$config['google']['application_name'] = 'SmartTripMaker';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();