<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."third_party/log4php/Logger.php"; 
class Log4php{

    private $_logger;
    private $_logtype;
    private $_config;
    var $_logfile;
    var $_ci;
    var $_loggerName;
    
    public function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->config->load("log4php");
    }

    function init() {
        $this->_logger = Logger::getLogger($this->_loggerName);
        $this->_logger->configure($this->_config);
    }
    function log($LogType = 'info', $Event = '', $Apiname = '', $Uuid = '', $Data = '',$LoggerName = 0 ) {

        $this->_loggerName = $this->_ci->config->item('loggerName');
        $this->_loggerName = $this->_loggerName[$LoggerName] ?? 'SetApiLogger';
        
        $this->_config = $this->_ci->config->item($this->_loggerName.'Config');
        $this->init();
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
        $d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));
        $Date = $d->format("Y-m-d H:i:s.u");
        if(is_array($Data)) { $Data = json_encode($Data); } 
        if(is_object($Data)) { $Data = json_encode((array) $Data); }
        
        $log =  '['.$Date.']:['.$Event.']:['.$Apiname.']:['.$Uuid.']:['.$Data.']';
        $this->_logger->{$LogType}($log);
    }
}