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
     * @var array
     */
    private array $manipulations = [];

    /**
     * @param array $manipulations
     */
    public function __construct(array $manipulations)
    {
        $this->setManipulations($manipulations);
    }

    /**
     * @return Manipulations
     */
    public function make(): Manipulations
    {
        return new Manipulations([$this->manipulations]);
    }

    /**
     * @param array $manipulations
     */
    private function setManipulations(array $manipulations): void
    {
        $this->manipulations = [];

        foreach ($manipulations as $manipulation => $value) {
            if (!$this->isToggleManipulation($manipulation)) {
                $this->manipulations[$manipulation] = $value;
            }

            if ($value) {
                $this->manipulations['filter'] = $manipulation;
            }
        }
    }

    /**
     * @param string $manipulation
     * @return bool
     */
    private function isToggleManipulation(string $manipulation): bool
    {
        return in_array($manipulation, self::TOGGLE_MANIPULATIONS);
    }
}
