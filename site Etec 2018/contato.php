<!DOCTYPE html>
<?php
    $conexao = mysqli_connect("localhost", "id6209576_ricardodb", "93952016","id6209576_ricardo");
    session_start();
?>
<html lang="pt-br">
    <head>
        	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <meta charset="utf-8">
        <title>Cadastar</title>
        <script language="javascript">
            function sucesso(){
                setTimeout("window.location='login.html'", 4000);
            }
             </script>
    </head>
    <body>

<?php

require 'banco.php';


$CPF= $_POST ["CPF"];
$Nome= $_POST ["nome"];
$Telefone= $_POST ["Telefone"];
$RG= $_POST ["RG"];
$Endereco= $_POST ["Endereco"];
$Bairro= $_POST ["Bairro"];
$Complemento= $_POST ["Complemento"];
$Numero= $_POST ["Numero"];
$Sexo= $_POST ["F_Sexo"];
$email= $_POST ["email"];
$password= $_POST ["password"];
$datanascimento= $_POST ["datanascimento"];

            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "insert into cadastro (CPF,Nome,Telefone,RG,Endereco,Bairro,Complemento,Numero,Sexo,email,password,datanascimento) values(?,?,?,?,?,?,?,?,?,?,md5(?),?)";
            $q = $pdo->prepare($sql);
			
            $q->execute(array($CPF,$Nome,$Telefone,$RG,$Endereco,$Bairro,$Complemento,$Numero,$Sexo,$email,$password,$datanascimento));
        
            header("Location:login.html");
            if($sql == 0){
                $_SESSION["CPF"]=$_POST ["CPF"];
                $_SESSION["Nome"]=$_POST ["nome"];
                $_SESSION["Telefone"]=$_POST ["Telefone"];
                $_SESSION["RG"]=$_POST ["RG"];;
                $_SESSION["Endereco"]=$_POST ["Endereco"];
                $_SESSION["Bairro"]=$_POST ["Bairro"];
                $_SESSION["Complemento"]=$_POST ["Complemento"];
                $_SESSION["Numero"]=$_POST ["Numero"];
                $_SESSION["Sexo"]=$_POST ["F_Sexo"];
                $_SESSION["email"]=$_POST ["email"];
                $_SESSION["passaword"]=$_POST ["password"];
                $_SESSION["datanascimento"]=$_POST ["datanascimento"];
                
                echo"Você foi casdastrado com sucesso. Redirecionando em 4 segundos.";
                echo"<script language='javascript'>sucesso()</script";
            }
        ?>
    </body>
</html>