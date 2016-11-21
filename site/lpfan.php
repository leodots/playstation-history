<?php
//inicia sessão
session_start();   
$nome = "";
$username = "";
$email = "";
$login = "";
$msgForm = "";
?>
<html>

    <head>
        <title>Cadastro - Login</title>
        <link rel='stylesheet' type='text/css' href='css/arquivo.css.css'>  
        <meta charset='utf-8'>
        <style>
			form, h1 {text-align:center;}
			fieldset {margin:auto; width:280px;}
		</style>
    </head>

    <body>
        <?php 
        include('menu.php'); 
        
        //verifica se usuário está logado
        if(isset($_SESSION['login']) && !empty($_SESSION['login']) && isset($_SESSION['nome']) && !empty($_SESSION['nome'])):
        ?> 
        
        
        <?php 
        else: 
        $msgForm = "";
            
            if(isset($_GET["retorno"]) && $_GET["retorno"] == "errocadastro"){
                $dados = $_COOKIE["_cad_usuario"];
                $dados = json_decode($dados);
                $nome = $dados->nome;
                $username = $dados->username;
                $email = $dados->email;
                switch($dados->erro){
                    case 'email':
                        $msgForm = "E-mail inválido.";
                        break;
                    case 'campo_null':
                        $msgForm = "Todos os campos devem ser preenchidos.";
                        break;
                    case 'senha':
                        $msgForm = "A nova senha não confere com a confirmação.";
                        break;
                    case 'bd':
                        $msgForm = "Ocorreu um erro interno no processamento.";
                        break;
                    default:
                        $msgForm = "Ocorreu um erro interno.";
                }
            } elseif(isset($_GET["retorno"]) && $_GET["retorno"] == "errologin"){
                $dados = $_COOKIE["_logar"];
                $dados = json_decode($dados);
                $login = $dados->login;
                switch($dados->erro){
                    case 'campo_null':
                        $msgForm = "Todos os campos devem ser preenchidos.";
                        break;
                    case 'sem_acesso':
                        $msgForm = "Usuário/Senha inválido.";
                        break;
                    default:
                        $msgForm = "Ocorreu um erro interno.";
                }
            } 
        ?>
        <section class='lpfan'>
            <h1 class='titulo'>Cadastre-se!</h1>
            <section>
              
                <h2><center>Conteúdo exclusivo, cadastre-se ou entre:</center></h2>
                <form method='post' action='acao_cadastrar_usuario.php'>
                    <fieldset>
                        <legend>Cadastrar</legend>
                    <label for='nome'>Nome:</label><input type='text' name='nome' id='nome' placeholder="Nome Completo" value="<?php echo $nome; ?>"><br>
                    <label for='username'>Nome de Usuário: </label><input type='text' name='username' id='username' placeholder="Nome de Usuário" value="<?php echo $username; ?>"><br>
                    <label for='email'>E-mail:</label><input type='email' name='email' id='email' placeholder="Seu E-mail" value="<?php echo $email; ?>"><br>
                    <label for='senha'>Senha:</label><input type='password' name='senha' id='senha' placeholder="Sua Senha"><br>
                    <label for='confirmsenha'>Confirme a senha:</label><input type='password' name='confirmsenha' id='confirmsenha' placeholder="Confirme a Senha"><br>
                    <input name='cadastrar' type='submit' value='Enviar Cadastro'><br>
                    <?php
                    //verifica se a variável $msgForm foi alterada
                    if ($msgForm != "")
                        echo "<span style='color:green;'>".$msgForm."</span>";
                    ?>
                    </fieldset>
                </form>
                <form id='entrar' method='post' action='acao_logar.php'>
                    <fieldset>
                        <legend>Logar</legend>
                    <label for='login'>Usuário: </label><input name='login' id='login' type='text' placeholder="Seu usuário" value="<?php echo $login; ?>">
                    <label for ='senha'>Senha: </label><input name='senha' id='senha' type='password' placeholder="Sua senha">
                    <input name='entrar' type='submit' value='Entrar'>
                    </fieldset>
                    <?php
                    //verifica se a variável $msgForm foi alterada
                    if ($msgForm != "")
                        echo "<span style='color:green;'>".$msgForm."</span>";
                    ?> 
                </form>
            </section>
        </section>
        <?php 
        endif;
        include('footer.php'); 
        ?>

    </body>
</html>

