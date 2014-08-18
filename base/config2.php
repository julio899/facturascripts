<?php
/*
 * This file is part of FacturaSctipts
 * Copyright (C) 2014  Carlos Garcia Gomez  neorazorx@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if( !defined('FS_NF0') OR !defined('FS_NF1') OR !defined('FS_NF2') OR !defined('FS_POS_DIVISA') )
{
   define('FS_NF0', 2);
   define('FS_NF1', '.');
   define('FS_NF2', ' ');
   define('FS_POS_DIVISA', 'right');
}

if( !defined('FS_COMMUNITY_URL') )
   define('FS_COMMUNITY_URL', 'http://www.facturascripts.com/community');

if( file_exists('tmp/config2.ini') )
{
   $GLOBALS['config2'] = parse_ini_file('tmp/config2.ini');
}
else
{
   $GLOBALS['config2'] = array(
       'zona_horaria' => 'Europe/Madrid',
       'albaran' => 'albarán',
       'albaranes' => 'albaranes',
       'cifnif' => 'CIF/NIF'
   );
}

foreach($GLOBALS['config2'] as $i => $value)
{
   if($i == 'zona_horaria')
   {
      date_default_timezone_set($value);
   }
   else
   {
      define('FS_'.strtoupper($i), $value);
   }
}