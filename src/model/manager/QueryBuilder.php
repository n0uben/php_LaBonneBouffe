<?php

class QueryBuilder
{
    /**
     * @param Entity $entity
     * @return string
     * Genere une query de type 'INSERT INTO table (column1, column2) VALUES ("value1", "value2")'
     * en prenant un object de type Entité en entrée
     */
    public static function createSQL(Entity $entity): string
    {
        $sql = 'INSERT INTO ' . get_class($entity) . ' (' . $entity->getKeysSQL() .') VALUES ('. $entity->getValuesSQL() . ')';

        return $sql;
    }

    /**
     * @param Entity $entity
     * @return string
     * Genere une query de type 'UPDATE table SET column1 = "value1", column2 = "value2" WHERE id = xxx'
     * en prenant un objet de type Entité en entrée
     */
    public static function updateSQL(Entity $entity): string
    {
        $keys = $entity->getKeysArraySQL();
        $length = sizeof($keys);
        $compteur = 0;
        $columnsUpdate = '';

        foreach ($keys as $key => $value) {
            $method = 'get' . ucfirst($value);
            if (method_exists($entity, $method) && $method !== 'getId') {
                $columnsUpdate .= $value;
                $columnsUpdate .= ' = ';
                if ($compteur < ($length - 1)) {
                    $columnsUpdate .= '"' . $entity->$method() . '", ';
                } else {
                    $columnsUpdate .= '"' . $entity->$method() . '" ';
                }
            }
            $compteur++;
        }
        $sql = 'UPDATE ' . get_class($entity) . ' SET ' . $columnsUpdate . 'WHERE id = ' . $entity->getId();

        return $sql;
    }
}