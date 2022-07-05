
function htmli($data)
{
         
    switch($_COOKIE["security_level"])
    {
        
        case "0" : 
            
            $data = no_check($data);            
            break;
        
        case "1" :
            
            $data = xss_check_1($data);
            break;
        
        case "2" :            
                       
            $data = xss_check_3($data);       
                           //xss_check_3로 입력 데이터 우회하고 있다.     
            break;
        
        default : 
            
            $data = no_check($data);            
            break;   

    }       

    return $data;

}


function xss_check_3($data, $encoding = "UTF-8")
{

    // htmlspecialchars - converts special characters to HTML entities    
    // '&' (ampersand) becomes '&amp;' 
    // '"' (double quote) becomes '&quot;' when ENT_NOQUOTES is not set
    // "'" (single quote) becomes '&#039;' (or &apos;) only when ENT_QUOTES is set
    // '<' (less than) becomes '&lt;'
    // '>' (greater than) becomes '&gt;'  
    
    return htmlspecialchars($data, ENT_QUOTES, $encoding);
       
}
