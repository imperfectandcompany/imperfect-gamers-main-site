<?php

try {
    require_once(realpath(__DIR__ . '/bootstrap.php'));

    require_once(realpath(__DIR__ . '/vendor/autoload.php'));

    require_once(realpath(__DIR__ . '/support.php'));

} catch (exception $exception) {
    echo $exception;
}
