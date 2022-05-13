<?php

class QueryBuilder
{
    /**
     * @param Entity $entity
     * @return string
     */
    public static function createSQL(Entity $entity): string
    {
        $sql = 'INSERT INTO ' . get_class($entity) . ' (' . $entity->getKeysSQL() .') VALUES ('. $entity->getValuesSQL() . ')';

        return $sql;
    }

    /**
     * @param Entity $entity
     * @return string
     */
    public static function updateSQL(Entity $entity): string
    {
        $keys = $entity->getKeysArraySQL();
        $columnsUpdate = '';

        foreach ($keys as $key => $value) {
            $method = 'get' . ucfirst($value);
            if (method_exists($entity, $method) && $method !== 'getId') {
                $columnsUpdate .= $value;
                $columnsUpdate .= ' = ';
                $columnsUpdate .= '"' . $entity->$method() . '", ';
            }
        }
        $sql = 'UPDATE ' . get_class($entity) . ' SET ' . $columnsUpdate . 'WHERE id = ' . $entity->getId();

        echo $sql;

        return $sql;
    }
}