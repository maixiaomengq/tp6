<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/3/14
 * Time: 11:03
 */

$module_config = include ("app_". env('APP_STATUS', ""). ".php") ?: [];

return $module_config + [

];