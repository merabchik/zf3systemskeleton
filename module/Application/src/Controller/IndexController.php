<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Entity as Entity; 

/**
 * 
 *@method indexAction()
 *@method detailAction() 
 * 
 * 
 */ 

class IndexController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function indexAction() {

        $userEntity = $this->entityManager->getRepository(Entity\User::class);
        $userRecs = $userEntity->findAll();

        return new ViewModel(["userRecs" => $userRecs]);
    }

    public function detailAction() {
        $id = $this->params()->fromRoute("id");
        $userEntity = $this->entityManager->getRepository(Entity\User::class);
        $userRec = $userEntity->find($id);

        return new ViewModel(["userRec" => $userRec]);
    }

    public function applyAction() {
        $id = $this->params()->fromRoute("id");
        return new JsonModel([
            'status' => 'SUCCESS',
            'message' => 'Here is your data',
            'id'=>$id,
            'data' => [
                'full_name' => 'John Doe',
                'address' => '51 Middle st.'
            ]
        ]);
    }

    public function sendapplyAction() {
        $bidsEntity = $this->entityManager->getRepository(\Bids\Entity\Bids::class);
        $loadid = $this->_getParam("loadid");
        $bid_content = $this->_getParam("bid_content");
        if ($this->view->user["id"] > 0) {
            if (isset($loadid) && isset($bid_content)) {
                $bidsEntity->setLoadId($loadid);
                $bidsEntity->setUserId(1);
                $bidsEntity->setText($bid_content);
                $bidsEntity->setAddDate(date("Y-m-d H:i:s"));
                $bidsEntity->setIpAddr($_SERVER["REMOTE_ADDR"]);
                $bidsEntity->flush();
                $this->flashMessenger()->addSuccessMessage('<p class="green">Your bid has sended.</p>');
                return $this->redirect()->toRoute('roles', ['action'=>'index']);                 
            } else {
                $this->flashMessenger()->addSuccessMessage('<p class="red">Invalid params.</p>');
            }
        }
        return new JsonModel([
            'status' => 'SUCCESS',
            'message' => 'Here is your data',
            'data' => [
                'full_name' => 'John Doe',
                'address' => '51 Middle st.'
            ]
        ]);
    }

}
