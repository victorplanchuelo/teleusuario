<script type="text/javascript">
	var datefield=document.createElement("input")
	datefield.setAttribute("type", "date")
</script>

<script>
	if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
		jQuery(function($){ //on document.ready

			$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '< Ant',
				nextText: 'Sig >',
				currentText: 'Hoy',
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
				weekHeader: 'Sm',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: '',

				setDate: new Date(),
				minDate: '-100Y',
				maxDate: new Date()
			};
			$.datepicker.setDefaults($.datepicker.regional['es']);

			$('#birthdate').datepicker();
			$('#birthdate').css('padding-top','7px');

		})
	}
</script>

<script type="text/javascript">
	$( document ).ready(function() {

		$('#birthdate').focus(function() {
			$(this).attr('placeholder', '');
		});

		$('.register').click(function() {
			if ($('#terms').is(':checked')) {
				$('#register').submit();
			} else {
				$('<div class="alert alert-danger"><ul><li>{{ trans('validation.terms') }}</li></ul></div>').insertBefore('#register');
				return false;
			}
		});
	});
</script>