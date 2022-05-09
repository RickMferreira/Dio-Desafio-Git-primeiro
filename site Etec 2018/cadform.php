<!DOCTYPE html>
<?php
    $conexao = mysqli_connect("localhost", "id6209576_ricardodb", "93952016","id6209576_ricardo");
    session_start();
?>
<html lang="pt-br">
    <head>
        	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <meta charset="utf-8">
        <title>Formulario</title>
        <script language="javascript">
            function sucesso(){
                setTimeout("window.location='index.html'", 4000);
            }
             </script>
    </head>
    <body>

<?php


require 'banco.php';

$Nome= $_POST ["nome"];
$email= $_POST ["email"];
$CPF= $_POST ["CPF"];
$assunto= $_POST ["assunto"];
$Mensagem= $_POST ["Mensagem"];

            
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "insert into form (Nome,email,CPF,assunto,Mensagem) values(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
			
            $q->execute(array($Nome,$email,$CPF,$assunto,$Mensagem));
            Banco::desconectar();
            header("Location: index.html");
            
            if($sql == 0){
                $_SESSION["Nome"]=$_POST ["nome"];
                $_SESSION["email"]=$_POST ["email"];
                $_SESSION["CPF"]=$_POST ["CPF"];
                $_SESSION["assunto"]=$_POST ["assunto"];
			    $_SESSION["Mensagem"]=$_POST ["Mensagem"];
                
                echo"Sua mensagem foi enviada com sucesso. Redirecionando em 4 segundos.";
                echo"<script language='javascript'>sucesso()</script";
            }
        ?>
    </body>
</html>