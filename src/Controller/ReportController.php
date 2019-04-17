<?php
/**
 * @file
 * Contains \Drupal\statzconvert\Controller\ReportController.
 */

namespace Drupal\statzconvert\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

class ReportController extends ControllerBase {
    protected function load() {
        $select = Database::getConnection()->select('statzconvert', 'r');
        $select->join('users_field_data', 'u', 'r.uid = u.uid');
        $select->join('statzconvert_teamlist', 'vt', 'r.visdbid = vt.id');
        $select->join('statzconvert_teamlist', 'ht', 'r.homdbid = ht.id');
        $select->addField('u', 'name', 'username');
        $select->addField('r', 'gameid');
        $select->addField('r', 'visid');
        $select->addField('vt', 'city', 'viscity');
        $select->addField('r', 'homid');
        $select->addField('ht', 'city', 'homcity');
        //$select->addField('r', 'created');
        $select->addExpression("FROM_UNIXTIME(r.created, '%Y.%m.%d %H:%i')", "created");
        $select->orderBy('created', 'DESC');
        $entries = $select->execute()->fetchAll(\PDO::FETCH_ASSOC);
        return $entries;
    }

    public function report() {
        $content = [];
        $content['message'] = [
            '#markup' => $this->t('Below is a list of all file conversions executed.'),
        ];

        $headers = [
            t('User'),
            t("GameID"),
            t('Visitor ID'),
            t('Visitors'),
            t('Home ID'),
            t('Home'),
            t('Date'),
        ];

        $rows = [];
        foreach ($entries = $this->load() as $entry) {
            //Sanitize
            $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $entry);
        }

        $content['table'] = [
            '#type' => 'table',
            '#header' => $headers,
            '#rows' => $rows,
            '#empty' => t('No entries available.'),
        ];

        //No Cache
        $content['#cache']['max-age'] = 0;

        return $content;
    }
}