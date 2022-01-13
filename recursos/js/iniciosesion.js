
$(document).ready(function() {
    $("#entrar").click(function(e) {
        e.preventDefault();

        let user = $("#inptRut").val();
        let pass = $("#inptCon").val();

        let formData = new FormData();

        formData.append("user", user); 
        formData.append("pass", pass);

        setTimeout(function() {
            $.ajax({
                url: "control/usuariocontrol.php?do=r",
                type: "POST",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(json) {
                if (json['resp']) {
                    let mensaje = json['mensaje'];
                    alert(mensaje);
                    setTimeout(function() {
                        window.location.replace("vistas/principal.php");
                    }, 3000);
                } else {
                    let mensaje = json['mensaje'];
                    alert(mensaje);
                }
            });
        }, 500);

    });
});