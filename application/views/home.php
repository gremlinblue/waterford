<script type="text/javascript">
function show_partial(container){

    $(container).attr("style","height:380px;overflow:hidden");
	$(container).siblings('a').toggle(
	  function() { $(container).removeAttr("style"); },
      function() { $(container).attr("style","height:380px;overflow:hidden").fadeIn(); }
    );

}

$(document).ready(function() {
  show_partial($("article"));
});
</script>
<article>
	<h3>Our Pledge</h3>
	<p>
		Lorem ipsum dolor sit amet, consectetuer adipiscing
		 elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna 
		aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
		 tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo 
		consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate 
		velit esse molestie consequat, vel illum dolore eu feugiat nulla 
		facilisis at vero eros et accumsan et iusto odio dignissim qui blandit 
		prae sent luptatum zzril delenit augue duis dolore te feugait nulla 
		facilisi.
	</p>
	<p>
		Lorem ipsum dolor sit amet, consectetuer adipiscing
		 elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna 
		aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
		 tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo 
		consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate 
		velit esse molestie consequat, vel illum dolore eu feugiat nulla 
		facilisis at vero eros et accumsan et iusto odio dignissim qui blandit 
		prae sent luptatum zzril delenit augue duis dolore te feugait nulla 
		facilisi.
	</p>
	<p>
		Lorem ipsum dolor sit amet, consectetuer adipiscing
		 elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna 
		aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
		 tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo 
		consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate 
		velit esse molestie consequat, vel illum dolore eu feugiat nulla 
		facilisis at vero eros et accumsan et iusto odio dignissim qui blandit 
		prae sent luptatum zzril delenit augue duis dolore te feugait nulla 
		facilisi.
	</p>
</article>
<a href="" class="button">Read More</a>

