<?php

class Region
{
    private int $id;
    private string $nom;

    /**
     * @param string|null $nom
     */
    public function __construct(string $nom = null)
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

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