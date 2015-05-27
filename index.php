<?php 
namespace app ;
spl_autoload_extensions(".php");
spl_autoload_register();
\framework\DB::connect();
$routing = new \framework\Routing;
$routing ->run();
?>