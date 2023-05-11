(function ($, root, undefined) {
  $(function () {
    "use strict";

    // banner
    $(".banner").slick({
      dots: false,
      arrows: true,
      infinite: false,
      speed: 750,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3500,
      fade: true
    });

    $('.wpcf7-form input[type="submit"]').replaceWith(
      '<button id="submit" type="submit" class="btn icon">' +
        $('.wpcf7-form input[type="submit"]').val() +
        "</button>"
    );

    // Mascara de DDD e 9 dígitos para telefones
    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, "").length === 11
        ? "(00) 00000-0000"
        : "(00) 0000-00009";
    },
    spOptions = {
      onKeyPress: function (val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      },
    };
    $('.mask-phone, input[type="tel"]').mask(SPMaskBehavior, spOptions);
    $(".sac").mask("0000 000 0000", {
      reverse: true,
    });

    // SELECT , caso queira excluir algum elemento, colocar 'select:not(elementos)'
    $('select').each(function(){
      if ( $(this).hasClass('half') ) {
        $(this)
          .not(".no-box")
          .not(".multiple")
          .wrap('<div class="select-box half"></div>');
      } else {
        $(this)
          .not(".no-box")
          .not(".multiple")
          .wrap('<div class="select-box"></div>');
      }
    });

    $('input[type="file"]').on("change",function() {
      var i = $(this).prev('label').clone();
      var file = $(this)[0].files[0].name;
      $(this).prev('label').text(file);
    });

    // Rolagem suave
    $("a.smoothscroll").click(function () {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html,body").animate({ scrollTop: target.offset().top }, 1000);
          return false;
        }
      }
    });
  });
})(jQuery, this);
