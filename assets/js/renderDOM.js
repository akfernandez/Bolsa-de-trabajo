// Funciones de renderizado en pagina

function renderContenedor(id, clase, contenedor) {

    var div = crearContenedor(id, clase);
    return determinarRenderizado(div, contenedor);
}

function renderSelect(datos, name, seleccion, id, funcion, clase, readonly,
        contenedor) {

    var select = crearSelect(datos, name, seleccion, id, funcion, clase,
            readonly, false);
    return determinarRenderizado(select, contenedor);
}

function renderCheckbox(name, value, id, funcion, clase, contenedor) {

    var input = crearInput('CHECKBOX', name, value, id, funcion, clase, "", "");
    return determinarRenderizado(input, contenedor);
}

function renderBoton(value, id, funcion, clase, contenedor) {

    var input = crearInput('BUTTON', "", value, id, funcion, clase, "", "");
    return determinarRenderizado(input, contenedor);
}

function renderInput(name, value, id, funcion, clase, ancho, maximo, contenedor) {

    var input = crearInput('TEXT', name, value, id, funcion, clase, ancho,
            maximo);
    return determinarRenderizado(input, contenedor);
}

function renderInputReadOnly(name, value, id, funcion, clase, ancho, maximo, contenedor) {

    var input = crearInput('TEXT', name, value, id, funcion, clase, ancho, maximo);
    input.readOnly = true;
    return determinarRenderizado(input, contenedor);
}

function renderBotonImg(rutaImagen, id, funcion, clase, contenedor, alto) {

    var imagen = crearImagen(rutaImagen, id, clase, alto, "");
    if (funcion !== "")
        imagen.setAttribute('onClick', funcion);
    return determinarRenderizado(imagen, contenedor);
}

function renderTexto(etiqueta, texto, id, clase, contenedor) {

    var elemento = crearTexto(etiqueta, texto, id, clase);
    return determinarRenderizado(elemento, contenedor);
}

function renderLink(texto, direccion, id, clase, blank, contenedor) {

    var enlace = crearLink(texto, direccion, id, clase, blank);
    return determinarRenderizado(enlace, contenedor);
}

function renderImagen(rutaImagen, id, clase, alto, ancho, contenedor) {

    var imagen = crearImagen(rutaImagen, id, clase, alto, ancho);
    return determinarRenderizado(imagen, contenedor);
}

// Funciones de creacion de elementos de formulario

function crearContenedor(id, clase) {

    var div = document.createElement('DIV');
    if (id !== "")
        div.id = id;
    if (clase !== "")
        div.className = clase;

    return div;
}

function crearSelect(datos, name, seleccion, id, funcion, clase, readonly,
        multiple) {

    var select = document.createElement('SELECT');
    select.name = name;
    if (id !== "")
        select.id = id;
    if (clase !== "")
        select.className = clase;
    if (funcion !== "")
        select.setAttribute('onChange', funcion);
    if (readonly)
        select.disabled = true;
    if (multiple)
        select.multiple = true;
    var option;

    for (var d in datos) {
        option = document.createElement('OPTION');
        option.value = d;
        option.innerHTML = datos[d];
        if ((multiple && enCadena(seleccion, d))
                || (!multiple && seleccion == d))
            option.selected = "selected";

        select.appendChild(option);
    }

    return select;
}

function crearInput(tipo, name, value, id, funcion, clase, ancho, maximo) {

    var input = document.createElement('INPUT');
    var evento = tipo !== "BUTTON" ? "onChange" : "onClick";
    input.type = tipo;
    input.name = name;
    if (id !== "")
        input.id = id;
    if (funcion !== "")
        input.setAttribute(evento, funcion);
    if (clase !== "")
        input.className = clase;

    if (tipo === 'CHECKBOX') {
        input.checked = value;
    } else {
        if (ancho !== "" && ancho > 1)
            input.size = ancho;
        if (maximo !== "" && maximo > 1)
            input.maxLength = maximo;
        input.value = value;
    }

    return input;
}

function crearTexto(etiqueta, texto, id, clase) {

    var elemento = document.createElement(etiqueta);
    if (id !== "")
        elemento.id = id;
    if (clase !== "")
        elemento.className = clase;
    elemento.innerHTML = texto;

    return elemento;
}

function crearLink(texto, direccion, id, clase, blank) {

    var enlace = document.createElement('A');
    enlace.innerHTML = texto;
    enlace.href = direccion;
    if (id !== "")
        enlace.id = id;
    if (clase !== "")
        enlace.className = clase;
    if (blank)
        enlace.target = "_blank";

    return enlace;
}

function crearImagen(rutaImagen, id, clase, alto, ancho) {

    var imagen = document.createElement('IMG');
    imagen.src = rutaImagen;
    if (id !== "")
        imagen.id = id;
    if (clase !== "")
        imagen.className = clase;

    if (alto !== "" && alto > 1)
        imagen.height = alto;
    if (ancho !== "" && ancho > 1)
        imagen.width = ancho;

    return imagen;
}

// Otras funciones

function crearFilaTablaVacia(contenedor) {

    var fila = document.createElement('TR');
    var celda = document.createElement('TD');
    renderSalto(15, celda);

    fila.appendChild(celda);
    determinarRenderizado(fila, contenedor);
}

function crearFilaTabla(id) {

    var fila = document.createElement('TR');
    fila.id = id;
    return fila;
}

function crearCeldaTabla(clase, id) {

    var celda = document.createElement('TH');
    celda.className = clase;
    celda.id = id;
    return celda;
}

function renderSalto(alto, contenedor) {

    var salto = document.createElement('DIV');
    salto.innerHTML = "&nbsp;";
    salto.style.height = (alto !== "" && alto > 1) ? alto + "px" : "0px";

    return determinarRenderizado(salto, contenedor);
}

function renderSeparador(ancho, texto, clase, contenedor) {

    var contenido = texto !== "" ? texto : "&nbsp;";
    var span = renderTexto('SPAN', contenido, "", clase, "");
    span.style.padding = (ancho !== "" && ancho > 1) ? ancho + "px" : "0px";

    return determinarRenderizado(span, contenedor);
}

function determinarRenderizado(contenido, contenedor) {

    if (contenedor === "")
        return contenido;

    if (typeof (contenedor) === "string")
        contenedor = document.getElementById(contenedor);

    contenedor.appendChild(contenido);
}

