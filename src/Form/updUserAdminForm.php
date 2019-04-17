<?php
/**
 * @file
 * Contains \Drupal\statzconvert\updUserAdminForm
 */

namespace Drupal\statzconvert\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class updUserAdminForm extends FormBase {
    public function getFormId() {
        return 'scxml_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $nid = \Drupal::routeMatch()->getRawParameter('node');

        $form['email'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Email'),
            '#required' => TRUE,
        ];

        $form['username'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Username'),
            '#required' => TRUE,
        ];

        $form['firstname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('First Name'),
            '#required' => TRUE,
        ];

        $form['lastname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Last Name'),
            '#required' => TRUE,
        ];

        $form['password'] = [
            '#type' => 'password',
            '#title' => $this->t('Password'),
            '#required' => TRUE,
        ];

        $form['confpassword'] = [
            '#type' => 'password',
            '#title' => $this->t('Confirm Password'),
            '#required' => TRUE,
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save'),
        ];

        $form['nid'] = [
            '#type' => 'hidden',
            '#value' => $nid,
        ];

        //$form['#theme'] = 'scxmlutils';

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        parent::validateForm($form, $form_state); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // TODO: Implement submitForm() method.
    }
}