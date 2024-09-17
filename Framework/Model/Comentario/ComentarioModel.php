<?php

    class ComentarioModel //Classe responsável por aplicar as regras de negocio da aplicação
        {
        public function EnviarComentarioModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->EnviarComentario($Comentario);
            }

        public function RecuperarComentariosProdutoModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->RecuperarComentariosProduto($Comentario);
            }

        public function RecuperarAllComentariosModel()
            {
            $comentario = new ComentarioDAO();
            return $comentario->RecuperarAllComentarios();
            }

        public function RecuperarFiltroComentariosModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->RecuperarFiltroComentarios($Comentario);
            }

        public function ApagarComentarioModel(ComentarioVO $Comentario)
            {
            $comentario = new ComentarioDAO();
            return $comentario->ApagarComentario($Comentario);
            }
        }

?>