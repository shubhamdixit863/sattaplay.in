<script type="text/javascript">
<!--

var d = new Date();
var curr_hour = d.getHours();
var curr_min = d.getMinutes();

var curr_sec = d.getSeconds();

var final_time=curr_hour + ":" + curr_min + ":"
+ curr_sec;
//document.write(final_time);
//-->


var md="23:59:59"
var chk="00:0:00";
var disawar="02:0:00";
var dl="13:0:00";
var fd="17:0:00";
var gz="18:30:00";
var x="22:0:00";
var gali="22:0:00";

if (final_time < disawar && final_time >chk ) {
$("#lotteryname option[value='02:00:00']").attr("selected","selected");
}

else if (final_time < dl && final_time>disawar ) {
  $("#lotteryname option[value='02:00:00']").remove();
$("#lotteryname option[value='13:00:00']").attr("selected","selected");
}

else if (final_time < fd && final_time>dl  ) {
    $("#lotteryname option[value='02:00:00']").remove();
  $("#lotteryname option[value='13:00:00']").remove();
$("#lotteryname option[value='17:00:00']").attr("selected","selected");
}

else if (final_time < gz && final_time >fd) {
  $("#lotteryname option[value='02:00:00']").remove();
$("#lotteryname option[value='13:00:00']").remove();
  $("#lotteryname option[value='17:00:00']").remove();
$("#lotteryname option[value='18:30:00']").attr("selected","selected");
}
else if (final_time < x && final_time >gz) {
  $("#lotteryname option[value='02:00:00']").remove();
$("#lotteryname option[value='13:00:00']").remove();
  $("#lotteryname option[value='17:00:00']").remove();
  $("#lotteryname option[value='18:30:00']").remove();
$("#lotteryname option[value='22:00:00']").attr("selected","selected");
}
else if (final_time < gali && final_time >x) {
  $("#lotteryname option[value='02:00:00']").remove();
$("#lotteryname option[value='13:00:00']").remove();
  $("#lotteryname option[value='17:00:00']").remove();
  $("#lotteryname option[value='18:30:00']").remove();
  $("#lotteryname option[value='22:00:00']").remove();
$("#lotteryname option[value='22:00:00']").attr("selected","selected");
$("<option>").val("Foo").text("Bar").appendTo("#nextday");
}
else if (final_time<md) {
  $("#lotteryname option[value='02:00:00']").remove();
  $("#lotteryname option[value='13:00:00']").remove();
  $("#lotteryname option[value='17:00:00']").remove();
  $("#lotteryname option[value='18:30:00']").remove();
  $("#lotteryname option[value='22:00:00']").remove();
  $("#lotteryname option[value='22:00:00']").remove();
}


//var goingtime = $('#lotteryname option:selected').val();

</script>
