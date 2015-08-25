<?php
/**
 * @file
 * insights_report_metadata.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function insights_report_metadata_user_default_roles() {
  $roles = array();

  // Exported role: report metadata editor.
  $roles['report metadata editor'] = array(
    'name' => 'report metadata editor',
    'weight' => 3,
  );

  return $roles;
}
