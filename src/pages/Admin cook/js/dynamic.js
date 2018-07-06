
$(document).ready(function () {

   for (const iterator of toCookarray) {
      console.log(iterator);
       $(".cookList").append("<li>" + iterator.id + " " + iterator.name + " " + iterator.tableno + "</li>");
   }

    for (const iterator of toDeliverarray) {
        $(".deliverList").append("<li>" + iterator.id + " " + iterator.name + " " + iterator.tableno + "</li>");
    }

 
    $(".cookList  li").click(function(){
        $(this).toggleClass("highlight");
        $(this).data('clicked',true);
    });

    $("#btn").click(function () {
        $(".cookList li").each(function (index) {
            if($(this).data('clicked')){
                var element=$(this).html().split(" ");
                console.log(element[0]);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "getData.php?element=" + element[0], false);
                xmlhttp.setRequestHeader("Content-type", "text/plain");
                xmlhttp.send();
                $(".deliverList").append("<li>" + $(this).html() + "</li>");
                $(this).remove();
                
            }
        });
    });

    $("#rstbtn").click(function () {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.open("GET", "getData.php?reset",false);
        xmlhttp.send();
        
        $(".deliverList li").each(function(){
            $(".cookList").append("<li>" + $(this).html() + "</li>");
            $(this).remove();
            
        });
        
    });

    
});