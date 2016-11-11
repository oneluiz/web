<?php
/**
 * Copyright (C) 2016 Luis Cortes Juarez
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

/*
|--------------------------------------------------------------------------|
| Carga automática Clases
|--------------------------------------------------------------------------|
*/
function Autocarga($NombreClase) {
	if (is_readable(CLASE . strtolower($NombreClase) . '.clase.php')){
    	require(CLASE . strtolower($NombreClase) . '.clase.php');
	}else{
		echo 'No existe la clase '.$NombreClase;
	}
}

function Modelo($NombreModelo) {
    $filename = APP."modelo/" . $NombreModelo . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function Vista($NombreVista) {
    
    global $usuarioApp;
    
    $filename = VISTA.$NombreVista . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function Controlador($NombreControlador) {
    $filename = APP."controlador/" . $NombreControlador . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register("Modelo");
spl_autoload_register("Controlador");
spl_autoload_register("Autocarga");

//Instanciar Clases
$db             = new Conexion();
$Enlace         = new Enlace();
$sistema        = new Sistema();
// Ejecutar Algunas Clases
$sistema->ReportarError();
?>
