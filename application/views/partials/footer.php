

</div><!-- /.wrapper -->
<input type="hidden" id="bu" value="<?= base_url() ?>">
<script src="<?= asset_url('js/jquery.min.js') ?>"></script>
<script src="<?= asset_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= asset_url('js/detect.js') ?>"></script>
<script src="<?= asset_url('js/fastclick.js') ?>"></script>
<script src="<?= asset_url('js/jquery.slimscroll.js') ?>"></script>
<script src="<?= asset_url('js/jquery.blockUI.js') ?>"></script>
<script src="<?= asset_url('js/waves.js') ?>"></script>
<script src="<?= asset_url('js/wow.min.js') ?>"></script>
<script src="<?= asset_url('js/jquery.nicescroll.js') ?>"></script>
<script src="<?= asset_url('js/jquery.scrollTo.min.js') ?>"></script>
<script src="<?= asset_url('plugins/peity/jquery.peity.min.js') ?>"></script>
<script src="<?= asset_url('plugins/waypoints/lib/jquery.waypoints.min.js') ?>"></script>
<script src="<?= asset_url('plugins/counterup/jquery.counterup.min.js') ?>"></script>
<script src="<?= asset_url('plugins/raphael/raphael-min.js') ?>"></script>
<script src="<?= asset_url('plugins/jquery-knob/jquery.knob.js') ?>"></script>
<script src="<?= asset_url('js/jquery.core.js') ?>"></script>
<script>
$(function() {
	$.getScript($('#bu').val() + 'public/plugins/morris/morris.js');
	$.getScript($('#bu').val() + 'public/pages/jquery.dashboard.js');
	$.getScript($('#bu').val() + 'public/js/jquery.app.js');
	$('.counter').counterUp({
		delay: 100,
		time: 1200
	});
	$(".knob").knob();
});
</script>
</body>
</html>
