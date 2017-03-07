<?php

namespace AAVVStrapp\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Se declaran los metodos y funciones que implementan
 * el repositorio de la entidad Travel
 *
 * @author Freddy Contreras
 */
class TravelRepository extends EntityRepository
{
    /**
     * La siguiente functión retorna los datos de un viaje
     * dado el id
     *
     * @param $id
     * @return array
     */
    public function findById($id)
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = '
            select
                t.*,
                u.id as user_id,
                u.full_name,
                lo.id as origin_location_id,
                lo.name as origin_location_name,
                ld.id as destiny_location_id,
                ld.name as destiny_location_name
            from
              travel t
              left join user_profile u on u.id = t.user_profile_id
              left join location lo on t.origin_location_id = lo.id
              left join location ld on t.destiny_location_id = ld.id
              where t.id = :id

        ';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    /**
     * Obtiene todos los viajes del sistema
     *
     * @return array
     */
    public function findAll()
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = ' select * from travel t';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
