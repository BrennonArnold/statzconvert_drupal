<?php
/**
 * @file
 * Contains \Drupal\statzconvert\Form\StatzConvertSettingsForm
 */

namespace Drupal\statzconvert\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form to configure StatzConvert module settings
 */


class StatzConvertSettingsForm extends ConfigFormBase {
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return "statzconvert_admin_settings";
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        return ['statzconvert.settings'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $types = node_type_get_names();
        $config = $this->config('statzconvert.settings');
        $form['statzconvert_types'] = [
            '#type' => 'checkboxes',
            '#title' => t('The content types to enable StatzConvert for'),
            '#default_value' => $config->get('allowed_types'),
            '#options' => $types,
            '#description' => t('On the specified node types, a StatzConvert option will be 
            available and can be enabled while that node is being edited.'),
        ];
        $form['array_filter'] = [
            '#type' => 'value',
            '#value' => TRUE,
        ];

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $allowed_types = array_filter($form_state->getValue('statzconvert_types'));
        sort($allowed_types);
        $this->config('statzconvert.settings')
            ->set('allowed_types', $allowed_types)
            ->save();

        parent::submitForm($form, $form_state);
    }
}