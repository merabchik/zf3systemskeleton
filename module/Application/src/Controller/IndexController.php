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
        $usersEntity = $this->entityManager->getRepository(Entity\Users::class);
        $userRecs = $usersEntity->findAll();
        $result = [];
        foreach($userRecs as $item){
            $userRec = [];
            $userRec["id"] = $item->getId();
            $userRec["user_status_id"] = $item->getUserStatusId();
            $userRec["user_gender_id"] = $item->getUserGenderId();
            $userRec["full_name"] = $item->getFullName();
            $userRec["phone"] = $item->getPhone();
            $userRec["email"] = $item->getEmail();
            $userRec["create_date"] = $item->getCreateDate();
            $userRec["modify_date"] = $item->getModifyDate();
            $userRec["regipaddr"] = $item->getRegipaddr();
            $result[] = $userRec;
            unset($userRec);
        }

        return new JsonModel([
            'status' => true,
            'result' => $result
        ]);
    }

    public function detailAction() {
        $id = $this->params()->fromRoute("id");
        $userEntity = $this->entityManager->getRepository(Entity\Users::class);
        $result = $userEntity->find($id);

        $userRec = [];
        $userRec["id"] = $result->getId();
        $userRec["user_status_id"] = $result->getUserStatusId();
        $userRec["user_gender_id"] = $result->getUserGenderId();
        $userRec["full_name"] = $result->getFullName();
        $userRec["phone"] = $result->getPhone();
        $userRec["email"] = $result->getEmail();
        $userRec["create_date"] = $result->getCreateDate();
        $userRec["modify_date"] = $result->getModifyDate();
        $userRec["regipaddr"] = $result->getRegipaddr();


        return new JsonModel([
            'status' => true,
            'result' => $userRec
        ]);
        //return new ViewModel(["userRec" => $userRec]);
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


    public function langsAction() {
        $Entity = $this->entityManager->getRepository(Entity\Langs::class);
        $langsEntity = $Entity->findAll();
        $result = [];
        foreach($langsEntity as $item){
            $langs = [];
            $langs["id"] = $item->getId();
            $langs["lang_code"] = $item->getLangCode();
            $langs["icon"] = $item->getIcon();
            $langs["default"] = $item->getDefault();
            $langs["status"] = $item->getStatus();
            $langs["pos"] = $item->getPos();
            $result[] = $langs;
            unset($langs);
        }

        return new JsonModel([
            'status' => true,
            'result' => $result
        ]);
    }

    public function wordsAction() {
        $id = $this->params()->fromRoute("id");
        $Entity = $this->entityManager->getRepository(Entity\Words::class);
        $LangswordsEntity = $Entity->find(["lang_id" => $id]);
        $result = [];
        foreach($LangswordsEntity as $item){
            $words = [];
            $words["id"] = $item->getId();
            $words["lang_code"] = $item->getLangsWordsGroupId();
            $words["icon"] = $item->getWord();
            $words["default"] = $item->getDefineWord();
            $words["status"] = $item->getLangId();
            $result[] = $words;
            unset($words);
        }

        return new JsonModel([
            'status' => true,
            'result' => $result
        ]);
    }

}
