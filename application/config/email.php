<?php

 defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.bsa.co.in', 
    'smtp_port' => 25,
    'smtp_user' => 'auto@bsa.co.in',
    'smtp_pass' => 'solidgame',
    //'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    //'smtp_timeout' => '4', //in seconds
    'smtp_timeout' => '10', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);

