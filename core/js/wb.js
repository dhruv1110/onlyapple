$(document).ready(function(e) {
    $("body").append('<div class="wb-wrapper"></div');
	$(".wb-wrapper").append('<h5 class="wb-span">In Association With</h5>').append('<h3 class="wb-title">WEBBUDDS</h3>');
	var wb_wrapper_style = {
      width : "400px",
	  height : "400px",
	  position : "fixed",
	  bottom : "0",
	  right : "0",
	  background : "rgba(255,255,255,0.4)",
	  transform : "rotate(-45deg)",
	  "-webkit-transform" : "rotate(-45deg)",
	  "-mz-transform" : "rotate(-45deg)",
	  "margin-bottom" : "-200px",
	  "margin-right" : "-200px",
	  "text-align" : "center",
	  "box-shadow" : "5px 5px 90px #000",
	  "z-index" : "5000"
    };
	var wb_span_style = {
		color : "rgb(235,0,255)",
		"font-family" : "Roboto,arial,sans-serif",
		"font-size" : "23px !important"
	};
	
	var wb_title_style = {
		color : "#0088cc",
		"font-family" : "Roboto,arial,sans-serif",
		"font-weight" : "100",
		"margin" : "0",
		"padding" : "0",
		"font-size" : "37px !important"
	}

	$(".wb-wrapper").css(wb_wrapper_style);
	$(".wb-span").css(wb_span_style);
	$(".wb-title").css(wb_title_style);
});