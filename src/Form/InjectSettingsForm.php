<?php

namespace Drupal\inject\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Administration settings form.
 */
class InjectSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'inject_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'inject.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('inject.settings');
    $settings = $config->get();
    $form['allow_js'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Allow JS loading functionality.'),
      '#default_value' => $settings['allow_js_injection'],
      '#description' => $this->t('Allow/Disallow JS injection for "Hello World" message in console on Article nodes'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $this->config('inject.settings')
      ->set('allow_js_injection', $form_values['allow_js'])
      ->save();
    parent::submitForm($form, $form_state);
  }

}
