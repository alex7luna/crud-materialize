<?php
// Conexão

//Sessão

//Criar Formulario para adcionar clienteS
 // Conexão 
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>
<!--Iremos ter uma tabela com todos os clientes cadastrados-->
<div class="row"><!--Definir a largura s12 para os SmartFones / M6 Para os tablets e um puch-3 para compensar o m3 nas laterais e centralizar o elemento para-->
	<div class="col s12 m8 push-m2">
		<h3 class="light">  Lista de Clientes </h3>
		<table class="striped"><!--usei o Striped para deixa a tabela listada-->
			<thead>
				<tr><!--Inserimos uma linha Statica-->
					<th>Nome:</th>
					<th>Sobrenome:</th>
					<th>Email:</th>
					<th>Idade:</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM clientes";
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

			
			while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr><!--No Banco e Dando temos varios registros por isso fazemos um  loop-->
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['sobrenome']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td><?php echo $dados['idade']; ?></td>
					<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
             <!--Use um modal para caixas de diálogo, mensagens de confirmação ou outro conteúdo que possa ser chamado. Para que o modal funcione, é necessário adicionar o ID modal ao link do acionador. Cada resgistro irar ter um model-->
					<td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					<!-- Cada registro tem um botão que faz referencia ao modal daquele registro-->
					  <div id="modal<?php echo $dados['id']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir esse Cliente?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="php_action/delete.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
					      	<!--Adicionando um botão-->
					      	<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

					      	 <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

					      </form>

					    </div>
					  </div>


				</tr>
			   <?php 
				endwhile;
				else: ?>

				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

			   <?php 
				endif;
			   ?>

			</tbody>
		</table>
		<br>
		<a href="adicionar.php" class="btn">Adicionar um Item</a>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

