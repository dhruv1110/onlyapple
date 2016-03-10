count=function(element){
			var total_r=0;
			if(element==null)
			{
				return 0;
			}
			else
			{
			$.each(element,function(key,value){total_r++;});
			return total_r;
			}
		}
		
$(document).ready(function(e) {
    $(".dropdown").hover(function(e) {
        $(this).addClass("open");
    });
});


