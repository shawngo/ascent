<?php

/**
 * @file
 * Firebug Lite admin functions.
 */

/**
 * Firebug Lite admin settings form.
 */
function firebug_lite_settings_form() {

  $form = array();

  $form['firebug_lite_js_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Firebug Lite Javascript settings'),
    '#description' => t('These options control the behavior of Firebug Lite. For more information, see the <a href="!link">online documentation</a>.', array('!link' => 'https://getfirebug.com/firebuglite#Options')),
  );
  foreach (_firebug_lite_get_options() as $setting => $value) {
    $form['firebug_lite_js_settings'][$value['variable_name']] = array(
      '#type' => 'checkbox',
      '#title' => $setting,
      '#default_value' => $value['value'],
    );
  }

  return system_settings_form($form);
}
