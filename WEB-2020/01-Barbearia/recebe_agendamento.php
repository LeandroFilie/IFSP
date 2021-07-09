<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<title>Barbearia</title>    	
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/bootstrap-grid.css">
			<link rel="stylesheet" href="css/bootstrap-grid.min.css">
			<link rel="stylesheet" href="css/bootstrap-reboot.css">
			<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
	</head>
    <body>
		<?php include "menu.inc"; ?>
		<div class="p-md-5 bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic font-weight-normal text-white">Agendar Horário</h1>
            </div>
        </div>
		<div class="container">
			<?php
				$nome=$_POST["nome"];
				$email=$_POST["email"];
				$tel=$_POST["telefone"];
				$data=$_POST["data"];
				$hora=$_POST["hora"];

				if(!file_exists("barbearia.xml")){
					$xml=
'<?xml version="1.0" encoding="utf-8" ?>
	<barbearia>
		<agendamento>
			<nome>'.$nome.'</nome>
			<email>'.$email.'</email>
			<telefone>'.$tel.'</telefone>
			<data>'.$data.'</data>
			<hora>'.$hora.'</hora>
		</agendamento>
	</barbearia>
';
					file_put_contents("barbearia.xml", $xml);
					echo'<h1 class="display-5"><br/><br/><br/>Agendamento realizado com sucesso<br/><br/><br/></h1>';

				}else{
					$xml= simplexml_load_file("barbearia.xml");
					foreach($xml->children() as $cliente){
						if((($cliente->hora)== $hora) && (($cliente->data)== $data)){
							$indisponivel=true;
						}else{
							$indisponivel=false;
						}
					}
					if($indisponivel==true){
						echo '<h1 class="display-5"><br/><br/>Esse horário e data de agendamento não estão disponíveis.<br/><br/><br/></h1>';
					}else{
						$agendamento= $xml->addChild("agendamento");

						$agendamento->addChild("nome", $nome);
						$agendamento->addChild("email", $email);
						$agendamento->addChild("telefone", $tel);
						$agendamento->addChild("data", $data);
						$agendamento->addChild("hora", $hora);

						echo'<h1 class="display-5"><br/><br/>Agendamento realizado com sucesso<br/><br/><br/></h1>';


						file_put_contents("barbearia.xml", $xml->asXML());
					}
				}
			?>
		</div>
		<?php include "rodape.inc"; ?>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
    

