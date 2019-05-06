class PHPdebug {
    function debug($name, $var = null, $type = LOG) {
    echo '<script type="text/javascript">'.NL;
    switch($type) {
        case LOG:
            echo 'console.log("'.$name.'");'.NL;    
        break;
        case INFO:
            echo 'console.info("'.$name.'");'.NL;    
        break;
        case WARN:
            echo 'console.warn("'.$name.'");'.NL;    
        break;
        case ERROR:
            echo 'console.error("'.$name.'");'.NL;    
        break;
    }
}