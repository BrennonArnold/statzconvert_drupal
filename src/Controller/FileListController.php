<?php


namespace Drupal\statzconvert\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\statzconvert\Entity\includes;
use Drupal\statzconvert\Entity\pageElements;


/**
 * Defines FileListController class.
 */

class FileListController extends ControllerBase {

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */

    public function content () {
        $inc = new includes();

        $thisPage = new pageElements($inc::_PG_FILE_LIST);
        //$thisPage->userAuth = "SUPERADMIN";
        $thisPage->navBar = $thisPage->genNavBar();

        return [
            '#theme' => 'filelisting',
            '#pageTitle' => 'DakStats Converted Files',
            '#authlevel' => $thisPage->userAuth,
            '#navBar' => $thisPage->navBar,
            '#useNav' => TRUE,
        ];
    }

}