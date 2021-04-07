<footer class="footer" role="contentinfo">
	<div class="inner">
		<% with $SiteConfig %>
		<% if $Copyrights %>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<p class="copyright">$Copyrights</p>
			</div>
		<% end_if %>
		<div class="col-sm-4 col-md-4 col-lg-4">
			<p class="footer-phone">
				CALL <a href="tel:$Phone">$Phone</a>
			</p>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4">
			<ul class="social-links">
				<% loop $SocialLinks %>
					<li>
						<a href="$SocialLink">
							<% if $SocialLogo %><img src="$SocialLogo.URL" /><% end_if %>
						</a>
					</li>
				<% end_loop %>
			</ul>
		</div>
		<% end_with %>
	</div>
</footer>
