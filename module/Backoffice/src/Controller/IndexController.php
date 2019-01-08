<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backoffice\Controller;

use Backoffice\Entity as Entity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct($entityManager) {
        $this->em = $entityManager;
    }

    public function langsAction() {
        $langs  = $this->em->getRepository('Backoffice\Entity\Langs')->findAll();
        $_langs = [];
        $_items = [];
        foreach ($langs as $item) {
            $_items["id"] = $item->getID();
            $_items["lang_code"] = $item->getLangCode();
            $_items["icon"] = $item->getIcon();
            $_items["default"] = $item->getDefault();
            $_items["status"] = $item->getStatus();
            $_items["pos"] = $item->getPos();
            $_langs[] = $_items;
        }
        return new JsonModel([
            [
                "status" => "ok",
                "result" => [
                    "langs" => $_langs,
                ],
            ],
        ]);
        //return new ViewModel(["langs" => $langs]);
    }

    public function wordsAction() {
        $lang_id = $this->params()->fromRoute("id");
        $words   = $this->em->getRepository('Backoffice\Entity\Words')->findBy(["lang_id" => (int) $lang_id]);
        $_words = [];
        $_items = [];
        foreach ($words as $item) {
            $_items["id"] = $item->getID();
            $_items["word"] = $item->getWord();
            $_items["define_word"] = $item->getDefineWord();
            $_items["lang_id"] = $item->getLangID();
            $_words[] = $_items;
        }
        return new JsonModel([
            [
                "status" => "ok",
                "result" => [
                    "words" => $_words,
                ],
            ],
        ]);
        //return new ViewModel(["words" => $words]);
    }

    public function addwordAction() {
        $request = $this->getRequest();
        if ($request->isGet()) { // Get method is not provided
            $this->getResponse()->setStatusCode(404);
        } elseif ($request->isPost()) { // Add new record
            $post                = [];
            $post["lang_id"]     = $this->params()->fromPost('lang_id', null);
            $post["define_word"] = $this->params()->fromPost('define_word', null);
            $post["word"]        = $this->params()->fromPost('word', null);
            if ($post["lang_id"] > 0 && isset($post["define_word"]) && isset($post["word"])) {
                $word = new \Entity\Words();
                $word->setLangID($lang_id);
                $word->setWord($word);
                $word->setDefineWord($define_word);
                $this->em->persist($word);
                if ($this->em->flush()) {
                    //$this->getResponse()->setStatusCode(200);
                    return new JsonModel([
                        [
                            "status" => "ok",
                            "result" => [
                                "msg" => "ტრანზაქციამ ჩაიარა წარმატებით",
                            ],
                        ],
                    ]);
                } else {
                    //$this->getResponse()->setStatusCode(500);
                    return new JsonModel([
                        [
                            "status" => "fail",
                            "result" => null,
                        ],
                    ]);
                }
            }
        } elseif ($request->getMethod() == "PATCH") { // Update record

        } elseif ($request->getMethod() == "DELETE") { // Delete record

        }

    }

}
