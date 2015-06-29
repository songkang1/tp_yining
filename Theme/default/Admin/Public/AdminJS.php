        <!--百度文本编辑器-->
<!-- 加载编辑器的容器 -->

<!-- 配置文件 -->
<script type="text/javascript" src="<?php echo v_theme_url(); ?>/Admin/media/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo v_theme_url(); ?>/Admin/media/ueditor/ueditor.all.js"></script>















	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="media/js/excanvas.min.js"></script>

	<script src="media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.js" type="text/javascript"></script>   

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.russia.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.world.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.europe.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.germany.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.usa.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>  

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.flot.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.flot.resize.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.pulsate.min.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/date.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/daterangepicker.js" type="text/javascript"></script>     

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.gritter.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/fullcalendar.min.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/jquery.sparkline.min.js" type="text/javascript"></script>  

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/app.js" type="text/javascript"></script>

	<script src="<?php echo v_theme_url(); ?>/Admin/media/js/index.js" type="text/javascript"></script>        

	<!-- END PAGE LEVEL SCRIPTS -->  

	<script>

		jQuery(document).ready(function() {    

		   App.init(); // initlayout and core plugins

		   Index.init();

		   Index.initJQVMAP(); // init index page's custom scripts

		   Index.initCalendar(); // init index page's custom scripts

		   Index.initCharts(); // init index page's custom scripts

		   Index.initChat();

		   Index.initMiniCharts();

		   Index.initDashboardDaterange();

		   Index.initIntro();

		});

	</script>

	<!-- END JAVASCRIPTS -->




 