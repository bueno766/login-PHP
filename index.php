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
    <div id="corpo-form">
    <h1>ENTRAR</h1>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="ACESSAR" id="buttom">
        <a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
    </form>
    </div>
    <?php
        $u = new Usuario();

        if(isset($_POST['email'])){

            $email = addslashes ($_POST['email']);
            $senha = addslashes ($_POST['senha']);
        
            // verificar se está preenchido 
            if(!empty($email) && !empty($senha)){
                $u->conectar("login","localhost", "root", "");
                    if($u->msg == ""){
                        if($u->logar($email, $senha)){
                            header("location: areaPrivada.php");
                        }else{
                            ?>
                            <div class="msg-erro">
                                Email e/ou senha estão incorretos!
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