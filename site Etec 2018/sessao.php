<?php 
// session_start inicia a sessão
session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true))
    {
 header('location:form.html');
 
 }
// as variáveis login e senha recebem os dados digitados na página anterior
$email = $_POST['email'];
$password = $_POST['password'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$con = mysql_connect("localhost", "root", "") or die ("Sem conexão com o servidor");
$select = mysql_select_db("ricardo") or die("Sem acesso ao DB, Entre em contato com o Administrador, email");

// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysql_query("SELECT * FROM `cadastro WHERE `email` = '$email' AND `password`= '$password'");
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
header('location:form.html');
}
else{
 unset ($_SESSION['email']);
 unset ($_SESSION['password']);
 header('location:index.html');
 session_destroy();
 
 }

?>