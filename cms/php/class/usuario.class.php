<?php 
	class Usuario
	{
		var $id;
		var $nome;
		var $usuario;
		var $email;
		var $senha;
		
		function Login($conn, $dados){
			$select = mysqli_query($conn, "SELECT id_us FROM usuarios WHERE usuario_us='$dados[usuario]' AND senha_us='".sha1($dados['senha'])."'");
			if(mysqli_num_rows($select)==1){
				$id = mysqli_fetch_assoc($select);
				$_SESSION['id']=$id['id_us'];
				echo 'ok';
			}else{
				echo '<label class="erro">Usuário e senha incorreto!</label>';
			}
		}
		
		function CarregarDados($conn, $id){
			$select = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_us=$id");
			if(mysqli_num_rows($select)==1){
				$dados = mysqli_fetch_assoc($select);
				$this->id = $dados['id_us'];
				$this->nome = $dados['nome_us'];
				$this->usuario = $dados['usuario_us'];
				$this->email = $dados['email_us'];
				$this->senha = $dados['senha_us'];
			}else{
				return false;
			}
		}
		
		function CadastrarUsuario($conn, $dados){
			$selectuser = mysqli_query($conn, "SELECT usuario_us FROM usuarios WHERE usuario_us='".strtolower(str_replace(' ', '', $dados['usuario']))."'");
			if(mysqli_num_rows($selectuser)>0){
				echo '<label class="erro">Este usuário já esta cadastrado!</label>';
			}else{
				$insert = mysqli_query($conn, "
					INSERT INTO usuarios(
						nome_us,
						usuario_us,
						email_us,
						senha_us
					)VALUES(
						'$dados[nome]',
						'".strtolower(str_replace(' ', '', $dados['usuario']))."',
						'".strtolower(str_replace(' ', '', $dados['email']))."',
						'".sha1($dados['senha'])."'
					)
				");
				
				if($insert){
					echo 'ok';
				}else{
					echo '<label class="erro">Aconteceu um problema ao efetuar cadastro!<br/>Código do erro: '.mysqli_errno($conn).'.</label>';
				}
			}
		}
		
		function EditarUsuario($conn, $dados){
			$selectuser = mysqli_query($conn, "SELECT usuario_us FROM usuarios WHERE usuario_us='".strtolower(str_replace(' ', '', $dados['usuario']))."' AND id_us<>$dados[id]");
			if(mysqli_num_rows($selectuser)>0){
				echo '<label class="erro">Este usuário já esta cadastrado!</label>';
			}else{
				$insert = mysqli_query($conn, "
					UPDATE usuarios SET
						nome_us='$dados[nome]',
						usuario_us='".strtolower(str_replace(' ', '', $dados['usuario']))."',
						email_us='".strtolower(str_replace(' ', '', $dados['email']))."'
					WHERE id_us=$dados[id]
				");
				
				if($insert){
					echo 'ok';
				}else{
					echo '<label class="erro">Aconteceu um problema ao efetuar cadastro!<br/>Código do erro: '.mysqli_errno($conn).'.</label>';
				}
			}
		}
		
		function AlterarSenha($conn, $dados){
			$up = mysqli_query($conn, "
				UPDATE usuarios SET
					senha_us='".sha1($dados['senha'])."'
				WHERE id_us=$dados[id]
			");
			
			if($up){
				echo 'ok';
			}else{
				echo '<label class="erro">Aconteceu um problema ao efetuar cadastro!<br/>Código do erro: '.mysqli_errno($conn).'.</label>';
			}
		}
		
		function ExcluirUsuario($conn, $id){
		
			if($id==$_SESSION['id']){				
				session_destroy();
			}
			
			$del = mysqli_query($conn, "DELETE FROM usuarios WHERE id_us=$id");
			
			if($del){
				echo 'ok';
			}else{
				echo '<label class="erro">Aconteceu um problema ao efetuar cadastro!<br/>Código do erro: '.mysqli_errno($conn).'.</label>';
			}
		}
	}
?>