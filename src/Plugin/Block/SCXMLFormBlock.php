<?php
/**
 * @file
 * Contains \Drupal\StatzConvert\Plugin\Block\SCXMLFormBlock
 */


namespace Drupal\StatzConvert\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'StatzConvert' XML Conversion Form Block
 * @Block(
 *   id = "statzconvert_scxml_block",
 *   admin_label = @Translation("StatzConvert SC XML Convert Block"),
 *   category = @Translation("Blocks")
 * )
 */

class SCXMLFormBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        // TODO: Implement build() method.
        return \Drupal::formBuilder()->getForm('Drupal\statzconvert\Form\scXMLForm');
    }

    public function blockAccess(AccountInterface $account)
    {
        $nid = \Drupal::routeMatch()->getRawParameter('node');
        if (is_numeric($nid)) {
            return AccessResult::allowedIfHasPermission($account, 'submit statzconvert forms');
        }
        return AccessResult::forbidden();
    }
}