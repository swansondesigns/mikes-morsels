<?php
/**
 * The template for displaying the footer.
 */

?>

<?php if ( is_active_sidebar( 'pinbin_footer')) { ?>     
   <div id="footer-area">
			<?php dynamic_sidebar( 'pinbin_footer' ); ?>
        </div><!-- // footer area with widgets -->   
<?php }  ?>           
<footer class="site-footer">
	 <div id="copyright">
	 	&copy; <?php echo date('Y'); ?> Mike Hall
	 </div><!-- // copyright -->   
</footer>     
</div><!-- // close wrap div -->   

<?php wp_footer(); ?>
	
</body>
</html>

