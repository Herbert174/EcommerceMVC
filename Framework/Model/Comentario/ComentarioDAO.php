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

        public function RecuperarAllComentarios()
            {
            $objDb = new database();//instancia a classe
            $link = $objDb -> conecta_mysql();//executa função de conexão com o MySQL

            $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.comentario, t.id_comentario, u.nome, t.id_produto ";
            $sql.= " FROM comentarios AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";//Junta as tabelas do banco de dados comentario e usuarios em uma só para poder vincular post de usuario a os comentarios que ele terá acesso
            $sql.= " ORDER BY data_inclusao DESC ";

            if($ResultadoComentarios = mysqli_query($link, $sql))
                {
                $comentarios = mysqli_fetch_all($ResultadoComentarios, MYSQLI_ASSOC);
                return $comentarios;
                }else 
                    return false;
            }

        public function RecuperarFiltroComentarios(ComentarioVO $Comentario)
            {
            $objDb = new database();//instancia a classe
            $link = $objDb -> conecta_mysql();//executa função de conexão com o MySQL

            $usuario = $Comentario->retornaIdUsuario();
            $produto = $Comentario->retornaIdProduto();

            if($usuario == '' && $produto != '')
                {
                $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.comentario, t.id_comentario, u.nome, t.id_produto ";
                $sql.= " FROM comentarios AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";//Junta as tabelas do banco de dados comentario e usuarios em uma só para poder vincular post de usuario a os comentarios que ele terá acesso
                $sql.= " WHERE id_produto = '$produto' ";
                $sql.= " ORDER BY data_inclusao DESC ";
                }

            if($usuario != '' && $produto == '')
                {
                $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.comentario, t.id_comentario, u.nome, t.id_produto ";
                $sql.= " FROM comentarios AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";//Junta as tabelas do banco de dados comentario e usuarios em uma só para poder vincular post de usuario a os comentarios que ele terá acesso
                $sql.= " WHERE id_usuario = '$usuario' ";
                $sql.= " ORDER BY data_inclusao DESC ";
                }

            if($usuario != '' && $produto != '')
                {
                $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.comentario, t.id_comentario, u.nome, t.id_produto ";
                $sql.= " FROM comentarios AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";//Junta as tabelas do banco de dados comentario e usuarios em uma só para poder vincular post de usuario a os comentarios que ele terá acesso
                $sql.= " WHERE id_produto = '$produto' AND id_usuario = '$usuario' ";
                $sql.= " ORDER BY data_inclusao DESC ";
                }

            if($usuario == '' && $produto == '')
                {
                $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.comentario, t.id_comentario, u.nome, t.id_produto ";
                $sql.= " FROM comentarios AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";//Junta as tabelas do banco de dados comentario e usuarios em uma só para poder vincular post de usuario a os comentarios que ele terá acesso
                $sql.= " ORDER BY data_inclusao DESC ";
                }

            if($ResultadoComentarios = mysqli_query($link, $sql))
                {
                $comentarios = mysqli_fetch_all($ResultadoComentarios, MYSQLI_ASSOC);
                return $comentarios;
                }else 
                    return false;
            }

        public function ApagarComentario(ComentarioVO $Comentario)
            {
            $IdProduto = $Comentario->retornaIdComentario();

            $objDb = new database();//instancia a classe
            $link = $objDb -> conecta_mysql();//executa função de conexão com o MySQL

            $sql = " DELETE FROM comentarios WHERE id_comentario = '$IdProduto' ";

            if(mysqli_query($link, $sql))
                {
                return true;
                }else 
                    return false;
            }
        }

?>