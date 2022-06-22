<?php require_once 'classes/usuarios.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="corpo-form-cad">
    <h1>CADASTRAR</h1>
    <form method="POST" action="">
        <input type="tex"  name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="E-mail" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha">
        <input type="submit" value="Cadastrar" id="buttom">
        <a href="index.php">Já possui cadastro? <strong>Clique aqui</strong></a>
    </form>
    </div>

    <?php
        $u = new Usuario();
        //verificar se clicou no botao
        if(isset($_POST['nome'])){
            
            $nome = addslashes ($_POST['nome']);
            $telefone = addslashes ($_POST['telefone']);
            $email = addslashes ($_POST['email']);
            $senha = addslashes ($_POST['senha']);
            $confSenha = addslashes ($_POST['confSenha']);
        
            // verificar se está preenchido formulario
            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha)){
                $u->conectar("login","localhost", "root", "");
                if($u->msg == ""){ // sem erros preenchidos na $msg
                    if($senha == $confSenha){
                        if($u->cadastrar($nome, $telefone, $email, $senha, $confSenha)){
                            ?>
                            <div id="msg-sucesso">
                                Cadastrado com sucesso! Acesse para entrar!
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="msg-erro">
                                Email já cadastrado!
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                        <div class="msg-erro">
                            Senha e confirmar senha não correspondem
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="msg-erro">
                        <?php echo "ERRO: " . $u->msg;?>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="msg-erro">
                    Preencha todos os campos!
                </div>
                <?php  
            }
        }
    ?> 
</body>
</html>