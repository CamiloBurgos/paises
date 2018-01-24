$(document).ready(function(){
   
        var getlista = function (){
            var datax = {
                "Accion":"listar"
            }
            $.ajax({
                data: datax, 
                type: "GET",
                dataType: "json", 
                url: "controllers/controllerciudades.php", 
            })
            .done(function( data, textStatus, jqXHR ) {
                $("#listado1").html("");
                if ( console && console.log ) {
                    console.log( " data success : "+ data.success 
                        + " \n data msg : "+ data.message 
                        + " \n textStatus : " + textStatus
                        + " \n jqXHR.status : " + jqXHR.status );
                }
						for(var i=0; i<data.datos.length;i++){
					
                                fila ='<tr><td class="col-xs-2"><center><h4>'+data.datos[i].id+'</h4></center></td>';
                                fila +='<td class="col-xs-2"><center><h4>'+data.datos[i].pais+'</h4></center></td>';
                                fila +='<td class="col-xs-2"><center><h4>'+data.datos[i].nombre+'</h4></center></td>';
                                fila +='<td class="col-xs-2"><center><h4>'+data.datos[i].gente+'</h4></center></td>';                      
                                fila +='</tr><br>';
                                $("#listado1").append(fila);
                }
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( " La solicitud getlista ha fallado,  textStatus : " +  textStatus 
                        + " \n errorThrown : "+ errorThrown
                        + " \n textStatus : " + textStatus
                        + " \n jqXHR.status : " + jqXHR.status );
                }
            });
        }
        getlista();
    });
   