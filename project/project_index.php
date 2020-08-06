<?php

include "s-script/backend_includer.php";



include "project/project_routes.php";
$path_to_page_init = Paginator::getRouteToFile( $ROUTES );
//echo "<pre>"; var_dump( $path_to_page_init ); echo "</pre>"; exit("proj index");



include "project/project_config.php";



include "project/project_db.php";
$PDO = new PDO_C( PDO_C::buildConnString($DB_CONFIG), $DB_CONFIG['username'], $DB_CONFIG['password'] );    
//echo ( $PDO->checkConnection() ) ? "Yes" :  "No";


//exit($path_to_page_init);

include $path_to_page_init;




?>