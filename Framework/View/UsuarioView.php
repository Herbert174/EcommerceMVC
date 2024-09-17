<?php

    class UsuarioView
        {
        public function ExibirSelectUsuariosView($Usuarios)
            {
            $retorno_lista = '';
            foreach($Usuarios as $Usuario)
                {
                $retorno_lista .= '<option value="'.$Usuario['id'].'">'.$Usuario['nome'].'</option>';
                }
            return $retorno_lista;
            }
        }

?>