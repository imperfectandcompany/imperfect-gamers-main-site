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
        case "about":
            $PAGE_TITLE = "About Us";
            $BACKEND = "about";
            $FRONTEND = "about";
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
    case "logout":
        $BACKEND = "logout";
    // Policy Pages
    case "terms-of-service":
        $PAGE_TITLE = "Terms of Service";
        $BACKEND = "tos";
        $FRONTEND = "tos";
        $HEADER = "subpage";
        break;
    case "privacy-policy":
        $PAGE_TITLE = "Privacy Policy";
        $BACKEND = "privacypolicy";
        $FRONTEND = "privacy-policy";
        $HEADER = "subpage";
        break;
    case "cookie-policy":
        $PAGE_TITLE = "Cookie Policy";
        $BACKEND = "cookiepolicy";
        $FRONTEND = "cookiepolicy";
        $HEADER = "subpage";
        break;
    // Company Information Pages
    case "imprint":
        $PAGE_TITLE = "Imprint";
        $BACKEND = "imprint";
        $FRONTEND = "imprint";
        $HEADER = "subpage";
        break;


    default:
        // It's a good practice to have a case for unmatched URLs which could redirect to a 404 page or the home page
        header("HTTP/1.0 404 Not Found");
        $BACKEND = "index";
        $FRONTEND = "index";
}
?>
