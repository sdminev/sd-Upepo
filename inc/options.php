<?php

namespace Flynt\Options;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData', 'Flynt\\Options\\addOptionsToComponent', 9, 2);

function addOptionsToComponent($data, $componentName)
{
    // Get fields for this component.
    $options = array_reduce(array_keys(Options::OPTION_TYPES), function ($carry, $optionType) use ($componentName) {
        return array_merge($carry, Options::get($optionType, $componentName));
    }, []);
    // Don’t overwrite existing data.
    return array_merge($options, $data);
}
