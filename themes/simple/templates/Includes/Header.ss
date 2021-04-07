<header class="header" role="banner">
	<div class="inner">
		<div class="unit size4of4 lastUnit">
		<% with $SiteConfig %>
			<a href="$BaseHref" class="brand" rel="home">
				<% if $Logo %>
				<img src="$Logo.URL" />
				<% end_if %>
				<% if $HeaderActionURL %>
					<a href="$HeaderActionURL" class="action-header">$HeaderActionText</a>
				<% end_if %>
			</a>
		<% end_with %>
			<% if $SearchForm %>
				<span class="search-dropdown-icon">L</span>
				<div class="search-bar">
					$SearchForm
				</div>
			<% end_if %>
			<% include Navigation %>
		</div>
	</div>
</header>
<% include Banner %>
