	</main>

  </div>

	<script src="<?php echo get_template_directory_uri(); ?>/styleguide/prism.js"></script>

	<script>
	jQuery(document).ready(function($) {
		var ToC = "<nav role='navigation' class='style-guide-table-of-contents'>" +
		"<h5>On this page:</h5>" +
		"<ul>";

		var newLine, el, title, link;

		$(".style-guide-pattern-title").each(function() {

		el = $(this);
		title = el.text();

		idname = title.replace(/\s+/g, '-').toLowerCase();
		$(this).attr('id', idname);

		link = "#" + el.attr("id");

		newLine =
		"<li>" +
		  "<a href='" + link + "'>" +
			title +
		  "</a>" +
		"</li>";

		ToC += newLine;

		});

		ToC +=
		"</ul>" +
		"</nav>";

		$("body").prepend(ToC);


		// Scroll to Anchor Links
		$('.style-guide-table-of-contents a').click(function(event) {

			event.preventDefault();

			var full_url = this.href,
				parts = full_url.split('#'),
				trgt = parts[1],
				target_offset = $('#'+trgt).offset(),
				target_top = target_offset.top-80,
				main = $('.style-guide-table-of-contents ul');

			// Scroll on Click
			$('html, body').animate({scrollTop:target_top}, 1000);

			// Remove active class on any li when an anchor is clicked
			main.children().removeClass();

			// Add active class to clicked anchor's parent li
			$(this).parent().addClass('active');

		});
	});
	</script>

</body>
</html>