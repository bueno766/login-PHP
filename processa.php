<?php
    /*require_once 'classes/usuarios.php';
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
                        echo "Cadastrado com sucesso! Acesse para entrar!";
                    }else{
                        echo "Email já cadastrado!";
                    }
                }else{
                    echo "Senha e confirmar senha não correspondem";
                }
                
            }else{
                echo "ERRO: " . $u->msg;
            }
        }else{
            echo "Preencha todos os campos!";
        }
    }

?>