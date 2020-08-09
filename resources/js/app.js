require('./bootstrap');
setInterval(function(){
  $("#time").html(new Date().toGMTString())
},1000)
