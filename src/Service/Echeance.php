<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use compaAPP\Repository\EcheancesRepository;

class OperationsController 
{
    public function _construct(EntityManager $entityManager){
        $this->em=$entityManager;
    }
    public function verfyEcheance(Echeances $echeance){
    	if ($echeance->getValidation()==true){

    		$operation=new Operation() ;
    		$operationEcheance=new Operation();
    		
    		$operation->setMontantOperation($donnees->montantOperation);
    		$operation->setReferenceOperation($donnees->referenceOperation);
    		$operation->setDescriptionOperation($donnees->descriptionOperation);
    		$operation->setPointeOperation($donnees->pointeOperation);
    		$operation->setDateOperation($donnees->dateOperation);
    		$operation->setModeleOperation($donnees->modeleOperation);
    		$operation->setIdCompteTransfer($donnees->idCompteTransfer);
    		$operation->setAssosiation($donnees->assosiation);
    		$operation->setAssociatione($donnees->associatione);
    		$operation->setAssociationc($donnees->associationc);
    		$operation->setAssociationt($donnees->associationt);
    		$operation->setAssociationmp($donnees->associationmp);
    	}
    }
}