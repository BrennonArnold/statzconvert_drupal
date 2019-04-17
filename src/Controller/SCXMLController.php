<?php


namespace Drupal\statzconvert\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\statzconvert\Entity\includes;
use Drupal\statzconvert\Entity\pageElements;
use Drupal\statzconvert\Form\scXMLForm;


/**
 * Defines SCXMLController class.
 */

class SCXMLController extends ControllerBase {

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */

    public function content () {
        $inc = new includes();

        $thisPage = new pageElements($inc::_PG_SC_XML_UTILS);
        //$thisPage->userAuth = "SUPERADMIN";
        $thisPage->navBar = $thisPage->genNavBar();

        $myForm = \Drupal::formBuilder()->getForm('Drupal\statzconvert\Form\scXMLForm');

        return [
            '#theme' => 'scxmlutils',
            '#pageTitle' => 'Input Team Info',
            '#authlevel' => $thisPage->userAuth,
            '#navBar' => $thisPage->navBar,
            '#useNav' => TRUE,
            '#form'   => $myForm,
        ];
    }

    public function manageAction() {
        $myForm = \Drupal::formBuilder()->getForm('Drupal\statzconvert\Form\scXMLForm');

    }

}