<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Entity as Entity; 


class PagesController extends AbstractActionController {

    /**
    * Entity manager.
    * @var Doctrine\ORM\EntityManager
    */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function setpageAction() {
        
        if ($this->getRequest()->isPost()) {
            $post = $this->params()->fromPost();
            $lang_id = $post["lang_id"];
            $word = $post["word"];
            $DefineWord = $post["define_word"];
            if (isset($post) && isset($lang_id)) {

                /****if word record is exists******/
                $PagesEntity = $this->entityManager->getRepository(Entity\Pages::class);
                $PageRecord = $Pages->findOneBy(["seq_id" => $DefineWord, "lang_id" => $lang_id]);
                if($PageRecord !== null){
                    $PageId = $PageRecord->getId();
                }

                $page = new Entity\Pages();
                $page->setTitle($word);
                $page->setContent($DefineWord);
                $page->setMetaKeywords($lang_id);
                $page->setMetaDescription($lang_id);
                $page->setModifyDate($lang_id);
                $page->setModifierId($id);


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


    public function pagesAction() {
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

    public function pageAction() {
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