<!--<link rel="stylesheet" type="text/css" href="compiled/css/site.css">-->

<style>
    html {
        --theme-primary: <?= config()->get('main.theme_colors.primary_color') ?>;
    }
</style>

<link rel="stylesheet" type="text/css" href="<?= current_theme_path() . '/css/styles.css?version=' . version_hash() ?>">

<link rel="stylesheet" type="text/css" href="<?= global_theme_path() . '/css/styles.css?version=' . version_hash()  ?>">