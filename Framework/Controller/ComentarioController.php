<?php

    include_once("Framework/Model/Comentario/ComentarioModel.php");
    include_once("Framework/Model/Comentario/ComentarioDAO.php");
    include_once("Framework/Model/Comentario/ComentarioVO.php");
    include_once("Framework/View/ComentarioView.php");

    class ComentarioController
        {
        public function EnviarComentarioController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();

            if(isset($_SESSION['id_usuario']))
                {
                $IdUsuario = $_SESSION['id_usuario'];
                }else
                    die();

            $Comentario = $_POST['texto_comentario'];
            $IdProduto = $_POST['produto'];

            $VO->defineIdProduto($IdProduto);
            $VO->defineIdUsuario($IdUsuario);
            $VO->defineComentario($Comentario);

            $Model->EnviarComentarioModel($VO);
            }

        public function ExibirComentariosProdutoController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $View = new ComentarioView();

            $IdProduto = $_GET['produto'];

            $VO->defineIdProduto($IdProduto);

            $Comentarios = $Model->RecuperarComentariosProdutoModel($VO);
            return $View->ExibirComentariosView($Comentarios);
            }

        public function ExibirAllComentariosController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();
            $View = new ComentarioView();

            if(isset($_GET['usuario']))
                {
                $usuario = $_GET['usuario'];
                $produto = $_GET['produto'];

                $VO->defineIdUsuario($usuario);
                $VO->defineIdProduto($produto);

                $Comentarios = $Model->RecuperarFiltroComentariosModel($VO);
                return $View->ExibirAllComentariosView($Comentarios);
                }

            $Comentarios = $Model->RecuperarAllComentariosModel();
            return $View->ExibirAllComentariosView($Comentarios);
            }

        public function ApagarComentarioController()
            {
            $Model = new ComentarioModel();
            $VO = new ComentarioVO();

            $IdComentario = $_GET['IdComentario'];

            $VO->defineIdComentario($IdComentario);

            $Model->ApagarComentarioModel($VO);
            }
        }

?>