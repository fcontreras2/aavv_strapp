<?php
namespace AAVVStrapp\ApiBundle\Services;

/**
 * La clase siguiente hace uso del conntenedor de servicio para
 * hacer llamado al servicio de validator de symfony2.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @author Currently Working: Joel D. Requena P.
 */
class CoreValidator
{
    /**
     * Metodo que hace uso del validator del framework.
     *
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     * @param object $obj
     */
    public function validate($obj, $group = null)
    {
        global $kernel;
        $errors = $kernel->getContainer()->get('validator')->validate($obj, null, $group);

        if (count($errors) > 0) {

            $response = [];
            $responseError = [];

            foreach ($errors as $currentError) {
                $message =
                $value =
                $parameter =

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