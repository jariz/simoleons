$(document).load(function() {
    $("form.convertfrom").submit(function() {
        $.post($(this).attr("action"), $(this).serialize(), function(data) {
            if(data.error) {
                $("#error #message").html(data.message);
                $("#error").modal("show");
            } else {
                var anim = function() {
                    $(".hero-unit.from #simoleons").html(data.simoleons);
                    $(".hero-unit.from #amount").html(data.char + data.amount);
                    $(".hero-unit.from").animate({"height":'200px', "opacity":"1"});
                }
                if($(".hero-unit.from").css("height") == "200px") {
                    $(".hero-unit.from").animate({height:"0px", opacity:"0"}, function() {
                        anim();
                    })
                } else anim();
            }
        });
        return false;
    })

    $("form.convertto").submit(function() {
        $.post($(this).attr("action"), $(this).serialize(), function(data) {
            if(data.error) {
                $("#error #message").html(data.message);
                $("#error").modal("show");
            } else {
                var anim = function() {
                    $(".hero-unit.to #simoleons").html(data.simoleons);
                    $(".hero-unit.to #amount").html(data.char + data.amount);
                    $(".hero-unit.to").animate({"height":'200px', "opacity":"1"});
                }
                if($(".hero-unit.to").css("height") == "200px") {
                    $(".hero-unit.to").animate({height:"0px", opacity:"0"}, function() {
                        anim();
                    })
                } else anim();
            }
        });
        return false;
    })

   $(".nav-tabs a:first").tab("show");
})