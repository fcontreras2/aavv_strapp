<?php

namespace AAVVStrapp\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Se declaran los metodos y funciones que implementan
 * el repositorio de la entidad UserProfile
 *
 * @author Freddy Contreras
 */
class UserProfileRepository extends EntityRepository
{
    /**
     * La siguiente functión retorna los datos de un usuario
     * dado el id
     *
     * @param $id
     */
    public function findById($id)
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = '
            select
                *
            from
              user_profile u
              where u.id = :id

        ';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }
}
