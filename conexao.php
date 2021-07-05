<?php 
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("BASE", "agenda");

    $link = mysqli_connect(HOST, USER, PASS, BASE);

    if(mysqli_connect_errno()){
        echo "Falha na conexão com banco de dados!";
    }else{
        //echo "Conexão estabelecida com sucesso";
    }
?>