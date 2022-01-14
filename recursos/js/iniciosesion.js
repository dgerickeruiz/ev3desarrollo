$(document).ready(function () {
	$('#entrar').click(function (e) {
		e.preventDefault();

		console.log($('input:radio[name=tipoUsuario]:checked').val());

		let user = $('#inptRut').val();
		let pass = $('#inptCon').val();
		let tipoUsuario = $('input:radio[name=tipoUsuario]:checked').val();

		let formData = new FormData();

		formData.append('user', user);
		formData.append('pass', pass);
		formData.append('tipoUsuario', tipoUsuario);

		setTimeout(function () {
			$.ajax({
				url: 'control/usuariocontrol.php?do=r',
				type: 'POST',
				dataType: 'json',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
			}).done(function (json) {
				if (json['resp']) {
					let mensaje = json['mensaje'];
					alert(mensaje);
					setTimeout(function () {
						window.location.replace('?vistas=r');
					}, 200);
				} else {
					let mensaje = json['mensaje'];
					alert(mensaje);
				}
			});
		}, 500);
	});
});
