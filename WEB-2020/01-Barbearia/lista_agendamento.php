<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Agendamentos</title>    	
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>		
        <?php include "menu.inc"; ?>
		
        <div class=" p-4 p-md-5 bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic font-weight-normal text-white">Lista de Agendamentos</h1>
            </div>
        </div>
		
        <table class="table table-striped">
            <thead class="thead-ligth">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
			<tbody>
            <?php
                $xml= simplexml_load_file("barbearia.xml");
                foreach($xml->children() as $agendamento){
                    echo'
                    <tr>
                        <td>'.$agendamento->nome.'</td>
                        <td>'.$agendamento->email.'</td>
                        <td>'.$agendamento->telefone.'</td>
                        <td>'.$agendamento->data.'</td>
                        <td>'.$agendamento->hora.'</td>
                    </tr>';
                }
            ?>
			</tbody>
        </table>
		
		<?php include "rodape.inc"; ?>
		
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
