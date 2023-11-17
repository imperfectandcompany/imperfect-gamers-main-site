<?php
switch ($GLOBALS['url_loc'][1])
{
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
    case "settings":
        $PAGE_TITLE = "Settings";
        $BACKEND = "settings";
        $FRONTEND = "settings";
        break;
        case "profile":
            $PAGE_TITLE = "Profile";
            $BACKEND = "profile";
            $FRONTEND = "profile";
            break;        
        case "attachSteam":
            $BACKEND = "attachSteam";
            break;                    
    case "getstarted":
        $PAGE_TITLE = "Getting started";
        $BACKEND = "getstarted";
        $FRONTEND = "getstarted";        
    break;
    case "logout":
        $BACKEND = "logout";
    default:
	break;
}
?>