<?php
if(!isset($in_index))
	header('location:index.php') ;
?>
<div id="body_m">
<p id="background"></p>

<p id="right_bar"></p>


<div class="termip">
	Loading Scripts...
</div><div id="term_main_head" tabindex="1">
	bugBasters@gcelt: ~ <span id="red_term"></span><span id="yellow_term"></span><span id="green_term"></span>
</div>

<textarea id="text_inputs"></textarea>
<form action="" method="post">
<input type="hidden" name="name" id="ip_name" required />
<input type="hidden" name="id" id="ip_id" required />
<input type="submit" value="Start Hacking..." id="ip_btn" />
</form>

<img src="res/white_logo.png" id="logo_m" />
<span id="welcome_tag"></span>

<img src="res/map.jpg" id="map_main" />
<img src="res/map2.jpg" id="map_2" />
<img src="res/node.png" id="node_main" />
<div id="map_b"></div>

<div id="cover"></div>


<div id="left_code"></div>
</div>

<div id="time_h">00</div><span id="time_devider"> : </span><div id="time_m">00</div>


<script type="text/javascript" src="script/animate.js"></script>