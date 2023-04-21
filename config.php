<?php
switch ($GLOBALS['url_loc'][1])
{
    case "/":
        $BACKEND = "index";
        $FRONTEND = "index";
        $HEADER = "index";
    break;
    case "":
        $BACKEND = "index";
        $FRONTEND = "index";
        $HEADER = "index";
    break;    
    case "signin":
        header("location:../login");
    break;
    case "login":
        $PAGE_TITLE = "Log In";
        $BACKEND = "login";
        $FRONTEND = "login";
    break;
    case "logout":
        $BACKEND = "logout";
    default:

	break;
}
?>