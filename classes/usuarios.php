<?php

Class Usuario{

    private $pdo;
    public $msg = ""; //vazio, esta tudo ok

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=" .$nome. ";host=" .$host, $usuario, $senha);
        }catch (PDOException $e){
           $msg = $e->getMessage();
        }
    }
    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; // já cadastrado
        }else{
             //caso não cadastrado, Cadastrar...
            $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; // cadastrado
        }
    }
    public function logar($email, $senha){
        global $pdo;
        //Verificar se o email e senha estao cadastrados
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql-> execute();
        if($sql->rowCount() > 0){
            //entrar no sistema (sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; // logado com sucesso

        }else{
            return false; // nao foi possivel logar
        }
    }
}
?>