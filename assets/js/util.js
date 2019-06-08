$(function () {


    var aptitudes = JSON.parse($("#inp_ap_id").val());



    cargarAptitudesSegunFamilia();
    anadirSeleccionado();
    $("#slt_departamento").change(cargarAptitudesSegunFamilia);



//
//
//    if ($("#aptitudeselegidas").val() != "") {
//        obj = JSON.parse($("#aptitudeselegidas").val())
//        json = JSON.stringify(obj);
//        $("#ap").val(json);
//
//
//    }


    $("#aptitudes").on("click", ".checks_ap ", function () {

        for (var i = 0; i < aptitudes.length; i++) {
            if (aptitudes[i]["id_aptitud"] == $(this).val()) {

                aptitudes[i]["checked"] = aptitudes[i]["checked"] == 1 ? 0 : 1
            }

        }
        anadirSeleccionado()
        $("#inp_ap_id").val(JSON.stringify(aptitudes))

    })


    $("#aptitudesseleccionadas").on("click", " .borraraptitud", function () {

        for (var i = 0; i < aptitudes.length; i++) {
            if (aptitudes[i]["id_aptitud"] == $(this).val()) {

                aptitudes[i]["checked"] = 0

                $(".checks_ap[value=" + aptitudes[i]["id_aptitud"] + "]").prop("checked", false)
            }

        }
        anadirSeleccionado()
        $("#inp_ap_id").val(JSON.stringify(aptitudes))

    })


    $("#resgistro_sub").click(function () {
        var vacio = true
        for (var i = 0; i < aptitudes.length; i++) {
            if (aptitudes[i]["checked"] == 1)
                vacio = false
        }

        if (vacio)
            $("#inp_ap_id").val("")
    })



    function anadirSeleccionado() {
        $("#aptitudesseleccionadas").html("")
        for (var i = 0; i < aptitudes.length; i++) {
            if (aptitudes[i]["checked"] == 1) {
                if ($("#inputPassword").prop("readonly") == false) {
                    var div = $("<div/>", {
                        'class': "col-md-4 col-6",

                        html: '<button type="button" class="borraraptitud" value="' + aptitudes[i]["id_aptitud"] + '" ><span >×</span></button>' + aptitudes[i]["descripcion"]

                    })
                    div.appendTo("#aptitudesseleccionadas")
                }else{
                    var div = $("<div/>", {
                        'class': "col-md-4 col-6",

                        html:  aptitudes[i]["descripcion"]

                    })
                    div.appendTo("#aptitudesseleccionadas")
                }
            }
        }
    }



    function cargarAptitudesSegunFamilia() {


        $("#aptitudes").html("");

        for (var i = 0; i < aptitudes.length; i++) {

            if (aptitudes[i]["familia_id"] == $("#slt_departamento").val() || $("#slt_departamento").val() == 0) {

                var div = $("<div/>", {
                    'class': "col-md-4",
                    html: '<div class="form-check" ><label> \n\
                               <input class="form-check-input checks_ap" name="aptitudes[]" type="checkbox" \n\
                               value="' + aptitudes[i]["id_aptitud"] + '" ' + (aptitudes[i]["checked"] == 1 ? "checked" : "") + ' >\n\
                               <span class="label-text">' + aptitudes[i]["descripcion"] + '</span></label></div></div>'

                })
                div.appendTo("#aptitudes")
//                    renderContenedor("div_aptitudesCheckbox_id", "form-check", "aptitudes")
//                    renderCheckbox("aptitudes[]", aptitudes[i]["id_aptitud"], "", "", "form-check-input checks_ap", "div_aptitudesCheckbox_id")
////                    determinarRenderizado(contenido, contenedor)

            }

        }


    }


});