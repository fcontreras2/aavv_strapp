<?php
namespace AAVVStrapp\ApiBundle\Services;

/**
 * La clase siguiente hace uso del conntenedor de servicio para
 * hacer llamado al servicio de validator de symfony2.
 *
 * @author Freddy Contreras
 */
class CoreValidator
{
    /**
     * Metodo que hace uso del validator del framework.
     *
     * @author Freddy Contreras
     * @param object $obj
     */
    public function validate($obj, $group = null)
    {
        global $kernel;
        $errors = $kernel->getContainer()->get('validator')->validate($obj, null, $group);

        if (count($errors) > 0) {

            $response = [];

            foreach ($errors as $currentError) {

                $response[] = [
                    'message' => $currentError->getMessage(),
                    'value' => $currentError->getInvalidValue(),
                    'parameter' => $currentError->getPropertyPath()
                ] ;
            }

            return $response;
        }

        return null;
    }
}