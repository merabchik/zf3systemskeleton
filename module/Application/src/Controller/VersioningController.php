<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Entity as Entity; 


class VersioningController extends AbstractActionController {

    /**
    * Entity manager.
    * @var Doctrine\ORM\EntityManager
    */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function setwordAction() {
        
        if ($this->getRequest()->isPost()) {
            $post = $this->params()->fromPost();
            $lang_id = $post["lang_id"];
            $word = $post["word"];
            $DefineWord = $post["define_word"];
            if (isset($post) && isset($lang_id)) {

                /****if word record is exists******/
                $LangsWordsEntity = $this->entityManager->getRepository(Entity\LangsWords::class);
                $LangsWordsRecord = $LangsWordsEntity->findOneBy(["lang_id" => $lang_id, "defineWord" => $DefineWord]);
                if($LangsWordsRecord !== null){
                    $wordId = $LangsWordsRecord->getId();
                }

                $LangsWords = new Entity\LangsWords();
                if($LangsWordsRecord !== null){
                    $LangsWords->setId($wordId);
                }
                $LangsWords->setWord($word);
                $LangsWords->setDefineWord($DefineWord);
                $LangsWords->setLangId($lang_id);
                if($LangsWordsRecord !== null){
                    $this->entityManager->merge($LangsWords);
                }else{
                    $this->entityManager->persist($LangsWords);
                }
                $this->entityManager->flush();
                $status = true;
                $message = 'ტრანზაქციამ ჩაიარა წარმატებით';
            } else {
                $status = false;
                $message = 'ტრანზაქციის დამუშავების დროს დაფიქსირდა შეცდომა';
            }
            $this->getResponse()->setStatusCode(200);
            $this->getResponse()->getHeaders()->addHeaderLine("Access-Control-Allow-Origin: *");
            return new JsonModel([
                'status' => $status,
                'message' => $message
            ]);
        }else{
            $this->getResponse()->setStatusCode(405);
            $this->getResponse()->getHeaders()->addHeaderLine("Access-Control-Allow-Origin: *");
            return new JsonModel([
                'status' => false,
                'message' => "Method Not Allowed"
            ]);            
        }
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