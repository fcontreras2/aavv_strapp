<?php

namespace AAVVStrapp\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use AAVVStrapp\ApiBundle\Entity\UserProfile;

/**
 * La siguiente clase recibe y proceso las solicitudes referentes
 * a los usuarios del sistema
 *
 * Class UserController
 *
 * @author Freddy Contreras
 * @package AAVVStrapp\ApiBundle\Controller
 */
class UserController extends Controller
{
    /**
     * La siguiente función se encarga de registrar en el sistema
     *
     * @author Freddy Contreras
     * @param  Request $request
     * @return json    data solicitada
     * @ApiDoc(
     *     tags={
     *         "POST" = "green"
     *     },
     *     resource=true,
     *     resourceDescription="Registrar a un usuario en el sistema",
     *     description="Listados de los tipos de trabajo en el sistema (homepage)",
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

            $userProfile = new UserProfile();
            $userProfile->setAttributes(json_decode($request->getContent(),true));

            $validator = $this->get('core_validator');
            $errors = $validator->validate($userProfile,['create']);

            // Validación de los datos
            if (count($errors) > 0)
                return new JsonResponse($errors, 400);

            $em = $this->getDoctrine()->getManager();
            $em->persist($userProfile);
            $em->flush();
            return new JsonResponse('Ok',200);
        }

        return new JsonResponse('Bad request - It\'s not POST',400);
    }

    /**
     * La siguiente función se encarga de editar los datos de un usuario
     *
     * @ApiDoc(
     *     tags={
     *         "POST" = "blue"
     *     },
     *     resource=true,
     *     resourceDescription="Usuario actualizado",
     *     description="La ruta actualiza un usuario del sistema",
     *     statusCodes={
     *         200="Usuario Actualizado",
     *         400="Datos incorrectos",
     *         404="Usuario no encontrado",
     *         500="Error el sistema"
     *     }
     *  )
     * @author Freddy Contreras
     * @param Request $request
     * @return JsonResponse
     */
    public function editAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = json_decode($request->getContent(),true);
            $em = $this->getDoctrine()->getManager();

            if (isset($data['id']))
                $userProfile = $em->getRepository('AAVVStrappDomain:UserProfile')->find($data['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$userProfile)
                return new JsonResponse('Not Found',404);


            $userProfile->setAttributes($data);

            $validator = $this->get('core_validator');
            $errors = $validator->validate($userProfile);

            if (count($errors) > 0)
                return new JsonResponse($errors, 400);

            $em = $this->getDoctrine()->getManager();
            $em->persist($userProfile);
            $em->flush();
            return new JsonResponse('Ok',201);
        }

        return new JsonResponse('Bad request - It\'s not POST',404);
    }

    /**
     * Eliminar Usuario registrado
     *
     * @ApiDoc(
     *     tags={
     *         "POST" = "red"
     *     },
     *     resource=true,
     *     resourceDescription="Eliminar usuario",
     *     description="La ruta elimina un usuario registrado dado un id",
     *     statusCodes={
     *         200="Usuario eliminado",
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
                $userProfile = $em->getRepository('AAVVStrappDomain:UserProfile')->find($data['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$userProfile)
                return new JsonResponse('Not Found',404);

            $em = $this->getDoctrine()->getManager();
            $em->remove($userProfile);
            $em->flush();
            return new JsonResponse('Ok',201);
        }

        return new JsonResponse('Bad request - It\'s not POST',404);
    }

    /**
     * Eliminar Usuario registrado
     *
     * @ApiDoc(
     *     tags={
     *         "GET" = "blue"
     *     },
     *     resource=true,
     *     resourceDescription="Obtener información de un usuario",
     *     description="La ruta Obtiene la información de un usuario",
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
    public function readAction($id = null, Request $request)
    {
        if ($request->isMethod('GET')) {

            $em = $this->getDoctrine()->getManager();

            if (isset($_GET['id']))
                $userProfile = $em->getRepository('AAVVStrappDomain:UserProfile')->findById($_GET['id']);
            else
                return new JsonResponse('Not Found',404);

            if (!$userProfile)
                return new JsonResponse('Not Found',404);

            $serializer = $this->get('jms_serializer');

            return new JsonResponse($userProfile, 200);
        }

        return new JsonResponse('Bad request - It\'s not GET',404);
    }
}
