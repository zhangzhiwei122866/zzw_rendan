<?php
return array (
  0 => 'id',
  1 => 'lab_number',
  2 => 'lab_name',
  3 => 'equipment_lost',
  4 => 'equipment_button',
  5 => 'power_button',
  6 => 'light_button',
  7 => 'windows',
  8 => 'door',
  9 => 'heating',
  10 => 'check_date',
  11 => 'remark',
  '_autoinc' => true,
  '_pk' => 'id',
  '_type' => 
  array (
    'id' => 'int(11) unsigned',
    'lab_number' => 'int(11)',
    'lab_name' => 'varchar(50)',
    'equipment_lost' => 'varchar(50)',
    'equipment_button' => 'varchar(10)',
    'power_button' => 'varchar(10)',
    'light_button' => 'varchar(10)',
    'windows' => 'varchar(10)',
    'door' => 'varchar(10)',
    'heating' => 'varchar(10)',
    'check_date' => 'date',
    'remark' => 'text',
  ),
);
?>