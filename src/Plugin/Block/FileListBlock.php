<?php
/**
 * @file
 * Contains \Drupal\StatzConvert\Plugin\Block\FileListBlock
 */

namespace Drupal\StatzConvert\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\statzconvert\Controller\FileListController;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'StatzConvert' File List Block
 * @Block(
 *   id = "statzconvert_filelist_block",
 *   admin_label = @Translation("StatzConvert File List Block"),
 *   category = @Translation("Blocks")
 * )
 */

class FileListBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        // TODO: Implement build() method.
        $controller_variable = new FileListController();
        $rendering_in_block = $controller_variable->content();
        return $rendering_in_block;
    }

    public function blockAccess(AccountInterface $account)
    {
        $nid = \Drupal::routeMatch()->getRawParameter('node');
        if (is_numeric($nid)) {
            return AccessResult::allowedIfHasPermission($account, 'view statzconvert files');
        }
        return AccessResult::forbidden();
    }
}
