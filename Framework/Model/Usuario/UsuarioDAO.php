<?php

    class UsuarioDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function VerificaUsuario(UsuarioVO $Usuario) //Usuario pode ser criado no banco de dados?
            {
            $NOME = $Usuario->retornaNomeUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " SELECT * FROM usuarios where nome = '$NOME' ";

            if($ConsultaUsuario = mysqli_query($link, $sql))
                {
                $DadosUsuario = mysqli_fetch_array($ConsultaUsuario);
                if(isset($DadosUsuario['nome']))
                    {
                    header("Location: cadastrar_user?erro_usuario=1");
                    die ();
                    }else
                        return true;
                }
            }

        public function VerificaEmail(UsuarioVO $Usuario) //Email pode ser criado no banco de dados?
            {
            $EMAIL = $Usuario->retornaEmailUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " SELECT * FROM usuarios where email = '$EMAIL' ";

            if($ConsultaEmail = mysqli_query($link, $sql))
                {
                $DadosEmail = mysqli_fetch_array($ConsultaEmail);
                if(isset($DadosEmail['email']))
                    {
                    header("Location: cadastrar_user?erro_email=1");
                    die ();
                    }else
                        return true;
                }
            }

        public function RegistrarUsuario(UsuarioVO $Usuario) //Registra usuario no banco de dados
            {
            $Nome = $Usuario->retornaNomeUsuario();
            $Email = $Usuario->retornaEmailUsuario();
            $Senha = $Usuario->retornaSenhaUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " INSERT INTO usuarios(nome, email, senha) ";
            $sql .= " values('$Nome', '$Email', '$Senha') ";

            if($ResultadoRegistro = mysqli_query($link, $sql))
                {
                return true;
                }else
                    die('Aconteceu algum erro ao registrar sua conta no sistema');
            }

        public function ApagarUsuario($IdUsuario) //Apaga usuario do banco de dados
            {
            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " DELETE FROM usuarios WHERE id_usuario = '$IdUsuario' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                return true;
                }else
                    return false;
            }

        public function LoginUsuario(UsuarioVO $Usuario) //Realiza o acesso do usuario no sistema
            {
            $nome = $Usuario->retornaNomeUsuario();
            $senha = $Usuario->retornaSenhaUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                if($Resultado)
                    {
                    $dados_usuario = mysqli_fetch_array($Resultado);
                    if(isset($dados_usuario['nome']))
                        {
                        $_SESSION['id_usuario'] = $dados_usuario['id'];
                        $_SESSION['usuario'] = $dados_usuario['nome'];
                        $_SESSION['email'] = $dados_usuario['email'];
                        $objDb->desconecta_mysql($link);
            
                        return true;
                        }else{
                            $objDb->desconecta_mysql($link);
                            return false;
                            }
                    }else{
                        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
                        }
                }        
            }

        public function DeslogaUsuario() //Desconecta o acesso do usuario no sistema
            {
            // Apaga todas as variáveis da sessão
            $_SESSION = array();

            // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
            // Nota: Isto destruirá a sessão, e não apenas os dados!
            if (ini_get("session.use_cookies")) 
                {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
                }

            // Por último, destrói a sessão
            session_destroy();

            if(isset($_SESSION['id_usuario']))
                {
                return false;
                } else
                    return true;
            }

        public function AcessoUsuarioAdm(UsuarioVO $Usuario)
            {
            $nome = $Usuario->retornaNomeUsuario();
            $senha = $Usuario->retornaSenhaUsuario();

            $objDb = new database();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha' ";

            if($Resultado = mysqli_query($link, $sql))
                {
                if($Resultado)
                    {
                    $dados_usuario = mysqli_fetch_array($Resultado);
                    if($dados_usuario['id'] == 13)
                        {
                        $_SESSION['id_usuario'] = $dados_usuario['id'];
                        $_SESSION['usuario'] = $dados_usuario['nome'];
                        $_SESSION['email'] = $dados_usuario['email'];
                        $objDb->desconecta_mysql($link);
            
                        return true;
                        }else{
                            $objDb->desconecta_mysql($link);
                            return false;
                            }
                    }else{
                        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
                        }
                }
            }

        public function RecuperarUsuarios()
            {
            $objDb = new database();
            $link = $objDb->conecta_mysql();

            $sql = " SELECT id, nome FROM usuarios ";

            if($ConsultaUsuario = mysqli_query($link, $sql))
                {
                $Usuarios = mysqli_fetch_all($ConsultaUsuario, MYSQLI_ASSOC);
                return $Usuarios;
                }
            }
        }

?>