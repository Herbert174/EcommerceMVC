<?php

    class UsuarioVO //Classe utilizada para definir os atributos do objeto e criar os gets e sets
        {
        private $IdUsuario;
        private $NomeUsuario;
        private $EmailUsuario;
        private $SenhaUsuario;

        public function retornaIdUsuario()
            {
            return $this->IdUsuario;
            }

        public function defineIdUsuario($IdEnviado)
            {
            $this->IdUsuario = $IdEnviado;
            }

        public function retornaNomeUsuario()
            {
            return $this->NomeUsuario;
            }

        public function defineNomeUsuario($NomeEnviado)
            {
            $this->NomeUsuario = $NomeEnviado;
            }

        public function retornaEmailUsuario()
            {
            return $this->EmailUsuario;
            }

        public function defineEmailUsuario($EmailEnviado)
            {
            $this->EmailUsuario = $EmailEnviado;
            }

        public function retornaSenhaUsuario()
            {
            return $this->SenhaUsuario;
            }

        public function defineSenhaUsuario($SenhaEnviado)
            {
            $this->SenhaUsuario = $SenhaEnviado;
            }
        }

?>