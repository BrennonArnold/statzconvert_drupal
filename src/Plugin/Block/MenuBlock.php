<?php
/**
 * @file
 * Contains \Drupal\StatzConvert\Plugin\Block\MenuBlock
 */

namespace Drupal\StatzConvert\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\statzconvert\Controller\HomeController;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\node\Entity\Node;

/**
 * Provides a 'StatzConvert' Menu Block
 * @Block(
 *   id = "statzconvert_menu_block",
 *   admin_label = @Translation("StatzConvert Menu Block"),
 *   category = @Translation("Blocks")
 * )
 */

class MenuBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        // TODO: Implement build() method.
        $controller_variable = new HomeController();
        $rendering_in_block = $controller_variable->content();
        return $rendering_in_block;
    }

    public function blockAccess(AccountInterface $account)
    {
        $node = \Drupal::routeMatch()->getParameter('node');
        $nid = \Drupal::routeMatch()->getRawParameter('node');
        $enabler = \Drupal::service('statzconvert.enabler');
        if (is_numeric($nid)) {
            if ($enabler->isEnabled($node)) {
                return AccessResult::allowedIfHasPermission($account, 'view statzconvert files');
            }
        }
        return AccessResult::forbidden();
    }
}
