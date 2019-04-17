<?php


namespace Drupal\statzconvert\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\statzconvert\Entity\includes;
use Drupal\statzconvert\Entity\pageElements;


/**
 * Defines HomeController class.
 */

class WSCSVController extends ControllerBase {

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */

    public function content () {
        $inc = new includes();

        $thisPage = new pageElements($inc::_PG_WS_CSV_UTILS);
        //$thisPage->userAuth = "SUPERADMIN";
        $thisPage->navBar = $thisPage->genNavBar();

        return [
            '#theme' => 'wscsvutils',
            '#pageTitle' => 'Convert Website CSV',
            '#authlevel' => 'SUPERADMIN',
            '#authlevel' => $thisPage->userAuth,
            '#navBar' => $thisPage->navBar,
            '#useNav' => TRUE,
        ];
    }

}