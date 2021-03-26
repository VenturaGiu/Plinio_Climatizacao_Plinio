<?php
	class Contato
	{
		
		function CadastrarContato($conn, $dados){
			$Insert =  mysqli_query($conn, "INSERT INTO contato(tipo_cont, valor_cont)VALUES($dados[tipoc], '$dados[contato]')");
			if($Insert){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao cadastrar!<br/>Código do erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function CarregarContatos($conn, $tipo){
			$Select = mysqli_query($conn, "SELECT * FROM contato WHERE tipo_cont=$tipo");
			if(mysqli_num_rows($Select)>0){
				echo '<table class="TableListConts">';
				
				while($dados = mysqli_fetch_object($Select)){
					echo '
						<tr>
							<td class="NomeFix'.$dados->id_cont.'">'.$dados->valor_cont.'</td>
							<td>&nbsp;</td>
							<td><button class="Btn BtnDel" onclick="ExcluirContato('.$dados->id_cont.', '.$dados->tipo_cont.')">Excluir</button></td>
							<td class="BtnEdit'.$dados->id_cont.'">
								<button class="Btn" onclick="EditarCampo('.$dados->id_cont.','."'".$dados->valor_cont."'".', '."'".'contatos.php'."'".')">Editar</button>
							</td>
							<td class="LinhaCategoria'.$dados->id_cont.'">
								&nbsp;
							</td>
						</tr>						
					';
				}
				
				echo '</table>';
			}else{
				echo '<label class="erro">Nenhum dado retornado!</label>';
			}
		}
		
		function DeletarContato($conn, $id){
			$Del = mysqli_query($conn, "DELETE FROM contato WHERE id_cont=$id");
			if($Del){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao deletar!<br/>Código do erro: '.mysqli_error($conn).'.</label>';
			}
		}
		
		function AtualizarContato($Conn, $Valor, $Id){
			$Up = mysqli_query($Conn, "UPDATE contato SET valor_cont='$Valor' WHERE id_cont=$Id");
			if($Up){
				echo 'Alterado com sucesso!';
			}else{
				echo 'Erro ao editar! \n Código do Erro: '.mysqli_error($conn).'.';
			}
		}
	}
?>