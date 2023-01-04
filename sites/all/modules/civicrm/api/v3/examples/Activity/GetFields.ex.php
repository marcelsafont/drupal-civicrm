<?php

/**
 * @file
 */

/**
 * Test Generated example demonstrating the Activity.getfields API.
 *
 * @return array
 *   API result array
 */
function activity_getfields_example() {
  $params = [
    'action' => 'create',
  ];

  try {
    $result = civicrm_api3('Activity', 'getfields', $params);
  }
  catch (CRM_Core_Exception $e) {
    // Handle error here.
    $errorMessage = $e->getMessage();
    $errorCode = $e->getErrorCode();
    $errorData = $e->getExtraParams();
    return [
      'is_error' => 1,
      'error_message' => $errorMessage,
      'error_code' => $errorCode,
      'error_data' => $errorData,
    ];
  }

  return $result;
}

/**
 * Function returns array of result expected from previous function.
 *
 * @return array
 *   API result array
 */
function activity_getfields_expectedresult() {

  $expectedResult = [
    'is_error' => 0,
    'version' => 3,
    'count' => 31,
    'values' => [
      'source_record_id' => [
        'name' => 'source_record_id',
        'type' => 1,
        'title' => 'Source Record',
        'description' => 'Artificial FK to original transaction (e.g. contribution) IF it is not an Activity. Table can be figured out through activity_type_id, and further through component registry.',
        'where' => 'civicrm_activity.source_record_id',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'readonly' => TRUE,
        'add' => '2.0',
        'is_core_field' => TRUE,
      ],
      'activity_type_id' => [
        'name' => 'activity_type_id',
        'type' => 1,
        'title' => 'Activity Type ID',
        'description' => 'FK to civicrm_option_value.id, that has to be valid, registered activity type.',
        'required' => TRUE,
        'import' => TRUE,
        'where' => 'civicrm_activity.activity_type_id',
        'headerPattern' => '/(activity.)?type(.id$)/i',
        'export' => TRUE,
        'default' => '1',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select',
          'label' => 'Activity Type',
          'size' => 6,
          'maxlength' => 14,
        ],
        'pseudoconstant' => [
          'optionGroupName' => 'activity_type',
          'optionEditPath' => 'civicrm/admin/options/activity_type',
        ],
        'add' => '1.1',
        'is_core_field' => TRUE,
      ],
      'activity_date_time' => [
        'name' => 'activity_date_time',
        'type' => 12,
        'title' => 'Activity Date',
        'description' => 'Date and time this activity is scheduled to occur. Formerly named scheduled_date_time.',
        'required' => '',
        'import' => TRUE,
        'where' => 'civicrm_activity.activity_date_time',
        'headerPattern' => '/(activity.)?date(.time$)?/i',
        'export' => TRUE,
        'default' => 'CURRENT_TIMESTAMP',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select Date',
          'formatType' => 'activityDateTime',
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
        'api.default' => 'now',
      ],
      'phone_id' => [
        'name' => 'phone_id',
        'type' => 1,
        'title' => 'Phone ID (called)',
        'description' => 'Phone ID of the number called (optional - used if an existing phone number is selected).',
        'where' => 'civicrm_activity.phone_id',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'FKClassName' => 'CRM_Core_DAO_Phone',
        'html' => [
          'type' => 'EntityRef',
          'label' => 'Phone (called)',
          'size' => 6,
          'maxlength' => 14,
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
        'FKApiName' => 'Phone',
      ],
      'phone_number' => [
        'name' => 'phone_number',
        'type' => 2,
        'title' => 'Phone (called) Number',
        'description' => 'Phone number in case the number does not exist in the civicrm_phone table.',
        'maxlength' => 64,
        'size' => 30,
        'where' => 'civicrm_activity.phone_number',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Text',
          'maxlength' => 64,
          'size' => 30,
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
      ],
      'priority_id' => [
        'name' => 'priority_id',
        'type' => 1,
        'title' => 'Priority',
        'description' => 'ID of the priority given to this activity. Foreign key to civicrm_option_value.',
        'import' => TRUE,
        'where' => 'civicrm_activity.priority_id',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select',
          'size' => 6,
          'maxlength' => 14,
        ],
        'pseudoconstant' => [
          'optionGroupName' => 'priority',
          'optionEditPath' => 'civicrm/admin/options/priority',
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
      ],
      'parent_id' => [
        'name' => 'parent_id',
        'type' => 1,
        'title' => 'Parent Activity ID',
        'description' => 'Parent meeting ID (if this is a follow-up item). This is not currently implemented',
        'where' => 'civicrm_activity.parent_id',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'FKClassName' => 'CRM_Activity_DAO_Activity',
        'html' => [
          'label' => 'Parent Activity',
          'size' => 6,
          'maxlength' => 14,
        ],
        'readonly' => TRUE,
        'add' => '1.1',
        'is_core_field' => TRUE,
        'FKApiName' => 'Activity',
      ],
      'is_auto' => [
        'name' => 'is_auto',
        'type' => 16,
        'title' => 'Auto',
        'where' => 'civicrm_activity.is_auto',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'add' => '2.2',
        'is_core_field' => TRUE,
      ],
      'relationship_id' => [
        'name' => 'relationship_id',
        'type' => 1,
        'title' => 'Relationship ID',
        'description' => 'FK to Relationship ID',
        'where' => 'civicrm_activity.relationship_id',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'FKClassName' => 'CRM_Contact_DAO_Relationship',
        'html' => [
          'label' => 'Relationship',
          'size' => 6,
          'maxlength' => 14,
        ],
        'add' => '2.2',
        'is_core_field' => TRUE,
        'FKApiName' => 'Relationship',
      ],
      'is_current_revision' => [
        'name' => 'is_current_revision',
        'type' => 16,
        'title' => 'Is this activity a current revision in versioning chain?',
        'import' => TRUE,
        'where' => 'civicrm_activity.is_current_revision',
        'headerPattern' => '/(is.)?(current.)?(revision|version(ing)?)/i',
        'export' => TRUE,
        'default' => '1',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'add' => '2.2',
        'is_core_field' => TRUE,
      ],
      'original_id' => [
        'name' => 'original_id',
        'type' => 1,
        'title' => 'Original Activity ID',
        'description' => 'Activity ID of the first activity record in versioning chain.',
        'where' => 'civicrm_activity.original_id',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'FKClassName' => 'CRM_Activity_DAO_Activity',
        'html' => [
          'label' => 'Original Activity',
          'size' => 6,
          'maxlength' => 14,
        ],
        'readonly' => TRUE,
        'add' => '2.2',
        'is_core_field' => TRUE,
        'FKApiName' => 'Activity',
      ],
      'weight' => [
        'name' => 'weight',
        'type' => 1,
        'title' => 'Order',
        'where' => 'civicrm_activity.weight',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'add' => '4.1',
        'is_core_field' => TRUE,
      ],
      'is_star' => [
        'name' => 'is_star',
        'type' => 16,
        'title' => 'Is Starred',
        'description' => 'Activity marked as favorite.',
        'import' => TRUE,
        'where' => 'civicrm_activity.is_star',
        'headerPattern' => '/(activity.)?(star|favorite)/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Checkbox',
        ],
        'add' => '4.7',
        'is_core_field' => TRUE,
      ],
      'id' => [
        'name' => 'id',
        'type' => 1,
        'title' => 'Activity ID',
        'description' => 'Unique  Other Activity ID',
        'required' => TRUE,
        'import' => TRUE,
        'where' => 'civicrm_activity.id',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Number',
          'size' => 6,
          'maxlength' => 14,
        ],
        'readonly' => TRUE,
        'add' => '1.1',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_id',
        'api.aliases' => [
          '0' => 'activity_id',
        ],
      ],
      'subject' => [
        'name' => 'subject',
        'type' => 2,
        'title' => 'Subject',
        'description' => 'The subject/purpose/short description of the activity.',
        'maxlength' => 255,
        'size' => 45,
        'import' => TRUE,
        'where' => 'civicrm_activity.subject',
        'headerPattern' => '/(activity.)?subject/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Text',
          'maxlength' => 255,
          'size' => 45,
        ],
        'add' => '1.1',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_subject',
      ],
      'duration' => [
        'name' => 'duration',
        'type' => 1,
        'title' => 'Duration',
        'description' => 'Planned or actual duration of activity expressed in minutes. Conglomerate of former duration_hours and duration_minutes.',
        'import' => TRUE,
        'where' => 'civicrm_activity.duration',
        'headerPattern' => '/(activity.)?duration(s)?$/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Number',
          'size' => 6,
          'maxlength' => 14,
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_duration',
      ],
      'location' => [
        'name' => 'location',
        'type' => 2,
        'title' => 'Location',
        'description' => 'Location of the activity (optional, open text).',
        'maxlength' => 255,
        'size' => 45,
        'import' => TRUE,
        'where' => 'civicrm_activity.location',
        'headerPattern' => '/(activity.)?location$/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Text',
          'maxlength' => 255,
          'size' => 45,
        ],
        'add' => '1.1',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_location',
      ],
      'details' => [
        'name' => 'details',
        'type' => 32,
        'title' => 'Details',
        'description' => 'Details about the activity (agenda, notes, etc).',
        'import' => TRUE,
        'where' => 'civicrm_activity.details',
        'headerPattern' => '/(activity.)?detail(s)?$/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'RichTextEditor',
          'rows' => 2,
          'cols' => 80,
        ],
        'add' => '1.1',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_details',
      ],
      'status_id' => [
        'name' => 'status_id',
        'type' => 1,
        'title' => 'Activity Status',
        'description' => 'ID of the status this activity is currently in. Foreign key to civicrm_option_value.',
        'import' => TRUE,
        'where' => 'civicrm_activity.status_id',
        'headerPattern' => '/(activity.)?status(.label$)?/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select',
          'size' => 6,
          'maxlength' => 14,
        ],
        'pseudoconstant' => [
          'optionGroupName' => 'activity_status',
          'optionEditPath' => 'civicrm/admin/options/activity_status',
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_status_id',
        'api.aliases' => [
          '0' => 'activity_status',
        ],
      ],
      'is_test' => [
        'name' => 'is_test',
        'type' => 16,
        'title' => 'Test',
        'import' => TRUE,
        'where' => 'civicrm_activity.is_test',
        'headerPattern' => '/(is.)?test(.activity)?/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'CheckBox',
        ],
        'add' => '2.0',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_is_test',
      ],
      'medium_id' => [
        'name' => 'medium_id',
        'type' => 1,
        'title' => 'Activity Medium',
        'description' => 'Activity Medium, Implicit FK to civicrm_option_value where option_group = encounter_medium.',
        'where' => 'civicrm_activity.medium_id',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select',
          'size' => 6,
          'maxlength' => 14,
        ],
        'pseudoconstant' => [
          'optionGroupName' => 'encounter_medium',
          'optionEditPath' => 'civicrm/admin/options/encounter_medium',
        ],
        'add' => '2.2',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_medium_id',
      ],
      'result' => [
        'name' => 'result',
        'type' => 2,
        'title' => 'Result',
        'description' => 'Currently being used to store result id for survey activity, FK to option value.',
        'maxlength' => 255,
        'size' => 45,
        'where' => 'civicrm_activity.result',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'add' => '3.3',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_result',
      ],
      'is_deleted' => [
        'name' => 'is_deleted',
        'type' => 16,
        'title' => 'Activity is in the Trash',
        'import' => TRUE,
        'where' => 'civicrm_activity.is_deleted',
        'headerPattern' => '/(activity.)?(trash|deleted)/i',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'CheckBox',
        ],
        'add' => '2.2',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_is_deleted',
      ],
      'campaign_id' => [
        'name' => 'campaign_id',
        'type' => 1,
        'title' => 'Campaign ID',
        'description' => 'The campaign for which this activity has been triggered.',
        'import' => TRUE,
        'where' => 'civicrm_activity.campaign_id',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'FKClassName' => 'CRM_Campaign_DAO_Campaign',
        'component' => 'CiviCampaign',
        'html' => [
          'type' => 'EntityRef',
          'label' => 'Campaign',
          'size' => 6,
          'maxlength' => 14,
        ],
        'pseudoconstant' => [
          'table' => 'civicrm_campaign',
          'keyColumn' => 'id',
          'labelColumn' => 'title',
          'prefetch' => 'FALSE',
        ],
        'add' => '3.4',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_campaign_id',
        'FKApiName' => 'Campaign',
      ],
      'engagement_level' => [
        'name' => 'engagement_level',
        'type' => 1,
        'title' => 'Engagement Index',
        'description' => 'Assign a specific level of engagement to this activity. Used for tracking constituents in ladder of engagement.',
        'import' => TRUE,
        'where' => 'civicrm_activity.engagement_level',
        'export' => TRUE,
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select',
          'size' => 6,
          'maxlength' => 14,
        ],
        'pseudoconstant' => [
          'optionGroupName' => 'engagement_index',
          'optionEditPath' => 'civicrm/admin/options/engagement_index',
        ],
        'add' => '3.4',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_engagement_level',
      ],
      'created_date' => [
        'name' => 'created_date',
        'type' => 256,
        'title' => 'Created Date',
        'description' => 'When was the activity was created.',
        'required' => '',
        'where' => 'civicrm_activity.created_date',
        'export' => TRUE,
        'default' => 'CURRENT_TIMESTAMP',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select Date',
          'label' => 'Created Date',
        ],
        'add' => '4.7',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_created_date',
      ],
      'modified_date' => [
        'name' => 'modified_date',
        'type' => 256,
        'title' => 'Modified Date',
        'description' => 'When was the activity (or closely related entity) was created or modified or deleted.',
        'required' => '',
        'where' => 'civicrm_activity.modified_date',
        'export' => TRUE,
        'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        'table_name' => 'civicrm_activity',
        'entity' => 'Activity',
        'bao' => 'CRM_Activity_BAO_Activity',
        'localizable' => 0,
        'html' => [
          'type' => 'Select Date',
          'label' => 'Modified Date',
        ],
        'readonly' => TRUE,
        'add' => '4.7',
        'is_core_field' => TRUE,
        'uniqueName' => 'activity_modified_date',
      ],
      'assignee_contact_id' => [
        'name' => 'assignee_id',
        'title' => 'Activity Assignee',
        'description' => 'Contact(s) assigned to this activity.',
        'type' => 1,
        'FKClassName' => 'CRM_Contact_DAO_Contact',
        'FKApiName' => 'Contact',
      ],
      'target_contact_id' => [
        'name' => 'target_id',
        'title' => 'Activity Target',
        'description' => 'Contact(s) participating in this activity.',
        'type' => 1,
        'FKClassName' => 'CRM_Contact_DAO_Contact',
        'FKApiName' => 'Contact',
      ],
      'source_contact_id' => [
        'name' => 'source_contact_id',
        'title' => 'Activity Source Contact',
        'description' => 'Person who created this activity. Defaults to current user.',
        'type' => 1,
        'FKClassName' => 'CRM_Contact_DAO_Contact',
        'api.default' => 'user_contact_id',
        'FKApiName' => 'Contact',
        'api.required' => TRUE,
      ],
      'case_id' => [
        'name' => 'case_id',
        'title' => 'Case ID',
        'description' => 'For creating an activity as part of a case.',
        'type' => 1,
        'FKClassName' => 'CRM_Case_DAO_Case',
        'FKApiName' => 'Case',
      ],
    ],
  ];

  return $expectedResult;
}

/*
 * This example has been generated from the API test suite.
 * The test that created it is called "testGetFields"
 * and can be found at:
 * https://github.com/civicrm/civicrm-core/blob/master/tests/phpunit/api/v3/ActivityTest.php
 *
 * You can see the outcome of the API tests at
 * https://test.civicrm.org/job/CiviCRM-Core-Matrix/
 *
 * To Learn about the API read
 * https://docs.civicrm.org/dev/en/latest/api/
 *
 * Browse the API on your own site with the API Explorer. It is in the main
 * CiviCRM menu, under: Support > Development > API Explorer.
 *
 * Read more about testing here
 * https://docs.civicrm.org/dev/en/latest/testing/
 *
 * API Standards documentation:
 * https://docs.civicrm.org/dev/en/latest/framework/api-architecture/
 */
