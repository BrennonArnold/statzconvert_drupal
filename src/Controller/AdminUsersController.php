<?php


namespace Drupal\statzconvert\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\statzconvert\Entity\includes;
use Drupal\statzconvert\Entity\pageElements;


/**
 * Defines FileListController class.
 */

class AdminUsersController extends ControllerBase {

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */

    public function content () {
        $inc = new includes();

        $thisPage = new pageElements($inc::_PG_ADMIN_USERS);
        //$thisPage->userAuth = "SUPERADMIN";
        $thisPage->navBar = $thisPage->genNavBar();

        return [
            '#theme' => 'adminusers',
            '#pageTitle' => 'Admin System Users',
            '#authlevel' => $thisPage->userAuth,
            '#navBar' => $thisPage->navBar,
            '#useNav' => TRUE,
        ];
    }

}