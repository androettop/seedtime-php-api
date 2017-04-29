<?php
require_once 'classes/enrutador.php';
if(isset($_REQUEST['route'])){
	$route_get = $_REQUEST['route'];
}
else{
	$route_get = "";
}
/*---- Lista de rutas. se incluye en el index.php ----*/
$r = new Rutas($route_get);

//$r->agregarRuta("URL","VISTA");
$r->agregarRuta("login","login");
$r->agregarRuta("logout","logout");
$r->agregarRuta("logged","logged");
$r->agregarRuta("usuario/crear","usuarios/crear");
$r->agregarRuta("usuario/editar/$","usuarios/editar");
$r->agregarRuta("usuario/editar","usuarios/editar");
$r->agregarRuta("usuario/eliminar/$","usuarios/eliminar");
$r->agregarRuta("usuario/$","usuarios/mostrar");
$r->agregarRuta("arbol/crear","arbol/crear");
$r->agregarRuta("arbol/editar/$","arbol/editar");
$r->agregarRuta("arbol/eliminar/$","arbol/eliminar");
$r->agregarRuta("arbol/$","arbol/mostrar");
$r->agregarRuta("post/crear","post/crear");
$r->agregarRuta("post/editar/$","post/editar");
$r->agregarRuta("post/eliminar/$","post/eliminar");
$r->agregarRuta("post/$","post/mostrar"); //post unico
$r->agregarRuta("post/last/$","post/last"); //ultimos $ posts
$r->Start();
?>
