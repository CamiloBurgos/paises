<?php 

	$conexion=mysqli_connect('localhost','root','','pais_bd');

 ?>
<!DOCTYPE html>
<!--
    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>

<head>
        <!--
        Customize this policy to fit your own app's needs. For more guidance, see:
            https://github.com/apache/cordova-plugin-whipais_categoriaist/blob/master/README.md#content-security-policy
        Some notes:
            * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
            * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
            * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
                * Enable inline JS: add 'unsafe-inline' to default-src
            -->
            <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
            <meta name="format-detection" content="pais_categoriaephone=no">
            <meta name="msapplication-tap-highlight" content="no">
            <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
			<meta charset="UTF-8" />
            <!--<link rel="stylesheet" type="text/css" href="css/index.css"> -->
            <title>Paises app</title>
            <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="js/jquery.min.js"></script> 
            <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
          
			
         
        </head>
        <body>
        <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="index.html">Conociendo Paises</a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="opcion1.html">Opcion 1</a></li>
                        <li><a href="opcion2.php">Listar</a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>

              </div>
        </nav>
			<br>
				<center><table border="2" style="background-color:#D5DBDB;">
				
					<tr style="background-color:#AEB6BF;"> 
					
						<td><center><h2>Id</h2></center></td>
						<td><center><h2>Pais</h2></center></td>
						<td><center><h2>Capital</h2></center></td>
						<td><center><h2>Gentilicio</h2></center></td>						
					</tr>
					
					<?php 
					$sql="SELECT * from ciudades";
					$result=mysqli_query($conexion,$sql);

					while($mostrar=mysqli_fetch_array($result)){
					 ?>

					<tr>
						<td class="col-xs-2"><center><h4><?php echo $mostrar['ciudad_id'] ?></h4></center></td>
						<td class="col-xs-2"><center><h4><?php echo $mostrar['ciudad_pais'] ?></h4></center></td>
						<td class="col-xs-2"><center><h4><?php echo $mostrar['ciudad_nombre'] ?></h4></center></td>
						<td class="col-xs-2"><center><h4><?php echo $mostrar['ciudad_gente'] ?></h4></center></td>						
					</tr>
				<?php 
				}
				 ?>
				</table></center>

        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </body>
    </html>
