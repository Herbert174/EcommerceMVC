<?php

    class ComentarioDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function EnviarComentario(ComentarioVO $Comentario)
            {
            $comentario = $Comentario->retornaComentario();
            $IdUsuario = $Comentario->retornaIdUsuario();
            $IdProduto = $Comentario->retornaIdProduto();

            $objDb = new database();//instancia a classe
            $link = $objDb -> conecta_mysql();//executa função de conexão com o MySQL

            $sql = " INSERT INTO comentarios(id_usuario, comentario, id_produto) values('$IdUsuario', '$comentario', '$IdProduto') ";

            if(mysqli_query($link, $sql))
                {
                return true;
                }else 
                    return false;
            }

        public function RecuperarComentariosProduto(ComentarioVO $Comentario)
            {
            $IdProduto = $Comentario->retornaIdProduto();

            $objDb = new database();//instancia a classe
            $link = $objDb -> conecta_mysql();//executa função de conexão com o MySQL

            $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.comentario, t.id_comentario, u.nome ";
            $sql.= " FROM comentarios AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";//Junta as tabelas do banco de dados comentario e usuarios em uma só para poder vincular post de usuario a os comentarios que ele terá acesso
            $sql.= " WHERE id_produto = '$IdProduto' ";
            $sql.= " ORDER BY data_inclusao DESC ";

            if($comentarios = mysqli_query($link, $sql))
                {
                return $comentarios;
                }else 
                    return false;
            }
        }

?>