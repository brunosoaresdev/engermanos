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

    // carousel clients
    $(".gallery-clients").slick({
      dots: true,
      arrows: false,
      infinite: true,
      speed: 750,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay: false,
      autoplaySpeed: 3500
    });

    // modal
    document.addEventListener('click', function (e) {
      e = e || window.event;
      let target = e.target || e.srcElement;

      // get to the closest ancestor that has the attribute
      let el = target.closest('[data-toggle]');
      
      if (el) {
        if (el.hasAttribute('data-toggle') && el.getAttribute('data-toggle') == 'modal') {
          if (el.hasAttribute('data-target')) {
            let m_ID = el.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('show');
            e.preventDefault();
          }
        }
      }
  
      if ( target.classList.contains('close') || target.parentElement.classList.contains('close') || target.classList.contains('modal') && target.classList.contains('show') ) {
        let modal = document.querySelector('[class="modal show"]');

        if ( modal ) {
          modal.classList.remove('show');
        }

        if ( target.classList.contains('show') ) {
          target.classList.remove('show');
        } else if ( target.classList.contains('close') || target.parentElement.classList.contains('close') ) {
          target.closest('.show').classList.remove('show');
        }

        e.preventDefault();
      }
    }, false);

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
    $('.phoneMask, input[type="tel"]').mask(SPMaskBehavior, spOptions);

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
