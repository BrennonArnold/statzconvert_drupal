<?php
/**
 * @file
 * Contains \Drupal\statzconvert\Controller\HomeController.
 */

namespace Drupal\statzconvert\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\statzconvert\Entity\includes;
use Drupal\statzconvert\Entity\pageElements;


class HomeController extends ControllerBase {
    public function content () {
        $inc = new includes();

        //Check login stuff

        $thisPage = new pageElements($inc::_PG_HOMEPAGE);
        //$thisPage->userAuth = 'SUPERADMIN';
        $thisPage->navBar = $thisPage->genNavBar();

        return [
            '#theme' => 'default',
            '#pageTitle' => 'StatzConvert Main Menu',
            '#authlevel' => $thisPage->userAuth,
            '#navBar' => $thisPage->navBar,
            '#useNav' => TRUE,
        ];
    }
}
