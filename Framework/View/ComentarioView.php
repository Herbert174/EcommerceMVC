<?php

    class ComentarioView
        {
        public function ExibirComentariosView($Comentarios)
            {
            $retorno = '';
            foreach($Comentarios as $Comentario)
                {
                $retorno .= '<a href="#" class="list-group-item">';
                $retorno .= '<h4 class="list-group-item-heading">'.$Comentario['nome'].' <small> - '.$Comentario['data_inclusao_formatada'].'  </small>';
                $retorno .= '<p class="list-group-item-text pull-right">';
                $retorno .= '</p> </h4>';
                $retorno .= '<p class="list-group-item-text">'.$Comentario['comentario'].'</p>';	
                $retorno .= '</a>';
                }
            return $retorno;
            }
        }

?>