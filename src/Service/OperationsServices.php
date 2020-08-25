<?php

namespace App\Service;


use Doctrine\ORM\EntityManager;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

use compaAPP\Repository\OperationRepository;
use compaAPP\Repository\CompteRepository;


class OperationsServices
{
    public function _construct(EntityManager $entityManager){
        $this->em=$entityManager;
    }
    //!!!!!!!!!!!!!//
    //la fonction modifyOperation est la meme que addOperation mais on ajoute une précondition//
    //pour verifier s'il a modifier le montant ou le modele//
    //si oui on doit appeler deleteOperation() puis addOperation//
    //!!!!!!!!!!!!!//
    public function addOperationServ(Request $request)
    {
    	try {
            $donnees = json_decode($request->getContent()); 

            $operation =new Operation();

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
        


    		if (($operation->modeleOperation=="d")or($operation->modeleOperation=="D")){
    			//initialiser une variable compte
    			$compte= new Compte();
    			//chercher le compte qui correspond a l'operation
    			$compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
    			//modifier le montant du compte 
    			$compte->setSoldeCompte($compte->getSoldeCompte()+$operation->getMontantOperation());
    			//sauvegarder dans la base
    			$em=$this->getDoctrine()->getManager();
    			$em->persist($compte);
    			$em->flush();
    			
                $this->manager->persist($operation);
                $this->manager->flush();
    		}
    		elseif(($operation->modeleOperation=="c")or($operation->modeleOperation=="C")){
    			//initialiser une variable compte
    			$compte= new Compte();
    			//chercher le compte qui correspond a l'operation
    			$compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
    			//le solde apres l'extraction de l'argent
    			$montant1 = ($compte->getSoldeCompte() - $operation->getMontantOperation());
    			if($montant1>=0){
    				/**axtraireArgent**/
    				/**modifier le montant du compte liee a l'operation**/
    				$compte->setSoldeCompte($montant1);
    				//sauvegarder dans la base
    			$em=$this->getDoctrine()->getManager();
    			$em->persist($compte);
    			$em->flush();
    			$this->manager->persist($operation);
                $this->manager->flush();
    			}
    			else{
    			/**ERROR**/
    			Exception $exception;
                return $exception
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
    			$montant1=$compte->getSoldeCompte()-$operation->getMontantOperation();
    			
    			if($montant1>=0){
    				/**axtraireArgent**/
    				/**modifier le montant du compte liee a l'operation**/
    				//argent a transferer
    			    
    				$compte->setSoldeCompte($montant1);
    				$compte2->setSoldeCompte($compte2->getSoldeCompte()+$operation->getMontantOperation());
    				//sauvegarder dans la base
    			$em=$this->getDoctrine()->getManager();
    			$em->persist($compte);
    			$em->flush();
    			
    			$em->persist($compte2);
    			$em->flush();

                $this->manager->persist($operation);
                $this->manager->flush();
    			}
    			else{
    			/**ERROR**/
    			/**modifier le montant des 2mpte liee a l'operation**/
                Exception $exception;
                return $exception
    		    }
    		}
            catch (Exception $exception) {
            return $exception;
            }
            return (isset($idoperation)) ? $idoperation : 0;
            /**return new Response('OK',201);
    		}
            return new Response('Eror',404);**/
            
    }
    public function deleteOperationServ($id){
        $operation=$this->getDoctrine()->getRepository(Operation::class)->find($id);
        if (($operation->modeleOperation=="d")or($operation->modeleOperation=="D")){
                //initialiser une variable compte
                $compte= new Compte();
                //chercher le compte qui correspond a l'operation
                $compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
                //modifier le montant du compte 
                $compte->setSoldeCompte($compte->getSoldeCompte()-$operation->getMontantOperation());
                //sauvegarder dans la base
                $em=$this->getDoctrine()->getManager();
                $em->persist($compte);
                $em->flush();
                /**$em->persist($operation);
                $em->flush();**/
            }
            elseif(($operation->modeleOperation=="c")or($operation->modeleOperation=="C")){
                //initialiser une variable compte
                $compte= new Compte();
                //chercher le compte qui correspond a l'operation
                $compte=$this->getDoctrine()->getRepository(Compte::class)->find(getAssociation());
                //
                $compte->setSoldeCompte($compte->getSoldeCompte() + $operation->getMontantOperation());
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
                //
                
                $compte->setSoldeCompte($compte->getSoldeCompte()+$operation->getMontantOperation());
                $compte2->setSoldeCompte($compte2->getSoldeCompte()-$operation->getMontantOperation());
                //sauvegarder dans la base
                $em=$this->getDoctrine()->getManager();
                $em->persist($compte);
                $em->flush();
                
                $em->persist($compte2);
                $em->flush();
            }
            return new Response('OK',201);
            }
            return new Response('Eror',404);
    }
    
}
