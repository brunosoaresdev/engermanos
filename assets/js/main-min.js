!function($,t,e){$((function(){"use strict";$(".banner").slick({dots:!1,arrows:!0,infinite:!1,speed:750,slidesToShow:1,slidesToScroll:1,autoplay:!1,autoplaySpeed:3500,fade:!0}),$('.wpcf7-form input[type="submit"]').replaceWith('<button id="submit" type="submit" class="btn icon">'+$('.wpcf7-form input[type="submit"]').val()+"</button>");var t=function(t){return 11===t.replace(/\D/g,"").length?"(00) 00000-0000":"(00) 0000-00009"},e={onKeyPress:function(e,s,n,i){n.mask(t.apply({},arguments),i)}};$('.mask-phone, input[type="tel"]').mask(t,e),$(".sac").mask("0000 000 0000",{reverse:!0}),$("select").each((function(){$(this).hasClass("half")?$(this).not(".no-box").not(".multiple").wrap('<div class="select-box half"></div>'):$(this).not(".no-box").not(".multiple").wrap('<div class="select-box"></div>')})),$('input[type="file"]').on("change",(function(){$(this).prev("label").clone();var t=$(this)[0].files[0].name;$(this).prev("label").text(t)})),$("a.smoothscroll").click((function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if((t=t.length?t:$("[name="+this.hash.slice(1)+"]")).length)return $("html,body").animate({scrollTop:t.offset().top},1e3),!1}}))}))}(jQuery);