<?php

class Entity
{
    /**
     * @return iterable
     */
    public function getKeysArraySQL() : iterable
    {
        $keys = [];

        foreach ($this as $key => $value) {
            $keys[] = $key;
        }
        return $keys;
    }

    /**
     * @return string
     * Retourne une string de type 'key, key' …
     */
    public function getKeysSQL(): string
    {
        $keys = '';
        $lastValue = end($this);

        foreach ($this as $key => $value) {
            if ($key !== 'id') {
                $keys .= $key;
                if ($value !== $lastValue) {
                    $keys .= ', ';
                }
            }
        }
        return $keys;
    }

    /**
     * @return string
     * Retourne une string de type ' "value", "value" ' …
     */
    public function getValuesSQL(): string
    {
        $values = '';
        $lastValue = end($this);

        foreach ($this as $key => $value) {
            if ($key !== 'id') {
                $values .= '"' . $value . '"';
                if ($value !== $lastValue) {
                    $values .= ', ';
                }
            }
        }
        return $values;
    }
}