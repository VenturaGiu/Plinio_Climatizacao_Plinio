<?php
	class Categorias
	{
		var $Id;
		var $Nome;
		var $Data;
		
		public function Select($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM categorias WHERE id_ca=$Id");
			if(mysqli_num_rows($Select)>0){
				$Dados = mysqli_fecth_object($Select);
				$this->Id = $Dados->id_ca;
				$this->Nome = $Dados->nome_ca;
				$this->Data = $Dados->datacad_ca;
				
				return 1;
			}else{
				return 0;
			}
		}
		
		public function Delete($Conn, $Id){
			$Delete = mysqli_query($Conn, "DELETE FROM categorias WHERE id_ca=$Id")or die(mysqli_error($Conn));
			if($Delete){
				echo 'Categoria excluída!';
			}else{
				echo 'Erro ao apagar categoria!';
			}
		}
		
		public function Cadastro($Conn, $Nome){
			$Insert = mysqli_query($Conn, "INSERT INTO categorias(nome_ca)VALUES('$Nome')")or die(mysqli_error($Conn));
			
			if($Insert){
				echo 1;
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		public function ListarCategorias($Conn){
			$Select = mysqli_query($Conn, "SELECT * FROM categorias ORDER BY nome_ca ASC");
			if(mysqli_num_rows($Select)>0){
				echo '<table>';
				while($Dados = mysqli_fetch_object($Select)){
					echo '
						<tr>
							<td class="NomeFix'.$Dados->id_ca.'">
							'.$Dados->nome_ca.'&nbsp;&nbsp;
							</td>
							<td>
								<button class="Btn BtnDel" onclick="DeletarCategoria('.$Dados->id_ca.')">Excluir</button>
							</td>
							<td class="BtnEdit'.$Dados->id_ca.'">
								<button class="Btn" onclick="EditarCategoria('.$Dados->id_ca.','."'".$Dados->nome_ca."'".')">Editar</button>
							</td>
							<td class="LinhaCategoria'.$Dados->id_ca.'">
								&nbsp;
							</td>
						</div>
					';
				}
				echo '</table>';
			}else{
				echo 'Nenhuma categoria cadastrada!';
			}
		}
		
		public function Editar($Conn, $Id, $Valor){
			$Update = mysqli_query($Conn, "UPDATE categorias SET nome_ca='$Valor' WHERE id_ca=$Id");
			if($Update){
				echo 'Categoria Salva!';
			}else{
				echo 'Erro ao editar!';
			}
		}
	}
?>