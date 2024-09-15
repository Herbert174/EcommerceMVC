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
        }

?>