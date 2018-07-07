
$(document).ready(function () {

    //Update the to cook list
   for (const iterator of toCookarray) {
      console.log(iterator);
       $(".cookList").append("<li>" + iterator.id + " " + iterator.name + " " + iterator.tableno + "</li>");
   }
   //Update the to deliver list
    for (const iterator of toDeliverarray) {
        $(".deliverList").append("<li>" + iterator.id + " " + iterator.name + " " + iterator.tableno + "</li>");
    }

    //Update css when list item of the to cook list is selected
    $(".cookList  li").click(function(){
        $(this).toggleClass("highlight");
        $(this).data('clicked',true);
    });


    //when 'prepared' button is clicked,iterate through all the selected elements and hit get requests to update the PHP lists
    $("#btn").click(function () {
        $(".cookList li").each(function (index) {
            if($(this).data('clicked')){
                var element=$(this).html().split(" ");
                //console.log(element[0]);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "getData.php?element=" + element[0], false);   //element[0] is the id number of a given list item in cook list
                xmlhttp.setRequestHeader("Content-type", "text/plain");
                xmlhttp.send();
                $(".deliverList").append("<li>" + $(this).html() + "</li>");
                $(this).remove();
                
            }
        });
    });


    //when 'reset' button is clicked update the PHP arrays and then remove all items from to deliver list and add back to cook list
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