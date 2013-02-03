$(document).load(function() {
    $("form.convertfrom").submit(function() {
        $.post($(this).attr("action"), $(this).serialize(), function(data) {
            if(data.error) {
                $("#error #message").html(data.message);
                $("#error").modal("show");
            } else {

                if($(".hero-unit.from").css("height") == "200px") {
                    $(".hero-unit.from").animate({height:"0px", opacity:"0"}, function() {
                        $(".hero-unit.from #simoleons").html(data.simoleons);
                        $(".hero-unit.from #amount").html(data.char + data.amount);
                        $(".hero-unit.from").animate({"height":'200px', "opacity":"1"});
                    })
                } else {
                    $(".hero-unit.from #simoleons").html(data.simoleons);
                    $(".hero-unit.from #amount").html(data.char + data.amount);
                    $(".hero-unit.from").animate({"height":'200px', "opacity":"1"});
                }
            }
        });
        return false;
    })
   $(".nav-tabs a:first").tab("show");
})