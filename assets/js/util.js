$(function () {

    $("#slt_departamento").change(cargarAptitudesSegunFamilia);

    if ($("#slt_departamento").val())
        cargarAptitudesSegunFamilia();


    
    function cargarAptitudesSegunFamilia() {


        $("#aptitudes").html("");

        if ($("#slt_departamento").val()) {


            $.ajax({

                url: "http://[::1]/Bolsa-de-trabajo/index.php/Ajax_controller/cargarAptitudesSegunFamilia",

                data: {id_familia: $("#slt_departamento").val()},

                type: 'POST',
                dataType: 'json',

                success: function (json) {

                    apElegidas = $("#aptitudeselegidas").val().split(",")
                    
                    arrayFin=[];
                    for (var i = 0; i < json.length; i++) {
                        check=""
                        for (var j = 0; j < apElegidas.length; j++) {
                            
                            if(json[i]["id_aptitud"]==apElegidas[j]){
                                check="checked";
                            }
                        }
                        
                        array=[json[i]["id_aptitud"],json[i]["descripcion"],check];
                        arrayFin.push(array)
                        
                    }

                    for (k = 0; k < arrayFin.length; k++) {
                        
                        var div = $("<div/>", {
                            'class': "col-md-4",
                            html: '<div class="form-check" ><label> <input class="form-check-input" name="aptitudes[]" type="checkbox" value="' + arrayFin[k][0] + '" '+arrayFin[k][2]+'> <span class="label-text">' + arrayFin[k][1] + '</span></label></div></div>'

                        })

                        div.appendTo("#aptitudes")
                    }

                },

                error: function (xhr, status) {
                    alert('Disculpe, existió un problema');
                },

            });
        }
    }


});