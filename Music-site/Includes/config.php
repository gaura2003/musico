<?php
if ($_SERVER['SERVER_NAME'] == "localhost"){
    define("ROOT", "http://localhost/Web-music-streaming");
}
else{
    
define("ROOT","https://www.mywebsite.com");

}
?>