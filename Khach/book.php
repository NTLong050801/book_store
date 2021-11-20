<?php include('../Parital/header.php') ?>
<div id="target" style="overflow: scroll; width: 200px; height: 100px;">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
  sed do eiusmod tempor incididunt ut labore et dolore magna
  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
  ullamco laboris nisi ut aliquip ex ea commodo consequat.
  Duis aute irure dolor in reprehenderit in voluptate velit
  esse cillum dolore eu fugiat nulla pariatur. Excepteur
  sint occaecat cupidatat non proident, sunt in culpa qui
  officia deserunt mollit anim id est laborum.
</div>
<div id="other">
  Trigger the handler
</div>
<div id="log"></div>
<script>
    $( "#target" ).scroll(function() {
  $( "#target" ).append( "<div>Handler for .scroll() called.</div>" );
});
</script>