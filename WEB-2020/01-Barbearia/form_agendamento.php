<!DOCTYPE html>
<html lang="pt-br">
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
        <div class="login-form col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
			<div class="container mb-5">
                <form action= "recebe_agendamento.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="text" name="nome" placeholder="Nome" class="form-control" required= "required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="text" name="email" placeholder="E-mail" class="form-control" required= "required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="text" name="telefone" placeholder="Telefone" class="form-control" required= "required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="date" name="data" class="form-control" required= "required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="time" name="hora" min="07:00" max="17:45" placeholder="Hora" class="form-control" required= "required"/>
                        </div>
                    </div>
                    <center><button type="submit" class="btn btn-dark">Agendar</button></center>
                </form>
            </div>
        </div>
        <?php include "rodape.inc"; ?>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>