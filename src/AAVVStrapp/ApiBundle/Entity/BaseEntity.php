<?php
namespace AAVVStrapp\ApiBundle\Entity;

/**
 * BaseEntity
 *
 * La clase tiene el conjunto de métodos y funciones
 * comunes entre las entidades
 *
 * @author Freddy Contreras
 */
class BaseEntity
{
    /**
     * La función actualiza los atributos de una clase
     * dado un arreglo un arreglo
     *
     * @param $data
     * @return bool
     */
    public function setAttributes($data)
    {
        if (is_array($data)) {
            foreach($data as $att => $val) {
                $this->$att = $val;
            }
            return true;
        }
        return false;
    }

    /**
     * La función retorna un arreglo con todos los valores
     * de la clase a consultar
     *
     * @return array arreglo con todos los valores del array
     */
    public function getData()
    {
        $response = [];
        foreach($this as $att => $val)
        {
            $response[$att] = $val;
        }
        return $response;
    }

    /**
     * Actualizar la fecha de edición
     */
    public function updateLastUpdate()
    {
        $this->last_update = new \DateTime();
    }

    /**
     * Asignación de la fecha de creación
     */
    public function updateCreated()
    {
        $this->created = new \DateTime();
    }
}