<!-- Sparkline Graphs -->
<!-- <script src="js/sparkline/sparkline.js"></script> -->
<script src="{{ asset('js/sparkline/retina.js') }}"></script>
<script src="{{ asset('js/sparkline/custom-sparkline.js') }}"></script>

<!-- jquery ScrollUp JS -->
<script src="{{ asset('js/scrollup/jquery.scrollUp.js') }}"></script>

<!-- D3 JS -->
<script src="{{ asset('js/d3/d3.v3.min.js') }}"></script>

<!-- D3 Power Gauge -->
<script src="{{ asset('js/d3/d3.powergauge.js') }}"></script>

<!-- D3 Meter Gauge Chart -->
<script src="{{ asset('js/d3/gauge.js') }}"></script>
<script src="{{ asset('js/d3/gauge-custom.js') }}"></script>

<!-- C3 Graphs -->
<script src="{{ asset('js/c3/c3.min.js') }}"></script>
<script src="{{ asset('js/c3/c3.custom.js') }}"></script>

<!-- NVD3 JS -->
<script src="{{ asset('js/nvd3/nv.d3.js') }}"></script>
<script src="{{ asset('js/nvd3/nv.d3.custom.boxPlotChart.js') }}"></script>
<script src="{{ asset('js/nvd3/nv.d3.custom.stackedAreaChart.js') }}"></script>

<!-- Horizontal Bar JS -->
<script src="{{ asset('js/horizontal-bar/horizBarChart.min.js') }}"></script>
<script src="{{ asset('js/horizontal-bar/horizBarCustom.js') }}"></script>

<!-- Gauge Meter JS -->
<script src="{{ asset('js/gaugemeter/gaugeMeter-2.0.0.min.js') }}"></script>
<script src="{{ asset('js/gaugemeter/gaugemeter.custom.js') }}"></script>

<!-- Calendar Heatmap JS -->
<!--<script src="{{ asset('js/heatmap/cal-heatmap.min.js') }}"></script>
    <script src="{{ asset('js/heatmap/cal-heatmap.custom.js') }}"></script>-->

<!-- Odometer JS -->
<!--<script src="{{ asset('js/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('js/odometer/custom-odometer.js') }}"></script>-->

<!-- Peity JS -->
<script src="{{ asset('js/peity/peity.min.js') }}"></script>
<script src="{{ asset('js/peity/custom-peity.js') }}"></script>

<!-- Circliful js -->
<script src="{{ asset('js/circliful/circliful.min.js') }}"></script>
<script src="{{ asset('js/circliful/circliful.custom.js') }}"></script>

<!-- Notifications JS -->
<script src="{{ asset('js/alertify/alertify.js') }}"></script>
<script src="{{ asset('js/alertify/alertify-custom.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>

@if (session('success'))
<script type="text/javascript">
	$(document).ready(function() {
			alertify.success('{{ trans('dashboard.change_password.message.success') }}');
	});
</script>
@endif

@if (session('error'))
	<script type="text/javascript">
		$(document).ready(function() {
			alertify.error('{{ trans('dashboard.change_password.message.error') }}');
		});
	</script>
@endif
