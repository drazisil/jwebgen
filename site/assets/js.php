<?php
if ((filter_input(INPUT_GET, 'page')) !== NULL) {
    header("Content-type: text/javascript");
    require_once 'js_ajax.js';
    switch (filter_input(INPUT_GET, 'page')) {
        case 'starter':
            require_once 'color_picker.js';
            require_once 'js_starter.js';
            break;
        case 'starterOO':
            require_once 'color_picker.js';
            require_once 'js_starterOO.js';
            break;
        case 'generate':
            require_once 'color_picker.js';
            require_once 'js_generate.js';
            break;
        case 'breed':
            require_once 'js_breed.js';
            break;
        case 'breedOO':
            require_once 'js_breedOO.js';
            break;
        case 'lookup':
            require_once 'js_lookup.js';
            break;
    }
    require_once 'google_analytics.js';
    require_once 'support_banner.js';
}
