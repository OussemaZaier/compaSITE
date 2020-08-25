<?php
namespace App\Controller\Api;

//entite utilisée dans ce api
use App\Entity\Operation;


//fichier qui contient les service pour l'entite operation 
use App\Service\OperationsServices;   

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use DateTime;
class OperationAPI extends AbstractController {
    private $operationsServices;

    public function __construct(OperationsServices $operationsServices) {
        $this->operationsServices = $operationsServices;       
    }
    /**
     * @Route("/societe_config/{id}", methods={"Post"})
     * @SWG\Tag(name="Operation management")
     * @RequestParam(name="nomSocite",key=null,requirements="",default=null,description="nom Societe",strict=true,map=false,nullable=false) 
     * @RequestParam(name="siretSociete",key=null,requirements="",default=null,description=siret de la Societe",strict=true,map=false,nullable=false)
     * @SWG\Response(response=200, description="Insert parametres configuration societe.")
     * @SWG\Response(response=422, description="The request is incomprehensible or incomplete")
     * @SWG\Response(response=404, description="Model not found")
     * @SWG\Response(response=401, description="Unauthorized")
     * @var Request $request
     * @return View
    */
}