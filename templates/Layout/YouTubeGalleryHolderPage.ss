$Content
<ul id="YouTubeGalleryPageUL">
<% control YouTubeGalleryPageChildren %>
	<li>
		<h2><a href="$Link" class="youTubeGalleryPageLink" rel="$URLSegment">$Title</a></h2>
		<div id="YouTubeGalleryPage-$URLSegment" class="youTubeGalleryPageDetailSection">
			<div class="YouTubeGalleryPageVid"><% include YouTubeVideoOne %></div>
			<div class="YouTubeGalleryPageContentSection">$Content</div>
		</div>
	</li>
<% end_control %>
</ul>
$Form
