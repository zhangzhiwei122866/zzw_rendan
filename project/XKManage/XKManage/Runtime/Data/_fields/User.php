<?php
return array (
  0 => 'id',
  1 => 'researcher_id',
  2 => 'username',
  3 => 'account_name',
  4 => 'password',
  5 => 'power',
  '_autoinc' => true,
  '_pk' => 'id',
  '_type' => 
  array (
    'id' => 'int(11)',
    'researcher_id' => 'int(11)',
    'username' => 'varchar(50)',
    'account_name' => 'varchar(10)',
    'password' => 'varchar(255)',
    'power' => 'enum(\'3\',\'2\',\'1\',\'0\')',
  ),
);
?>