<?php

    class ComentarioVO //Classe utilizada para definir os atributos do objeto e criar os gets e sets
        {
        private $IdComentario;
        private $IdUsuario;
        private $IdProduto;
        private $Comentario;
        private $DataComentario;

        public function retornaIdComentario()
            {
            return $this->IdComentario;
            }

        public function defineIdComentario($IdComentarioEnviado)
            {
            $this->IdComentario = $IdComentarioEnviado;
            }

        public function retornaIdUsuario()
            {
            return $this->IdUsuario;
            }

        public function defineIdUsuario($IdUsuarioEnviado)
            {
            $this->IdUsuario = $IdUsuarioEnviado;
            }

        public function retornaIdProduto()
            {
            return $this->IdProduto;
            }

        public function defineIdProduto($IdProduto)
            {
            $this->IdProduto = $IdProduto;
            }

        public function retornaComentario()
            {
            return $this->Comentario;
            }

        public function defineComentario($ComentarioEnviado)
            {
            $this->Comentario = $ComentarioEnviado;
            }

        public function retornaDataComentario()
            {
            return $this->DataComentario;
            }

        public function defineDataComentario($DataComentarioEnviado)
            {
            $this->DataComentario = $DataComentarioEnviado;
            }
        }

?>