<?php
// Sessão
session_start();
if(isset($_SESSION['mensagem'])): ?>	

<script>
	// Ao usar ícones para ações, você pode usar uma dica de ferramenta para esclarecer as pessoas sobre sua função.
	//Adicione a classe Dica de ferramenta ao seu elemento e adicione superior, inferior, esquerda e direita na dica de ferramenta de dados para controlar a posição.

// Porque eu nao usei o $(document).ready(function()
//O evento ready é disparado depois que o documento HTML foi carregado.
//O onload só é disparado quando todo o conteúdo é carregado (incluindo imagens, vídeos, etc).

	window.onload = function() {
		  M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
	};
</script>

<?php
endif;
session_unset();
?>