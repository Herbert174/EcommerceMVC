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

        public function ExibirAllComentariosView($Comentarios)
            {
            foreach ($Comentarios as $Comentario)
                {
                echo '<tr>';
                echo '<td class="centro1" scope="row">'.$Comentario['nome'].'</td>';
                echo '<td class="centro1">'.$Comentario['comentario'].'</td>';
                echo '<td class="centro1">'.$Comentario['data_inclusao_formatada'].'</td>';
                echo '<td class="centro1">'.$Comentario['id_produto'].'</td>';
                echo '<td class="centro1"><a href="#" class="btn_apagar_comentario" data-idcomentario='.$Comentario['id_comentario'].'>Apagar comentario</a></td>';
                echo '</tr>';
                }
            }
        }

?>