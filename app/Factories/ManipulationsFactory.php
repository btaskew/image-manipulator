<?php

namespace App\Factories;

use Spatie\Image\Manipulations;

class ManipulationsFactory
{
    /**
     * @var array|string[]
     */
    const TOGGLE_MANIPULATIONS = [
        'greyscale',
        'sepia',
    ];

    /**
     * @param array $manipulations
     * @return Manipulations
     */
    public static function make(array $manipulations): Manipulations
    {
        $manipulationsToApply = [];

        foreach ($manipulations as $manipulation => $value) {
            if (!static::isToggleManipulation($manipulation)) {
                $manipulationsToApply[$manipulation] = $value;
            }

            if ($value) {
                $manipulationsToApply['filter'] = $manipulation;
            }
        }

        return new Manipulations([$manipulationsToApply]);
    }

    /**
     * @param string $manipulation
     * @return bool
     */
    private static function isToggleManipulation(string $manipulation): bool
    {
        return in_array($manipulation, static::TOGGLE_MANIPULATIONS);
    }
}
