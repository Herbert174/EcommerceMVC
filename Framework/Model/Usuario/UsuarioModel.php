<?php

    class UsuarioModel //Classe responsável por aplicar as regras de negocio da aplicação
        {
        public function RegistraUsuarioModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            $usuarioVerificado = $usuario->VerificaUsuario($Usuario);
            $emailVerificado = $usuario->VerificaEmail($Usuario);
            if($usuarioVerificado && $emailVerificado)
                {
                if($usuario->RegistrarUsuario($Usuario))
                    {
                    return $usuario->LoginUsuario($Usuario);
                    }
                }
            }

        public function LoginUsuarioModel(UsuarioVO $Usuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->LoginUsuario($Usuario);
            }

        public function DeslogaUsuarioModel()
            {
            $usuario = new UsuarioDAO();
            return $usuario->DeslogaUsuario();
            }

        public function ApagarUsuarioModel($IdUsuario)
            {
            $usuario = new UsuarioDAO();
            return $usuario->ApagarUsuario($IdUsuario);
            }
        }

?>