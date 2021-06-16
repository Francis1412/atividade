<!DOCTYPE html>
<html>
<head>
	<title>notice aqui</title>
</head>
<body>

	<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
		}
		body{
			background-image: url(background.jpeg);
			background-size: cover;
		}

		#nav{
			position: absolute;
			top: 10px;
			left: 20px;
			width: 90%;
			height: 160px;
			background-color: #D3D3D3;
		}

		.cimagem{
			width: 160px;
			height: 155px;
		}

		#centro{
			position: absolute;
			visibility: visible;
			top:180px;
			left: 13%;
			width: 70%;

			text-align: center;
			background-color: #D3D3D3;
			z-index:2;
		}
		#esquerda{

		}

		.principal{
			padding-left: 25%;
			padding-right: 25%;
		}

		#baixo{
			margin-top: 70%;
			height: 50px;
			background-color: black;
		}

	</style>
 
    <?php

        $con = mysqli_connect("localhost", "root", "", "noticias1");
        
        $buscanoticia = "select * from noticias order by idnoticias DESC limit 5";
        
        $result = mysqli_query($con, $buscanoticia);
        
        $linhas = mysqli_num_rows($result);
        
    ?>

	<div id="nav">
		<table 	border="0" width="100%">
			<tr>
				<td><img class="cimagem" src="icon.png"></td>
				<td style="font-size: 25px;"><center>Notice aqui</td>
			</tr>
		</table>

			<div id="esquerda">
				<a href="add.php">Crie suas noticias</a>
			</div>
	</div>


	<div id="centro">
		<table 	border="1" width="100%" class="principal">
		    <?php
                            for($i=0; $i<$linhas; $i++){
                                $colunas = mysqli_fetch_array($result);
                                $titulo = $colunas['titulo'];
                                $resumo = $colunas['resumo'];
                                $imagens = $colunas['imagem'];
                                
                                if($imagens==""){
                                    
                                }else{
            ?>
                    	<tr>
				<td width="30%"><img class="cimagem" src="imagens/<?php echo $imagens; ?>"></td>
			</tr>
                                <?php } ?>
			<tr>
                            <td style="height: 81px;">
                                <p style="font-size: 25px;"><?php echo "$titulo"; ?></p>
                                <p  style="font-size: 18px; margin-top: 20px;"><?php echo "$resumo<br><br>"; ?></p>
                            </td>
			</tr>
                    <?php
                    }
                    ?>
		</table>
	</div>

	<div id="baixo">
		<p style="color: gray;">made by: Francisco Gregorio Batista Almeida</p>
	</div>


</body>
</html>