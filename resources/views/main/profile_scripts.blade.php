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

		$("#upload-image").click(function(e) {
			$("#user_image").click();
			e.preventDefault();
		});


		$('#user_image').change(function (e) {
			$(".upload").submit();
			e.preventDefault();
		});


		$('.upload').submit(function(e) {
			var file_data = $('#user_image').prop('files')[0];
			var form_data = new FormData();
			form_data.append('file', file_data);

			$('.progress').show();

			$.ajax({
				type:'POST',
				url: this.action,
				data:form_data,
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					if(myXhr.upload){
						myXhr.upload.addEventListener('progress',function(){
							if(e.lengthComputable){
								var max = e.total;
								var current = e.loaded;

								var Percentage = (current * 100)/max;
								$('.progress-bar').attr("aria-valuenow", Percentage).css('width', Percentage+'%').text(Percentage+'%');

								if(Percentage === 100)
								{
									$('.progress').hide().attr("aria-valuenow", '0').css('width', '0%').text('0%');
								}
							}
						});
					}
					return myXhr;
				},
				cache:false,
				contentType: false,
				processData: false,

				success:function(data){
					console.log(data);

					alert('data returned successfully');

				},

				error: function(data){
					console.log(data);
				}
			});

			e.preventDefault();
		});
	});
</script>