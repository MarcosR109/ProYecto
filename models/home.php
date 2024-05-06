<?php
class HomeModel extends model{
	public function Index(){
        $this->query('SELECT id_obra,titulo,descripcion,genero,formato, nombreobra, usuario.nombre, usuario_idUsuario
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario ORDER BY id_obra DESC');
        $rows = $this->resultSet();
        return $rows;
	}
}