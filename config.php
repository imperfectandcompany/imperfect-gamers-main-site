<?php
switch ($GLOBALS['url_loc'][1])
{
    case "/":
        $HEADER = "index";
    break;
    case "signin":
        header("location:../public_html/login");
    break;
    case "login":
        $PAGE_TITLE = "Log In";
        $BACKEND = "login";
        $FRONTEND = "login";
    break;
    default:
        $BACKEND = "index";
        $FRONTEND = "index";
        $HEADER = "index";
	break;
}
?>