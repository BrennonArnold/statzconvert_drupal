<?php

namespace Drupal\statzconvert;

use Drupal\Core\Database\Database;
use Drupal\node\Entity\Node;

class EnablerService {
    public function __construct() {

    }

    public function setEnabled(Node $node) {
        if (!$this->isEnabled($node)) {
            $insert = Database::getConnection()->insert('statzconvert_enabled');
            $insert->fields(['nid'], [$node->id()]);
            $insert->execute();
        }
    }

    public function isEnabled(Node $node) {
        if ($node->isNew()) {
            return FALSE;
        }
        $select = Database::getConnection()->select('statzconvert_enabled', 'se');
        $select->fields('se', ['nid']);
        $select->condition('nid', $node->id());
        $results = $select->execute();
        return !empty($results->fetchCol());
    }

    public function delEnabled(Node $node) {
        $delete = Database::getConnection()->delete('statzconvert_enabled');
        $delete->condition('nid', $node->id());
        $delete->execute();
    }
}