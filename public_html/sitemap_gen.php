<?php
// Set header type to XML
header('Content-Type: application/xml');

$dom = new DOMDocument('1.0', 'UTF-8');

$urlset = $dom->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
$dom->appendChild($urlset);

// Base URL of your website
$baseUrl = 'https://imperfectgamers.org/';

// Current date for lastmod
$lastMod = date('Y-m-d');

// Static paths from your switch cases
$staticPaths = [
    "" => ["changeFreq" => "daily", "priority" => "1.0"],
    "register" => ["changeFreq" => "monthly", "priority" => "0.8"],
    "applications" => ["changeFreq" => "monthly", "priority" => "0.8"],
    "about" => ["changeFreq" => "yearly", "priority" => "0.5"],
    "appeals" => ["changeFreq" => "monthly", "priority" => "0.8"],
    "login" => ["changeFreq" => "monthly", "priority" => "0.7"],
    "terms-of-service" => ["changeFreq" => "yearly", "priority" => "0.4"],
    "privacy-policy" => ["changeFreq" => "yearly", "priority" => "0.4"],
    "imprint" => ["changeFreq" => "yearly", "priority" => "0.3"],
    "discord" => ["changeFreq" => "monthly", "priority" => "0.9"],
    "store" => ["changeFreq" => "monthly", "priority" => "0.9"]
];

// Add static paths to the XML
foreach ($staticPaths as $path => $options) {
    // Add URL elements for static paths
    $url = $dom->createElement('url');
    $loc = $dom->createElement('loc', htmlspecialchars($baseUrl . $path));
    $lastmod = $dom->createElement('lastmod', $lastMod);
    $changefreq = $dom->createElement('changefreq', $options["changeFreq"]);
    $priority = $dom->createElement('priority', $options["priority"]);

    $url->appendChild($loc);
    $url->appendChild($lastmod);
    $url->appendChild($changefreq);
    $url->appendChild($priority);

    $urlset->appendChild($url);
}

$applications = getApplicationUrls();
$appeals = getAppealUrls();
// Dynamic paths for appeals, applications, and profiles
// Replace with actual data retrieval logic
$dynamicPaths = [
    'appeals' =>
        $applications,
    'applications' =>
        $appeals,
];

// Add dynamic paths to the XML
foreach ($dynamicPaths as $section => $paths) {
    foreach ($paths as $path) {
        // Add URL elements for dynamic paths
        $url = $dom->createElement('url');
        $loc = $dom->createElement('loc', htmlspecialchars($baseUrl . $path));
        $lastmod = $dom->createElement('lastmod', $lastMod); // Update this with the actual last modification date
        $changefreq = $dom->createElement('changefreq', 'weekly');
        $priority = $dom->createElement('priority', '0.6');

        $url->appendChild($loc);
        $url->appendChild($lastmod);
        $url->appendChild($changefreq);
        $url->appendChild($priority);

        $urlset->appendChild($url);
    }
}

echo $dom->saveXML();
?>