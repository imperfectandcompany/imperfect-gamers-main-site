<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://cdn.imperfectgamers.org/inc/assets/icon/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo htmlspecialchars($META_DESC) ?? 'Imperfect Gamers is a division of Imperfect and Company, an entertainment organization focused on promoting growth in underground music and gaming.'; ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($META_WORDS) ?? 'imperfect gamers, underground music, surf, counterstrike, gaming entertainment, rap server, csgo, imperfect and company'; ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo isset($PAGE_TITLE) ? $PAGE_TITLE . ' | Imperfect Gamers' : 'Underground Entertainment | Imperfect Gamers'; ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($META_DESC) ?? 'The new age underground scene for music and gaming enthusiasts.'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo isset($META_IMAGE) ? htmlspecialchars($META_IMAGE) : 'https://cdn.imperfectgamers.org/inc/assets/img/altlogo.png'; ?>">
    <meta property="og:url" content="https://imperfectgamers.org">
    <title><?php echo isset($PAGE_TITLE) ? $PAGE_TITLE . ' | Imperfect Gamers' : 'Underground Entertainment | Imperfect Gamers'; ?></title>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $GLOBALS['config']['url'] ?? 'default.css'; ?>/css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://use.fontawesome.com/cdebacd051.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>
