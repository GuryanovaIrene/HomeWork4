<?php

namespace carsharing;


trait AddOptions
{
    public function optionsCost($options)
    {
        $cost = 0;
        foreach ($options as $key => $option) {
            $cost += $option;
        }
        return $cost;
    }
}