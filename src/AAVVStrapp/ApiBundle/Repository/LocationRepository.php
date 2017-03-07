<?php

namespace AAVVStrapp\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Se declaran los metodos y funciones que implementan
 * el repositorio de la entidad Location
 *
 * @author Freddy Contreras
 */
class LocationRepository extends EntityRepository
{
    /**
     * La siguiente functión retorna los datos de una localidad
     * dado el id
     *
     * @param $id
     */
    public function findById($id)
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = ' select * from location l where l.id = :id ';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    /**
     * Obtener la localidades del sistema
     *
     * @return array
     */
    public function findAll()
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = ' select * from location';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
