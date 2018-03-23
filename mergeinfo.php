<?php

require_once 'mergeinfo.civix.php';
use CRM_Mergeinfo_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function mergeinfo_civicrm_config(&$config) {
  _mergeinfo_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function mergeinfo_civicrm_xmlMenu(&$files) {
  _mergeinfo_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function mergeinfo_civicrm_install() {
  _mergeinfo_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function mergeinfo_civicrm_postInstall() {
  _mergeinfo_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function mergeinfo_civicrm_uninstall() {
  _mergeinfo_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function mergeinfo_civicrm_enable() {
  _mergeinfo_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function mergeinfo_civicrm_disable() {
  _mergeinfo_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function mergeinfo_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _mergeinfo_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function mergeinfo_civicrm_managed(&$entities) {
  _mergeinfo_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function mergeinfo_civicrm_caseTypes(&$caseTypes) {
  _mergeinfo_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function mergeinfo_civicrm_angularModules(&$angularModules) {
  _mergeinfo_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function mergeinfo_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _mergeinfo_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function mergeinfo_civicrm_entityTypes(&$entityTypes) {
  _mergeinfo_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_preProcess().
 *
 * Here we assign some template vars.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
function mergeinfo_civicrm_preProcess($formName, &$form) {
  if ($formName == 'CRM_Contact_Form_Merge') {
    $subtype_definitions = CRM_Contact_BAO_ContactType::subTypePairs(NULL, TRUE, '');

    foreach ([
      '_mainDetails' => 'main_contact_subtype',
      '_otherDetails' => 'other_contact_subtype',
    ] as $prop => $var) {

      $contact = $form->$prop;
      $subtypes = [];
      if (!empty($contact['contact_sub_type'])) {
        foreach ($contact['contact_sub_type'] as $subtype) {
          $subtypes[] = $subtype_definitions[$subtype];
        }
      }
      asort($subtypes);
      $form->assign($var, implode(', ', $subtypes));
    }

    $templatePath = realpath(dirname(__FILE__)."/templates");
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/merge-info.tpl"
    ));
  }
}

/**
 * Change the merge output.
 */
function mergeinfo_civicrm_alterContent(&$content, $context, $tplName, &$object) {
  
}
/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function mergeinfo_civicrm_navigationMenu(&$menu) {
  _mergeinfo_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _mergeinfo_civix_navigationMenu($menu);
} // */
