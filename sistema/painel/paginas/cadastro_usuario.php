
<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>


<div class="main-page signup-page">
                <h2 class="title1">Cadastrar</h2>
                <div class="sign-up-row widget-shadow">
                    <h5>Informações pessoais :</h5>
                <form action="#" method="post">
                    <div class="sign-u">
                                <input type="text" name="name" placeholder="Nome" required="">
                        <div class="clearfix"> </div>
                    </div>

                    <div class="sign-u">
                                <input type="email" placeholder="Email" required="">
                        <div class="clearfix"> </div>
                    </div>
                    
                    <h6>Informações de Login :</h6>
                    <div class="sign-u">
                                <input type="text" placeholder="Matricula" required="">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                                <input type="password" placeholder="Senha" required="">
                        </div>
                        <div class="clearfix"> </div>
                    <div class="sub_home">
                            <input type="submit" value="Enviar">
                        <div class="clearfix"> </div>
                    </div>                  
                </form>
                </div>

            </div>       
        