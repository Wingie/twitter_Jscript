<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	var user = "<?php echo $_GET['user'] ?>";
	$.getJSON('http://twitter.com/status/user_timeline/'+ user +'.json?count=200&callback=?', function(data){
		$.each(data, function(index, item){
			if(get_time(item.created_at)<=7){
			$('#twitter').append('<div class="tweet"><p>' + item.text + '</p><p><strong>' + get_time(item.created_at) + ' Days ago</strong></p></div>');
			}
		});

	});

	function get_time(time_value) {
	  var c = time_value.split(" ");
	  time_value = c[1] + " " + c[2] + ", " + c[5] + " " + c[3];
	  var parsed_date = Date.parse(time_value);
	  var rel_to = (arguments.length > 1) ? arguments[1] : new Date();
	  var del = parseInt((rel_to.getTime() - parsed_date) / 1000);
	  del = del + (rel_to.getTimezoneOffset() * 60);
	  var r = 0;
	  if(del < (48*60*60)) {
		r = 1
	  } else {
		r = (parseInt(del / 86400));
	  }

	  return r;
	}

});
	</script>
<body>

    <div id="twitter">
	</div>
</body>