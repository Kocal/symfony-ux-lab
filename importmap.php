<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    'leaflet' => [
        'version' => '1.9.4',
    ],
    'leaflet/dist/leaflet.min.css' => [
        'version' => '1.9.4',
        'type' => 'css',
    ],
    '@symfony/ux-leaflet-map/map-controller' => [
        'path' => '@symfony/ux-leaflet-map/map_controller.js',
    ],
    '@symfony/ux-map/abstract-map-controller' => [
        'path' => '@symfony/ux-map/abstract_map_controller.js',
    ],
    '@googlemaps/js-api-loader' => [
        'version' => '1.16.8',
    ],
    '@symfony/ux-google-map' => [
        'path' => '@symfony/ux-google-map/map_controller.js',
    ],
    '@symfony/ux-leaflet-map' => [
        'path' => '@symfony/ux-leaflet-map/map_controller.js',
    ],
    'intl-messageformat' => [
        'version' => '10.5.14',
    ],
    'tslib' => [
        'version' => '2.6.2',
    ],
    '@formatjs/icu-messageformat-parser' => [
        'version' => '2.7.8',
    ],
    '@formatjs/fast-memoize' => [
        'version' => '2.2.0',
    ],
    '@formatjs/icu-skeleton-parser' => [
        'version' => '1.8.2',
    ],
    '@symfony/ux-translator' => [
        'path' => '@symfony/ux-translator/translator_controller.js',
    ],
    '@app/translations' => [
        'path' => './var/translations/index.js',
    ],
    '@app/translations/configuration' => [
        'path' => './var/translations/configuration.js',
    ],
    '@symfony/ux-live-component' => [
        'path' => '@symfony/ux-live-component/live_controller.js',
    ],
    'svelte/internal' => [
        'version' => '3.59.2',
    ],
    '@symfony/ux-svelte' => [
        'path' => '@symfony/ux-svelte/loader.js',
    ],
    'svelte' => [
        'version' => '5.1.9',
    ],
    'svelte/internal/client' => [
        'version' => '5.1.9',
    ],
    'svelte/internal/disclose-version' => [
        'version' => '5.1.8',
    ],
    'esm-env' => [
        'version' => '1.1.4',
    ],
    'leaflet-editable' => [
        'version' => '1.3.0',
    ],
    'chart.js' => [
        'version' => '3.9.1',
    ],
    'react' => [
        'version' => '18.3.1',
    ],
    'react-dom' => [
        'version' => '18.3.1',
    ],
    'scheduler' => [
        'version' => '0.23.2',
    ],
    '@symfony/ux-react' => [
        'path' => './vendor/symfony/ux-react/assets/dist/loader.js',
    ],
    'tom-select' => [
        'version' => '2.4.3',
    ],
    '@orchidjs/sifter' => [
        'version' => '1.1.0',
    ],
    '@orchidjs/unicode-variants' => [
        'version' => '1.1.2',
    ],
    'tom-select/dist/css/tom-select.default.min.css' => [
        'version' => '2.4.3',
        'type' => 'css',
    ],
    'tom-select/dist/css/tom-select.default.css' => [
        'version' => '2.4.3',
        'type' => 'css',
    ],
];
