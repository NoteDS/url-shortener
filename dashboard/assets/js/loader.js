$(window).on('load',function(){
	setTimeout(function(){
	$('.page-loader').fadeOut('slow');
	},600);
});

var texts = new Array();
texts.push("Loading");
texts.push("Loading.");
texts.push("Loading..");
texts.push("Loading...");

var point = 0;

function changeText(){
  $('.txt').html(texts[point]);
  if(point < 3){
    point ++;
  }else{
    point = 0;
  }
  setTimeout(changeText, 180)
}

changeText();
