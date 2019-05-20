<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Entity as Entity; 


class LangsController extends AbstractActionController {

    /**
    * Entity manager.
    * @var Doctrine\ORM\EntityManager
    */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
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

    public function emailtemplateAction() {
        $Entity = $this->entityManager->getRepository(Entity\EmailTemplates::class);
        $EmailTemplates = $Entity->findAll();
        $result = [];
        foreach ($EmailTemplates as $item) {
            $itm = [];
            $itm["id"] = $item->getId();
            $itm["TemplateName"] = $item->getTemplateName();
            $result[]=$itm;
        }
        return new JsonModel([
                'status' => true,
                'result' => $result
            ]);
    }

    public function wordsAction() {
        $id = $this->params()->fromRoute("id");
        if($id > 0){
            $Entity = $this->entityManager->getRepository(Entity\LangsWords::class);
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
        }else{
            return new JsonModel([
                'status' => false,
                'result' => []
            ]);
        }
    }

}
