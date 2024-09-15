<?php

    include_once("Framework/Model/Usuario/UsuarioModel.php");
    include_once("Framework/Model/Usuario/UsuarioDAO.php");
    include_once("Framework/Model/Usuario/UsuarioVO.php");
    include_once("Framework/View/UsuarioView.php");

    class UsuarioController
        {
        public function RegistraUsuarioController()
            { //Registra usuario enviado pelo cliente no banco de dados
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $VO->defineNomeUsuario($usuario);
            $VO->defineEmailUsuario($email);
            $VO->defineSenhaUsuario($senha);
            if($RetornoModel = $Model->RegistraUsuarioModel($VO))
                {
                header("Location: index?sucesso_registro=1");
                }
            }

        public function LoginUsuarioController()
            { //Realiza o acesso do usuario no sistema e o direciona para pagina inicial em caso de sucesso
            $Model = new UsuarioModel();
            $VO = new UsuarioVO();
            $usuario = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            $VO->defineNomeUsuario($usuario);
            $VO->defineSenhaUsuario($senha);
            if($Model->LoginUsuarioModel($VO))
                {
                header("Location: index");
                }else header("Location: index?erro=1");
            }

        public function DeslogaUsuarioController()
            { //Sem uso atualmente
            $Model = new UsuarioModel();
            if($Model->DeslogaUsuarioModel())
                {
                header("Location: index");
                }else die ('Ocorreu um erro ao tentar deslogar da sua conta');
            }

        public function ApagarUsuarioController()
            { //Sem uso atualmente
            $Model = new UsuarioModel();
            $idUsuario = $_GET['id_usuario'];
            if($Model->ApagarUsuarioModel($idUsuario))
                {
                header("Location: index"); //Futuramente pagina de admin
                }else die ('Ocorreu um erro ao tentar apagar esta conta');
            }
        }

?>