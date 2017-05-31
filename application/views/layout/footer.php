
<!-- END CONTENT -->
</div>

<!-- Scripts -->
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";
</script>
<script type="text/javascript" src="<?= base_url('assets/js/script.min.js') ?>"></script>
<script type="text/javascript">
	function toastrMessage(message, status){
		status = status ? status : 'info';

		toastr[status](message);

		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	}
</script>
</body>
</html>
