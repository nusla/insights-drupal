<?php


function hive_request($suffix, $params = NULL){
    $host = variable_get('hive_webhcat_host', 'localhost');
    $port = variable_get('hive_webhcat_port', 50111);
    $hive_user = variable_get('hive_webhcat_user', 'hive');


    $url = 'http://'.$host.':'.$port.$suffix.'?user.name='.$hive_user;

//    $p = array('user' => $hive_user);

//    if ($params)
//       $p += $params;

    $r = drupal_http_request($url, array(), 'GET', NULL, 1);

    if ($r->code != "200")
       return NULL;

    return $r->data;
}

/**
 * Retrieve an array of tables in the database
 * @param database - the database to query
 * @return - an array of table names
 */
function hive_get_tables($database) {
    $result = hive_request('/templeton/v1/ddl/database/'.$database.'/table/');

    if (!$result)
       return NULL;

    $tables = drupal_json_decode($result);

    if (!$tables)
      return NULL;

    return $tables['tables'];
}

/**
 * Get columns in the table
 */
function hive_get_columns($database, $table){
    $result = hive_request('/templeton/v1/ddl/database/'.$database.'/table/'.$table.'/');

    if (!$result)
       return NULL;

    $columns = drupal_json_decode($result);

    if (!$columns)
      return NULL;

    return $columns['columns'];
}

function hive_get_col_node($table, $col){
  $query = new EntityFieldQuery();

  $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'article')
    ->fieldCondition('field_table', 'value', $table, '=')
    ->fieldCondition('field_column', 'value', $column, '=');

  $result = $query->execute();

  $cols = array();
  if (isset($result['node'])) {
    $col_ids = array_keys($result['node']);
    $cols = entity_load('node', $news_items_nids);
  }

  if (isset($cols[0]))
    return $cols[0];

  return NULL;
}

/**
 * Create a node for Hive column
 */
function hive_create_update_col_node($table, $column, $name){
  global $user;

  $col = hive_get_col_node($table, $column);

  if ($col)
    return;

   $values = array(
      'type' => 'column',
      'uid' => $user->uid,
      'status' => 1,
      'comment' => 1,
      'promote' => 0,
   );
   $col = entity_create('node', $values);

 //  if (!$name)
 //    $name = $table . '_' . $column;
 
   $wrapper = entity_metadata_wrapper('node', $col);
   $wrapper->title->set($name);

   $wrapper->field_table->set($table);
   $wrapper->field_column->set($column);

   $wrapper->save();
}


/**
 * Fetch Hive table and column metadata
 */
function hive_update_metadata(){
  $db = variable_get('hive_webhcat_db', 'psa');

  $tables = hive_get_tables($db);

  if (!$tables)
    return NULL;

  $col_keys = array();
  foreach ($tables as $table){
    echo "Table $table\n";
    $cols = hive_get_columns($db, $table);
    foreach($cols as $c){
//      $col_keys[] = $table . '_' . $c['name'];
        hive_create_update_col_node($table, $c['name'], $table . '_' . $c['name']);
    }
  }
}