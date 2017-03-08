<?php

namespace AAVVStrapp\ApiBundle\Controller;

// Clases Symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
// Entidades
use AAVVStrapp\ApiBundle\Entity\Location;

/**
 * La clase proceso todos los datos de las
 * localidades
 *
 * Class LocationController
 *
 * @author Freddy Contreras
 * @package AAVVStrapp\ApiBundle\Controller
 */
class LocationController extends Controller
{
    /**
     * La siguiente función se encarga de registrar un viaje
     * relacionado a un usuario
     *
     * @author Freddy Contreras
     * @param  Request $request
     * @return json  http status
     *
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Obtiene el listado de todos los viajes del sistema",
     *     description="Retorna los viajes del sisteam",
     *     views = { "location","default" },
     *     statusCodes={
     *         201="Usuario Creado",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     */
    public function listAction(Request $request)
    {
        if ($request->isMethod('GET')) {

            $em = $this->getDoctrine()->getManager();
            $locations = $em->getRepository('AAVVStrappDomain:Location')->findAll();

            return new JsonResponse($locations, 200);
        }

        return new JsonResponse('Bad request - It\'s not GET',404);
    }

    /**
     * La siguiente función se encarga de registrar una localidad
     * en el sistema
     *
     * @author Freddy Contreras
     * @param  Request $request
     * @return json  http status
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Registrar localidad",
     *     description="Registrar localidad al sistema",
     *     views = { "location","default" },
     *      parameters={
     *          {"name"="name", "dataType"="integer","description"="id del trabajo", "required"="true"},
     *          {"name"="additional_information", "dataType"="string","description"="información adicional", "required"="true"},
     *          {"name"="location_code", "dataType"="string","description"="Código de la localidad", "required"="true"},
     *      },
     *     statusCodes={
     *         201="Localidad Creada",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     */
    public function registerAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            $location = new Location();
            $location->setAttributes(json_decode($request->getContent(),true));

            $validator = $this->get('core_validator');
            $errors = $validator->validate($location,['create']);

            // Validación de los datos
            if (count($errors) > 0)
                return new JsonResponse($errors, 400);

            $em = $this->getDoctrine()->getManager();
            $em->persist($location);
            $em->flush();
            return new JsonResponse('Ok',201);
        }

        return new JsonResponse('Bad request - It\'s not POST',400);
    }

    /**
     * La siguiente función se encarga de editar
     * una localidad en el sistema
     *
     * @author Freddy Contreras
     * @param Request $request
     * @return JsonResponse
     *
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Actualización de localidad",
     *     description="La ruta actualiza un localidad",
     *     views = { "location", "default"},
     *     parameters={
     *          {"name"="id", "dataType"="integer","description"="Id de la localidad", "required"="true"},
     *          {"name"="name", "dataType"="integer","description"="id del trabajo", "required"="true"},
     *          {"name"="additional_information", "dataType"="string","description"="información adicional", "required"="true"},
     *          {"name"="location_code", "dataType"="string","description"="Código de la localidad", "required"="true"},
     *      },
     *     statusCodes={
     *         200="Localidad Actualizado",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     */
    public function editAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = json_decode($request->getContent(),true);
            $em = $this->getDoctrine()->getManager();

            if (isset($data['id']))
                $location = $em->getRepository('AAVVStrappDomain:Location')->find($data['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$location)
                return new JsonResponse('Not Found',404);


            $location->setAttributes($data);

            $validator = $this->get('core_validator');
            $errors = $validator->validate($location,['edit']);

            if (count($errors) > 0)
                return new JsonResponse($errors, 400);

            $em = $this->getDoctrine()->getManager();
            $em->persist($location);
            $em->flush();
            return new JsonResponse('Ok',200);
        }

        return new JsonResponse('Bad request - It\'s not POST',404);
    }

    /**
     * La siguiente función se encarga de
     * eliminar un viaje del sistema
     *
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Eliminar viaje",
     *     description="La ruta elimina un viaje dado el id",
     *     views = { "location","default" },
     *     parameters={
     *          {"name"="id", "dataType"="integer","description"="Id de la localidad", "required"="true"}
     *      },
     *     statusCodes={
     *         200="Viaje eliminado",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     * @author Freddy Contreras
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = json_decode($request->getContent(),true);
            $em = $this->getDoctrine()->getManager();

            if (isset($data['id']))
                $location = $em->getRepository('AAVVStrappDomain:Location')->find($data['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$location)
                return new JsonResponse('Not Found',404);

            $em = $this->getDoctrine()->getManager();
            $em->remove($location);
            $em->flush();
            return new JsonResponse('Ok',200);
        }

        return new JsonResponse('Bad request - It\'s not POST',404);
    }

    /**
     * Obtener los datos de un viaje
     * dado el id del viaje
     *
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Obtener información de un viaje",
     *     description="La ruta Obtiene la información de un viaje",
     *     views = { "location","default" },
     *     parameters={
     *          {"name"="id", "dataType"="integer","description"="Id de la localidad", "required"="true"},
     *      },
     *     statusCodes={
     *         200="Petición correcta",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     * @author Freddy Contreras
     * @param Request $request
     * @return JsonResponse
     */
    public function readAction(Request $request)
    {
        if ($request->isMethod('GET')) {

            $em = $this->getDoctrine()->getManager();

            if (isset($_GET['id']))
                $location = $em->getRepository('AAVVStrappDomain:Location')->findById($_GET['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$location)
                return new JsonResponse('Not Found',404);

            return new JsonResponse($location, 200);
        }

        return new JsonResponse('Bad request - It\'s not GET',404);
    }
}
