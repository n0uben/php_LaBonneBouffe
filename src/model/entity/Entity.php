<?php

class Entity
{
    /**
     * @return string
     */
    public function getKeysSQL(): string
    {
        $keys = '(';

        $lastValue = end($this);

        foreach ($this as $key => $value) {

            $keys .= $key;
            if ($value !== $lastValue) {
                $keys .= ', ';
            }
        }
        $keys .= ')';

        return $keys;
    }

    /**
     * @return string
     */
    public function getValuesSQL(): string
    {
        $values = '(';

        $lastValue = end($this);

        foreach ($this as $key => $value) {

            $values .= '"' . $value . '"';
            if ($value !== $lastValue) {
                $values .= ', ';
            }
        }
        $values .= ')';

        return $values;
    }
}