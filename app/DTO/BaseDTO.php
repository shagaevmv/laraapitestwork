<?php

namespace App\DTO;


class BaseDTO
{
    /**
     * @param array[][] $array
     */
    public function __construct(array $array)
    {
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }
}
