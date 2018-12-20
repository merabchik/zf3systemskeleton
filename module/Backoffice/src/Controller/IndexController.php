<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backoffice\Controller;

use Backoffice\Entity\Words;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct($entityManager) {
        $this->em = $entityManager;
    }

    public function indexAction() {
        $langs = $this->em->getRepository('Backoffice\Entity\Langs')->findAll();
        return new ViewModel(["langs" => $langs]);
    }

    public function wordsAction() {
        $lang_id = $this->params()->fromRoute("id");
        $words   = $this->em->getRepository('Backoffice\Entity\Words')->findBy(["lang_id" => (int) $lang_id]);
        return new ViewModel(["words" => $words]);
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
                $word        = new Words();
                $word->setLangID($lang_id);
                $word->setWord($word);
                $word->setDefineWord($define_word);
                $this->em->persist($word);
                if ($this->em->flush()) {
                    $this->getResponse()->setStatusCode(200);
                } else {
                    $this->getResponse()->setStatusCode(500);
                }
            }
        } elseif ($request->getMethod() == "PATCH") { // Update record

        } elseif ($request->getMethod() == "DELETE") { // Delete record

        }

    }

}
