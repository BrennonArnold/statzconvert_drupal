<?php
/**
 * @file
 * Contains \Drupal\StatzConvert\Plugin\Block\WSCSVFormBlock
 */


namespace Drupal\StatzConvert\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'StatzConvert' CSV Conversion Form Block
 * @Block(
 *   id = "statzconvert_wscsv_block",
 *   admin_label = @Translation("StatzConvert WS CSV Convert Block"),
 *   category = @Translation("Blocks")
 * )
 */

class WSCSVFormBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        // TODO: Implement build() method.
        return \Drupal::formBuilder()->getForm('Drupal\statzconvert\Form\wsCSVForm');
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