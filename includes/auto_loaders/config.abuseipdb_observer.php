<?php
 /**
 * Module: AbuseIPDB
 *
 * @requires    Zen Cart 2.1.0 or later, PHP 7.4+ (recommended: PHP 8.x)
 * @author      Marcopolo
 * @copyright   2023-2025
 * @license     GNU General Public License (GPL) - https://www.gnu.org/licenses/gpl-3.0.html
 * @version     1.0.0
 * @updated     4-14-2023
 * @github      https://github.com/CcMarc/AbuseIPDB
 */
$autoLoadConfig[0][] = array ('autoType'   => 'class',
                                'loadFile'   => 'observers/class.abuseipdb_observer.php');
$autoLoadConfig[0][] = array ('autoType'   => 'classInstantiate',
                                'className'  => 'abuseipdb_observer',
                                'objectName' => 'abuseipdb_observer');
								