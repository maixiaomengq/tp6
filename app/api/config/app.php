<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/3/14
 * Time: 11:03
 */

$module_config = include ("app_". env('app_status', ""). ".php") ?: [];

return $module_config + [
];