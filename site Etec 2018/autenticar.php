<!DOCTYPE html>
<?php
    $conexao = mysqli_connect("localhost", "id6209576_ricardodb", "93952016","id6209576_ricardo");
    session_start();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script language="javascript">
            function sucesso(){
                setTimeout("window.location='form.html'", 4000);
            }
            function failed(){
                setTimeout("window.location='login.html'", 4000);
            }
        </script>
    </head>
    <body>
        <?php
            $user = $_POST["email"];
            $pass = $_POST["password"];
            
			$consulta = mysqli_query($conexao,"SELECT * FROM cadastro WHERE email = '$user' and password = md5('$pass')") or die (mysqli_error($conexao));
            $linhas = mysqli_num_rows($consulta);
            
			
			
            if($linhas == 0){
                echo"Login/senha incorreta!!!. Você será redirecionado para o formulario em 4 segundos.";
                echo"<script language='javascript'>failed()</script>";
            } else {
                $_SESSION["usuario"]=$_POST["email"];
                $_SESSION["senha"]=$_POST["password"];
                echo"Você foi logado com sucesso. Redirecionando em 4 segundos.";
                echo"<script language='javascript'>sucesso()</script";
            }
        ?>
    </body>
</html>