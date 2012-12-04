
jQuery(document).ready(
	function() {
		YouTubeGalleryPage.init();
	}
);

var YouTubeGalleryPage = {

	sectionSelector: ".youTubeGalleryPageDetailSection",

	linkSelector: ".youTubeGalleryPageLink",

	sectionIDprefix: "#YouTubeGalleryPage-",

	init: function () {
		jQuery(YouTubeGalleryPage.sectionSelector).hide();
		jQuery(YouTubeGalleryPage.linkSelector).click(
			function() {
				var rel = jQuery(this).attr("rel");
				jQuery(YouTubeGalleryPage.sectionSelector).fadeOut(
					function() {
						jQuery(YouTubeGalleryPage.sectionIDprefix+rel).fadeIn();
					}
				);
				return false;
			}
		);
		jQuery(".first "+YouTubeGalleryPage.linkSelector).click();
	}

}