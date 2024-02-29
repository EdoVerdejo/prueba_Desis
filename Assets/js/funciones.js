$(document).ready(function(){
    base_url = location.href;
    $.ajax({
        method: "GET",
        async: false,
        url: base_url + "Regiones/listarRegiones",
        data: {}
    }).done(function( msg ) {
        result = JSON.parse(msg);
        for(var i=0;i<result.length;i++){
            $('#inputRegion').append("<option value='"+result[i]["id_region"]+"'> "+result[i]["nombre"]+" </option>");
        }
    });

    $('#inputRegion').on( "change", function() {
        $('#inputComuna').empty().append("<option value='' >Seleccione Comuna</option>");
        let region = $('#inputRegion').val();
        $.ajax({
            method: "POST",
            url: base_url + "Comunas/listarComunas",
            data: { "region" : region}
        }).done(function( msg ) {
            result = JSON.parse(msg);
            for(var i=0;i<result.length;i++){
                $('#inputComuna').append("<option value='"+result[i]["id_comuna"]+"'> "+result[i]["nombre"]+" </option>");
            }
        });
    } );

    $.ajax({
        method: "GET",
        async: false,
        url: base_url + "Candidatos/listarCandidatos",
        data: {}
    }).done(function( msg ) {
        result = JSON.parse(msg);
        for(var i=0;i<result.length;i++){
            $('#inputCandidato').append("<option value='"+result[i]["id_candidato"]+"'> "+result[i]["NombreApellido"]+" </option>");
        }
    });

    $.ajax({
        method: "GET",
        async: false,
        url: base_url + "ComoSeEntero/listarComoSeEntero",
        data: {}
    }).done(function( msg ) {
        result = JSON.parse(msg);
        for(var i=0;i<result.length;i++){
            txt = "<div class='form-check form-check-inline'>";
            txt = txt + "<input class='form-check-input' name='checkComo' type='checkbox' id='inlineCheckbox"+result[i]["ID"]+"' value='"+result[i]["ID"]+"'></input>";            
            txt = txt + "<label class='form-check-label' for='inlineCheckbox"+result[i]["ID"]+"'>"+result[i]["nombre"]+"</label> ";
            txt = txt + "</div>";
            $('#checkboxs').append(txt);
        }
    });
});

function buscarRut(v_rut) {
    let existe = false;
    let persona = null;
    $.ajax({
        method: "POST",
        async: false,
        url: base_url + "Personas/buscarRut",
        data: { "rut": v_rut}
    })
        .done(function( msg ) {
            
            console.log(msg.length);

        if(msg !== 'false'){
            persona = JSON.parse(msg);
            //console.log(persona);
            existe = true;            
        }
    });

    result = {"persona": persona, "existe": existe};
    return result;
}

var Fn = {
    validaRut: function(rutCompleto) {
        if (!/^[0-9]+-[0-9kK]{1}$/.test(rutCompleto))
            return false;
        var tmp = rutCompleto.split('-');
        var digv = tmp[1];
        var rut = tmp[0];
        if (digv == 'K') digv = 'k';
        return (Fn.dv(rut) == digv);
    },
    dv: function(T) {
        var M = 0,
            S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + T % 10 * (9 - M++ % 6)) % 11;
        return S ? S - 1 : 'k';
    }
}

function validateNumbersAndCharacters(msg) {
    var re1 = /^[a-z0-9]*$/i;

    return msg.match(re1) !== null && msg.replace(/[^0-9]/g,"").length > 0 && msg.replace(/[^a-z]/ig,"").length > 0;
}

function validarCorreo(mail){
    reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return reg.test(mail);
}

function registrarPersona(e) {
    e.preventDefault();
    quitarAlerta();
    base_url = location.href;
    const nombreApellido = document.getElementById("nombreApellido");
    const alias = document.getElementById("alias");
    const rut = document.getElementById("rut");
    const email = document.getElementById("inputEmail");
    const region = document.getElementById("inputRegion");
    const comuna = document.getElementById("inputComuna");
    const candidato = document.getElementById("inputCandidato");

    const checkboxs = $("input[name='checkComo']");

    if(nombreApellido.value == ""){
        nombreApellido.classList.add("is-invalid"); 
        alert('El nombre y apellido no debe estar vacío.');
        return;
    }

    if(!validateNumbersAndCharacters(alias.value)){
        alias.classList.add("is-invalid"); 
        alert('El campo alias debe tener letras y números.');
        return;
    }

    if(alias.value.length <= 5){
        alias.classList.add("is-invalid"); 
        alert('El campo alias debe tener más de 5 carácteres (letras y números).');
        return;
    }

    rut.value = rut.value.replaceAll(".", "");
    if(!Fn.validaRut(rut.value)){
        rut.classList.add("is-invalid"); 
        alert('El formato de Rut es incorrecto.');
        return;
    }

    existe = buscarRut(rut.value)["existe"];

    if(existe){
        rut.classList.add("is-invalid"); 
        alert('El rut '+rut.value+' ya registró una votación.');
        return;
    }

    if(!validarCorreo(email.value)){
        email.classList.add("is-invalid"); 
        alert('EL formato de email no es válido.');
        return;
    }

    if(region.value == ""){
        region.classList.add("is-invalid"); 
        alert('Seleccione una región por favor.');
        return;
    }

    if(comuna.value == ""){
        comuna.classList.add("is-invalid");
        alert('Seleccione una comuna por favor.');
        return;
    }

    if(candidato.value == ""){
        candidato.classList.add("is-invalid");
        alert('Seleccione un candidato por favor.');
        return;
    }

    if(checkboxs.filter(":checked").length < 2){
        alert(`"Cómo se enteró de nosotros": Debe al menos elegir dos opciones.`);
        return;
    }
    
    const url = base_url + "Personas/insert";
    const frm = document.getElementById("frmPersonas");
    const http = new XMLHttpRequest();
    console.log(http);
    http.open("POST", url, false);
    http.send(new FormData(frm));
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);

            if(res == "si"){
                alert("Voto registrado con éxito.");
            }else{
                alert("Error al registrar voto.");
                return;
            }
        }
    }
    alert("Voto registrado con éxito.");
    id_persona = buscarRut(rut.value)["persona"]["ID"];

    $("input[name='checkComo']:checked").each(function(){
        como_se = $(this).val();

        $.ajax({
            method: "POST",
            url: base_url + "ComoSeEntero/insert",
            data: { "persona" : id_persona, "como_se_entero": como_se}
        }).done(function( msg ) {
            result = JSON.parse(msg);
            console.log(result);
        });
    });

    limpiarForm();
}

function limpiarForm(){
    $("#nombreApellido").val("");
    $("#alias").val("");
    $("#rut").val("");
    $("#inputEmail").val("");
    $("#inputRegion").val("");
    $("#inputComuna").val("");
    $("#inputCandidato").val("");

    $("input[name='checkComo']:checked").each(function(){
        $(this).prop("checked", false);
    });
}

function quitarAlerta() {
    $("#nombreApellido").removeClass("is-invalid");
    $("#alias").removeClass("is-invalid");
    $("#rut").removeClass("is-invalid");
    $("#inputEmail").removeClass("is-invalid");
    $("#inputRegion").removeClass("is-invalid");
    $("#inputComuna").removeClass("is-invalid");
    $("#inputCandidato").removeClass("is-invalid");
}