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

class Conexion extends mysqli {
    
    /**
     * Gestiona la conexión con la base de datos
     */
    private $db_host = "";
    private $db_user = "";
    private $db_pass = "";
    private $db_name = "";
    private $port = "";
    private $auth = "";
    private $characters = "";
    private $world = "";
    private $host = "";
    private $usuario = "";
    private $clave = "";
    
    /**
     * Establecimiento de la conexión de base de datos
     * @return manejador de conexión de base de datos
     */
    private function Conectar() {
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        // Soporte para caracteres especiales en la base de datos
        $this->mysqli->query("SET NAMES 'utf8'");
        
        if ($this->mysqli->connect_error) {
            trigger_error("Error al conectar con la base de datos: " . $this->mysqli->connect_error, E_USER_ERROR);
        }
        
        // Devolver recurso de conexión
        return $this->mysqli;
        
        // Cierra la conexión
        $this->mysqli->close();
    }
    
    /**
     * Establecimiento de la conexión de base de datos de cuentas
     * @return manejador de conexión de base de datos
     */
    public function Auth(){
        $this->auth = new mysqli($this->host, $this->usuario, $this->clave, $this->auth);
        // Soporte para caracteres especiales en la base de datos
        $this->auth->query("SET NAMES 'utf8'");
        
        if ($this->auth->connect_error) {
            trigger_error("Error al conectar con la base de datos: " . $this->auth->connect_error, E_USER_ERROR);
        }
        
        // Devolver recurso de conexión
        return $this->auth;
        
        // Cierra la conexión
        $this->auth->close();
    }
    
    /**
     * Establecimiento de la conexión de base de datos
     * @return manejador de conexión de base de datos
     */
    public function Characters(){
        $this->characters = new mysqli($this->host, $this->usuario, $this->clave, $this->characters);
        // Soporte para caracteres especiales en la base de datos
        $this->characters->query("SET NAMES 'utf8'");
        
        if ($this->characters->connect_error) {
            trigger_error("Error al conectar con la base de datos: " . $this->characters->connect_error, E_USER_ERROR);
        }
        
        // Devolver recurso de conexión
        return $this->characters;
        
        // Cierra la conexión
        $this->characters->close();
    }
    
    /**
     * Establecimiento de la conexión de base de datos
     * @return manejador de conexión de base de datos
     */
    public function World(){
        $this->world = new mysqli($this->host, $this->usuario, $this->clave, $this->world);
        // Soporte para caracteres especiales en la base de datos
        $this->world->query("SET NAMES 'utf8'");
        
        if ($this->world->connect_error) {
            trigger_error("Error al conectar con la base de datos: " . $this->world->connect_error, E_USER_ERROR);
        }
        
        // Devolver recurso de conexión
        return $this->world;
        
        // Cierra la conexión
        $this->world->close();
    }
    
    public function SQL($sqlconsulta){
        return $this->Conectar()->query($sqlconsulta);
    }
    
    public function AuthQuery($AuthQuery){
        return $this->Auth()->query($AuthQuery);
    }
    
    public function CharQuery($CharQuery){
        return $this->Characters()->query($CharQuery);
    }
    
    public function WorldQuery($WorldQuery){
        return $this->World()->query($WorldQuery);
    }
    
    public function AutoCommit($valor){
        if ($valor == true) {
            return $this->SQL("SET AUTOCOMMIT=1");
        } else {
            return $this->SQL("SET AUTOCOMMIT=0");
        }
    }
    
    public function IniciarOperacion(){
        return $this->SQL("START TRANSACTION");
    }
    
    public function Begin(){
        return $this->SQL("BEGIN");
    }
    
    public function Commit(){
        return $this->SQL("COMMIT");
    }
    
    public function RollBack(){
        return $this->SQL("ROLLBACK");
    }
}
