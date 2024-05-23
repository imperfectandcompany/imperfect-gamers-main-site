<?php
switch ($GLOBALS['url_loc'][1]) {
    case "":
        $BACKEND = "index";
        $FRONTEND = "index";
        $META_DESC = "Imperfect Gamers is a division of Imperfect and Company, an entertainment organization focused on promoting growth in underground music and gaming.";
        $META_WORDS = "imperfect gamers, underground music, surf, counterstrike, gaming entertainment, rap server, csgo, imperfect and company";
        break;
    case "register":
        $PAGE_TITLE = "Register";
        $BACKEND = "register";
        $FRONTEND = "register";
        $HEADER = "subpage";
        $META_DESC = "Join the Imperfect Gamers community to connect with fellow music and gaming enthusiasts across the globe.";
        $META_WORDS = "imperfect gamers registration, join gaming community, music enthusiasts";
        break;
    case "signin":
        header("location:../login");
        break;
    case "signup":
        header("location:../register");
        break;
    case "signout":
        header("location:../logout");
        break;
    case "applications":
        $PAGE_TITLE = "Applications";
        $BACKEND = "applications";
        $FRONTEND = "applications";
        $HEADER = "subpage";
        $META_DESC = "Apply to be a part of the Imperfect Gamers team and contribute to our thriving music and gaming community.";
        $META_WORDS = "imperfect gamers applications, community involvement, team application";
        break;
    case "admin":
        $PAGE_TITLE = "Admin";
        $BACKEND = "admin";
        $FRONTEND = "admin";
        $HEADER = "subpage";
        $META_DESC = "";
        $META_WORDS = "";
        break;
    case "newstore":
        $PAGE_TITLE = "Store";
        $FRONTEND = "newstore";
        $META_DESC = "";
        $META_WORDS = "";
        break;
    case "bans":
        $PAGE_TITLE = "Bans";
        $BACKEND = "bans";
        $FRONTEND = "bans";
        $HEADER = "subpage";
        $META_DESC = "";
        $META_WORDS = "";
        break;
    case "infractions":
        $PAGE_TITLE = "Infractions";
        $BACKEND = "infractions";
        $FRONTEND = "infractions";
        $META_DESC = "";
        $META_WORDS = "";
        break;
    case "about":
        $PAGE_TITLE = "About Us";
        $BACKEND = "about";
        $FRONTEND = "about";
        $HEADER = "subpage";
        $META_DESC = "Learn about Imperfect Gamers, our mission, our community, and how we are making a difference in the gaming and music world.";
        $META_WORDS = "about imperfect gamers, music gaming community, entertainment organization";
        break;
    case "stats":
        $PAGE_TITLE = "Stats";
        $BACKEND = "stats";
        $FRONTEND = "stats";
        $HEADER = "subpage";
        $META_DESC = "View the latest statistics and data from the Imperfect Gamers community.";
        $META_WORDS = "stats, imperfect gamers, community statistics";
        break;
    case "appeals":
        $PAGE_TITLE = "Appeals";
        $BACKEND = "appeals";
        $FRONTEND = "appeals";
        $HEADER = "subpage";
        $META_DESC = "Submit an appeal for account-related issues within the Imperfect Gamers community.";
        $META_WORDS = "imperfect gamers appeals, account help, community support";
        break;
    case "store":
        $PAGE_TITLE = "Stssore";
        $FRONTEND = "store";
        break;
    case "login":
        $PAGE_TITLE = "Log In";
        $BACKEND = "login";
        $FRONTEND = "login";
        $HEADER = "subpage";
        $META_DESC = "Log in to Imperfect Gamers to continue your journey in our vibrant music and gaming community.";
        $META_WORDS = "imperfect gamers login, community login, music gaming platform";
        break;
    case "settings":
        $PAGE_TITLE = "Settings";
        $BACKEND = "settings";
        $FRONTEND = "settings";
        $HEADER = "subpage";
        $META_DESC = "Customize your Imperfect Gamers profile settings and manage your account preferences.";
        $META_WORDS = "imperfect gamers settings, account customization, profile management";
        break;
    case "profile":
        $PAGE_TITLE = "Profile";
        $BACKEND = "profile";
        $FRONTEND = "profile";
        $HEADER = "subpage";
        $META_DESC = "View and customize your Imperfect Gamers profile, showcasing your contributions and interests in the community.";
        $META_WORDS = "imperfect gamers profile, community profile, customize gaming profile";
        break;
    case "attachSteam":
        $BACKEND = "attachSteam";
        $META_DESC = "Link your Steam account to Imperfect Gamers for a seamless gaming and community experience.";
        $META_WORDS = "attach Steam, imperfect gamers, Steam integration";
        break;
    case "getstarted":
        $PAGE_TITLE = "Getting started";
        $BACKEND = "getstarted";
        $FRONTEND = "getstarted";
        $META_DESC = "Begin your journey with Imperfect Gamers by finishing onboarding.";
        $META_WORDS = "getting started, imperfect gamers guide, community introduction";
        break;
    case "logout":
        $BACKEND = "logout";
        break;
    // Policy Pages
    case "terms-of-service":
        $PAGE_TITLE = "Terms of Service";
        $BACKEND = "tos";
        $FRONTEND = "tos";
        $HEADER = "subpage";
        $META_DESC = "Understand the terms and conditions of being a part of the Imperfect Gamers community.";
        $META_WORDS = "terms of service, community guidelines, imperfect gamers rules";
        break;
    case "privacy-policy":
        $PAGE_TITLE = "Privacy Policy";
        $FRONTEND = "privacypolicy";
        $HEADER = "subpage";
        $META_DESC = "Learn how Imperfect Gamers respects and protects your personal information.";
        $META_WORDS = "privacy policy, data protection, imperfect gamers privacy";
        break;
    // Company Information Pages
    case "imprint":
        $PAGE_TITLE = "Imprint";
        $BACKEND = "imprint";
        $FRONTEND = "imprint";
        $HEADER = "subpage";
        $META_DESC = "Official company information and legal disclosure for Imperfect and Company LLC.";
        $META_WORDS = "imprint, company information, legal disclosure";
        break;
    default:
        $PAGE_TITLE = "404 Not Found";
        header("HTTP/1.0 404 Not Found");
        $FRONTEND = "404";
        $HEADER = "subpage";
        $META_DESC = "Page not found. Discover Imperfect Gamers, where music and gaming unite.";
        $META_WORDS = "404, not found, imperfect gamers, music gaming community";
}