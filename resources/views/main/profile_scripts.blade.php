<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
	function calculateAge(birthDay){
		var now = new Date();
		var b_split = birthDay.split('/');
		if(b_split.length==3){
			var birthDate = new Date(b_split[2], b_split[1]*1-1, b_split[0]);
			var age = Math.floor((now.getTime() - birthDate.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
			return age;
		}
		return 0;
	}

	$(document).ready(function(){
		$("#age").val(calculateAge($("#birthdate").val()));
	});
</script>