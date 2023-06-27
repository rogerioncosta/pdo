<?php

namespace App\Model;

use PDO;

class ProdutoDao {

	public function create(Produto $p) {

		$sql = 'INSERT INTO produtos (nome, descricao) VALUES (?,?)';

		$insert = Conexao::getConn()->prepare($sql);
		$insert->bindValue(1, $p->getNome());
		$insert->bindValue(2, $p->getDescricao());
		$insert->execute();

	}

	public function read() {

		$sql = 'SELECT * FROM produtos';

		$read = Conexao::getConn()->prepare($sql);
		$read->execute();

		if($read->rowCount() > 0) {
			$resultado = $read->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;		
		} else {
			return [];
		}		
	}

	public function update(Produto $p) {

		$sql = 'UPDATE produtos SET nome = ?, descricao = ? WHERE id = ?';

		$update = Conexao::getConn()->prepare($sql);
		$update->bindValue(1, $p->getNome());
		$update->bindValue(2, $p->getDescricao());
		$update->bindValue(3, $p->getId());

		$update->execute();
		
	}

	public function delete($id) {

		$sql = 'DELETE FROM produtos WHERE id = ?';
		
		$delete = Conexao::getConn()->prepare($sql);
		$delete->bindValue(1, $id);
		$delete->execute();
		
	}
}