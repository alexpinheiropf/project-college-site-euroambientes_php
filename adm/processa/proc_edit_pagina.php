<?php

session_start ();
include_once ("../seguranca.php");
include_once ("../conexao.php");

$id          = $_POST ["id"];
$descricao   = $_POST ["descricao"];
$tag_r   	 = $_POST ["descricao"];
$rotulo_id   = $_POST ["rotulo_id"];

function tirarAcentos($tag_r){

		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$tag_r);

	}

	

	$tag = trim(strtolower(str_replace(' ', '-', (tirarAcentos($tag_r)))));


$query = mysqli_query ($conectar,"UPDATE paginas set 

	descricao   = '$descricao',
	tag   		= '$tag',
	rotulo_id   = '$rotulo_id',
	modifield 	= NOW() WHERE id='$id'");

	?>

	<!DOCTYPE html>

	<html lang="pt-br">

	<head>

		<meta charset="utf-8">

	</head>



	<body>

		<?php

		if (mysqli_affected_rows($conectar) != 0 ){	

			echo "

			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/euroambientes.com.br/adm/administrativo.php?link=12'>

			<script type=\"text/javascript\">

			alert(\"Página Editada com Sucesso.\");

			</script>

			";		   

		}

		else{ 	

			echo "

			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/euroambientes.com.br/adm/administrativo.php?link=12'>
			<script type=\"text/javascript\">
			alert(\"Página não foi editada com Sucesso.\");
			</script>";		   

		}

		?>
	</body>
	</html>