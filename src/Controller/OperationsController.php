<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

use compaAPP\Repository\OperationRepository;
use compaAPP\Repository\CompteRepository;
/**
* @Route("/api", name="Operations_")
*/

class OperationsController extends AbstractController
{
    /**
     * @Route("/Operationajouter", name="ajouter")
     */
    public function addOperation(Request $request)
    {
    	if($request->isXmlHttpRequest()){
    		$donnees = json_decode($request->getContent());
    		
            /**$operation =new Operation();

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
    		$operation->setAssociationmp($donnees->associationmp);**/
        


    		if (($donnees->modeleOperation=="d")or($donnees->modeleOperation=="D")){
    			//initialiser une variable compte
    			$compte= new Compte();
    			//chercher le compte qui correspond a l'operation
    			$compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
    			//modifier le montant du compte 
    			$compte->setSoldeCompte(getSoldeCompte()+$donnees->getMontantOperation());
    			//sauvegarder dans la base
    			$em=$this->getDoctrine()->getManager();
    			$em->persist($compte);
    			$em->flush();
    			/**$em->persist($operation);
    			$em->flush();**/
    		}
    		elseif(($donnees->modeleOperation=="c")or($donnees->modeleOperation=="C")){
    			//initialiser une variable compte
    			$compte= new Compte();
    			//chercher le compte qui correspond a l'operation
    			$compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
    			//le solde apres l'extraction de l'argent
    			$montant1 = ($compte->getSoldeCompte() - $donnees->getMontantOperation());
    			if($montant1>=0){
    				/**axtraireArgent**/
    				/**modifier le montant du compte liee a l'operation**/
    				$compte->setSoldeCompte($montant1);
    				//sauvegarder dans la base
    			$em=$this->getDoctrine()->getManager();
    			$em->persist($compte);
    			$em->flush();
    			/**$em->persist($donnees);
    			$em->flush();**/
    				
    			}
    			else{
    			/**ERROR**/
    			
    		}

    		}
    		else{
    			//compte 
    			$compte= new Compte();
    			//chercher le compte qui correspond a l'operation
    			$compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
    			//compte a transferer
    			$compte2=new Compte();
    			//chercher le compte qui correspond a l'operation
    			$compte2=$this->getDoctrine()->getRepository(Compte::class)->find(getIdCompteTransfer());
    			//le solde apres l'extraction de l'argent
    			$montant1=$compte->getSoldeCompte()-$donnees->getMontantOperation();
    			//argent a transferer
    			$montant2=$compte->getSoldeCompte();
    			if($montant1>=0){
    				/**axtraireArgent**/
    				/**modifier le montant du compte liee a l'operation**/
    				//argent a transferer
    			    $montant2=$compte->getSoldeCompte();
    				$compte->setSoldeCompte($montant1);
    				$compte2->setSoldeCompte(getSoldeCompte()+$montant2);
    				//sauvegarder dans la base
    			$em=$this->getDoctrine()->getManager();
    			$em->persist($compte);
    			$em->flush();
    			
    			$em->persist($compte2);
    			$em->flush();

                /**$em->persist($donnees);
                $em->flush();**/
    			}
    			else{
    			/**ERROR**/
    			/**modifier le montant des 2mpte liee a l'operation**/
    		}
    		}
            return new Response('OK',201);
    		}
            return new Response('Eror',404);
            
    }
    
}
