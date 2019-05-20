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

    public function setwordAction() {
        $LangsWordsEntity = $this->entityManager->getRepository(Entity\LangsWords::class);
        $loadid = $this->_getParam("loadid");
        $bid_content = $this->_getParam("bid_content");
        if ($this->getRequest()->isPost()) {
            $post = $this->params()->fromPost();
            $lang_id = $post->lang_id;
            if (isset($post) && isset($post)) {
                $LangsWordsEntity->setWord($loadid);
                $LangsWordsEntity->setDefineWord(1);
                $langs = new Entity\Langs();
                $langs->setId($lang_id);
                $LangsWordsEntity->setLang($langs);
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
        header('Access-Control-Allow-Origin: *');
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
        header('Access-Control-Allow-Origin: *');
        $id = $this->params()->fromRoute("id");
        if($id > 0){
            $words = new Entity\LangsWords();
            $Entity = $this->entityManager->getRepository(Entity\LangsWords::class);
            $lang = new Entity\Langs();
            $lang->setId($id);
            $LangswordsEntity = $Entity->findBy(["lang" => $lang]);            

            $result = [];
            foreach($LangswordsEntity as $item){
                $words = [];
                $words["id"] = $item->getId();
                $words["langs_words_group_id"] = $item->getLangsWordsGroupId();
                $words["word"] = $item->getWord();
                $words["define_word"] = $item->getDefineWord();
                $words["lang_id"] = $item->getLang()->getId();
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


//$dql = "SELECT t FROM Application\Entity\LangsWords t WHERE t.id = ?1";
//$LangswordsEntity = $this->entityManager->createQuery($dql)->setParameter(1, $id)->getResult();