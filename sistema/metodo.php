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
|--------------------------------------------------------------------------------------|
| Devuelve la fecha actual del servidor
|--------------------------------------------------------------------------------------|
*/
function FechaActual(){
    return date('Y-m-d');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la hora actual del servidor
|--------------------------------------------------------------------------------------|
*/
function HoraActual(){
    return date("h:i:s a");
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve el dia actual del servidor
|--------------------------------------------------------------------------------------|
*/
function Dia(){
    return date('d');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve el mes actual del servidor
|--------------------------------------------------------------------------------------|
*/
function Mes(){
    return date('m');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve el año actual del servidor
|--------------------------------------------------------------------------------------|
*/
function Anio(){
    return date('Y');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la semana actual del servidor
|--------------------------------------------------------------------------------------|
*/
function Semana(){
    return date("W",mktime(0,0,0,Mes(),Dia(),Anio()));;
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve el dia de la semana en especifico
|--------------------------------------------------------------------------------------|
*/
function DiaSemana($fecha){
	$dias=array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
	$dd=explode('-',$fecha);
	$ts=mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
	$dia=$dias[date('w',$ts)];
	echo $dia;
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve el enlace actual
|--------------------------------------------------------------------------------------|
*/
function UrlActual(){
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	return $url;
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve una cadena de numeros limpia (Sin puntos)
|--------------------------------------------------------------------------------------|
*/
function QuitarPunto($p){
	return str_replace ( ".", "", $p);
}

/*
|--------------------------------------------------------------------------------------|
| Selecciona los meses para el select option
|--------------------------------------------------------------------------------------|
*/
function MesSelector(){
	// Meses
	$meses = array(
	1 => 'Enero',
	2 => 'Febrero',
	3 => 'Marzo',
	4 => 'Abril',
	5 => 'Mayo',
	6 => 'Junio',
	7 => 'Julio',
	8 => 'Agosto',
	9 => 'Setiembre',
	10 => 'Octubre',
	11 => 'Noviembre',
	12 => 'Diciembre'
	);
	$to = count($meses);
	$i = 0;

	foreach($meses as $key => $mes){
		$i = $i+1;
		echo'<option value="'.$key.'">'.$mes.'</option>';
	}
}

/*
|--------------------------------------------------------------------------------------|
| Selecciona los años para el select option
|--------------------------------------------------------------------------------------|
*/
function AnioSelector(){
	for($i=date('Y');$i>=date('Y')-100;$i--){
		echo'<option value="'.$i.'">'.$i.'</option>';
	}
}

/*
|--------------------------------------------------------------------------------------|
| Selecciona los dias para el select option
|--------------------------------------------------------------------------------------|
*/
function DiaSelector(){
	for($i=1;$i<=31;$i++){
		echo'<option value="'.$i.'">'.$i.'</option>';
	}
}

/*
|--------------------------------------------------------------------------------------|
| Selecciona las semanas del año para el select option
|--------------------------------------------------------------------------------------|
*/
function SemanaSelector(){
	for($i=1;$i<=53;$i++){
		echo'<option value="'.$i.'"> Semana '.$i.'</option>';
	}
}
