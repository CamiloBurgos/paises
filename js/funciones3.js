	$(document).ready(ClickElemento);
	 var id = getParameterByName('id');

    function verPaises(action, ccid){
        var datay = {"ccId": id,
                     "Accion":"obtener"
                    };
                    console.log(datay);
        $.ajax({
            data: datay, 
            type: "POST",
            dataType: "json", 
            url: "controllers/controllerpaises.php",
        })

	function ClickElemento()
	{
		var texto = $("#obtenerDato").val();
		if(texto == "")
		{
			$("#obtenerDato").val(data.datos.cc_categoria_nombre);
		}
		else
		{
			alert(texto);
		}
	}
  