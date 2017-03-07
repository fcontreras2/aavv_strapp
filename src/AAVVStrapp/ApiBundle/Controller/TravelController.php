<?php

namespace AAVVStrapp\ApiBundle\Controller;

// Clases Symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
// Entidades
use AAVVStrapp\ApiBundle\Entity\Travel;

/**
 * La siguiente clase recibe y proceso las solicitudes referentes
 * a los viajes del sistema
 *
 * Class TravelController
 *
 * @author Freddy Contreras
 * @package AAVVStrapp\ApiBundle\Controller
 */
class TravelController extends Controller
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
     *     tags={
     *         "POST" = "green"
     *     },
     *     resource=true,
     *     resourceDescription="Obtiene el listado de todos los viajes del sistema",
     *     description="Retorna los viajes del sisteam",
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
            $travels = $em->getRepository('AAVVStrappDomain:Travel')->findAll();

            return new JsonResponse($travels, 200);
        }

        return new JsonResponse('Bad request - It\'s not GET',404);
    }

    /**
     * La siguiente función se encarga de registrar un viaje
     * relacionado a un usuario
     *
     * @author Freddy Contreras
     * @param  Request $request
     * @return json  http status
     * @ApiDoc(
     *     tags={
     *         "POST" = "green"
     *     },
     *     resource=true,
     *     resourceDescription="Registrar Viaje",
     *     description="Registrar viaje al sistema, relacionado a un usuario",
     *     statusCodes={
     *         201="Usuario Creado",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     */
    public function registerAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = json_decode($request->getContent(),true);
            $em = $this->getDoctrine()->getManager();

            // Los viajes deben pertenecer a un usuario
            // y tener un origin y un destino
            if (isset($data['user_id']) &&
                isset($data['origin_id']) &&
                isset($data['destiny_id'])) {

                $userProfile = $em->getRepository('AAVVStrappDomain:UserProfile')->find($data['user_id']);
                $origin = $em->getRepository('AAVVStrappDomain:Location')->find($data['origin_id']);
                $destiny = $em->getRepository('AAVVStrappDomain:Location')->find($data['destiny_id']);

            } else
                return new JsonResponse('Bad Request - check data',400);

            $travel = new Travel();
            $travel->setAttributes(json_decode($request->getContent(),true));
            $travel->setUserProfile($userProfile);
            $travel->setOriginLocation($origin);
            $travel->setDestinyLocation($destiny);
            $userProfile->addTravel($travel);

            $validator = $this->get('core_validator');
            $errors = $validator->validate($travel,['create']);

            // Validación de los datos
            if (count($errors) > 0)
                return new JsonResponse($errors, 400);

            $em = $this->getDoctrine()->getManager();
            $em->persist($userProfile);
            $em->flush();
            return new JsonResponse('Ok',201);
        }

        return new JsonResponse('Bad request - It\'s not POST',400);
    }

    /**
     * La siguiente función se encarga de editar
     * un viaje de un usuario
     *
     * @author Freddy Contreras
     * @param Request $request
     * @return JsonResponse
     *
     * @ApiDoc(
     *     tags={
     *         "POST" = "blue"
     *     },
     *     resource=true,
     *     resourceDescription="Actualización de viaje",
     *     description="La ruta actualiza un viaje",
     *     statusCodes={
     *         200="Viaje Actualizado",
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

            // Los viajes deben pertenecer a un usuario
            // y tener un origin y un destino
            if (isset($data['user_id']) &&
                isset($data['origin_id']) &&
                isset($data['destiny_id']) &&
                isset($data['id'])) {

                $userProfile = $em->getRepository('AAVVStrappDomain:UserProfile')->find($data['user_id']);
                $origin = $em->getRepository('AAVVStrappDomain:Location')->find($data['origin_id']);
                $destiny = $em->getRepository('AAVVStrappDomain:Location')->find($data['destiny_id']);
                $travel = $em->getRepository('AAVVStrappDomain:Travel')->find($data['id']);

            } else
                return new JsonResponse('Not Found',404);

            $travel->setAttributes(json_decode($request->getContent(),true));
            $travel->setUserProfile($userProfile);
            $travel->setOriginLocation($origin);
            $travel->setDestinyLocation($destiny);
            $userProfile->addTravel($travel);

            $validator = $this->get('core_validator');
            $errors = $validator->validate($travel);

            if (count($errors) > 0)
                return new JsonResponse($errors, 400);

            $em = $this->getDoctrine()->getManager();
            $em->persist($userProfile);
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
     *     tags={
     *         "POST" = "red"
     *     },
     *     resource=true,
     *     resourceDescription="Eliminar viaje",
     *     description="La ruta elimina un viaje dado el id",
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
                $travel = $em->getRepository('AAVVStrappDomain:Travel')->find($data['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$travel)
                return new JsonResponse('Not Found',404);

            $em = $this->getDoctrine()->getManager();
            $em->remove($travel);
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
     *     tags={
     *         "GET" = "blue"
     *     },
     *     resource=true,
     *     resourceDescription="Obtener información de un viaje",
     *     description="La ruta Obtiene la información de un viaje",
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
                $travel = $em->getRepository('AAVVStrappDomain:Travel')->findById($_GET['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$travel)
                return new JsonResponse('Not Found',404);

            $serializer = $this->get('jms_serializer');

            return new JsonResponse($travel, 200);
        }

        return new JsonResponse('Bad request - It\'s not GET',404);
    }
}
