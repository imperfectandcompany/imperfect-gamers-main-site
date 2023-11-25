<?php
switch ($GLOBALS['url_loc'][1]) {
    case "":
        $BACKEND = "index";
        $FRONTEND = "index";
        break;
    case "signin":
        header("location:../login");
        break;
    case "applications":
        $PAGE_TITLE = "Applications";
        $BACKEND = "applications";
        $FRONTEND = "applications";
        $HEADER = "subpage";
        break;
    case "appeals":
        $PAGE_TITLE = "Appeals";
        $BACKEND = "appeals";
        $FRONTEND = "appeals";
        $HEADER = "subpage";
        break;
        case "stores":
            $PAGE_TITLE = "store/index";
            $FRONTEND = "store/index";
            break;        
        case "shop":
            $PAGE_TITLE = "Shop";
            $BACKEND = "shop";
            $FRONTEND = "shop";
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
        $HEADER = "subpage";
        break;
    case "profile":
        $PAGE_TITLE = "Profile";
        $BACKEND = "profile";
        $FRONTEND = "profile";
        $HEADER = "subpage";
        break;
    case "attachSteam":
        $BACKEND = "attachSteam";
        break;
    case "getstarted":
        $PAGE_TITLE = "Getting started";
        $BACKEND = "getstarted";
        $FRONTEND = "getstarted";
        break;
    case "install":
        $PAGE_TITLE = "install";
        $FRONTEND = "installer";
        break;
    case "logout":
        $BACKEND = "logout";
    default:
        break;
}
?>
