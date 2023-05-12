

$(document).on('keydown', function(e) {
   if ((e.altKey) && (e.which === 90)) { // (Alt + z) - Abre caixa de pesquisa
      $('.search-box').css('display','block');
      $('.busca').focus();
   }else if((e.altKey) && (e.which === 67)){// (Alt + c) - foco no menu
      $("#gotomenu").click();
      $('.sm-clean').toggleClass('atalho-foco');
   }else if((e.altKey) && (e.which === 82)){// (Alt + r) - Ir para o rodapÃ©
      var heightPage = document.body.scrollHeight;
      window.scrollTo(0 , heightPage);
   }else if((e.altKey) && (e.which === 66)){// (Alt + b) -  alto contraste
      $("#contrast").click();
   }else if((e.altKey) && (e.which === 87)){// (Alt + w) - aumentar letra
      $("#increaseFont").click();
   }else if((e.altKey) && (e.which === 83)){ // (Alt + s) - diminuir letra
      $("#decreaseFont").click();
   }else if((e.altKey) && (e.which === 81)){// (Alt + q) -  letra normal
         $("#resetaFont").click();
   }else if((e.altKey) && (e.which === 78)){// (Alt + n) -  vai para o conteÃºdo do site
      $("#gotobody").click();
   }else if((e.altKey) && (e.which === 76)){// (Alt + l) -  abre o vLibras
      $('.access-button').click();
   }
});


$(document).on('keydown', function(e) {
   if ((e.altKey) && (e.which === 90)) { // (Alt + z) - Abre caixa de pesquisa
      $('.search-box').css('display','block');
      $('.busca').focus();
   }else if((e.altKey) && (e.which === 67)){// (Alt + c) - foco no menu
      $("#gotomenu").click();
      $('.sm-clean').toggleClass('atalho-foco');
   }else if((e.altKey) && (e.which === 82)){// (Alt + r) - Ir para o rodapé
      var heightPage = document.body.scrollHeight;
      window.scrollTo(0 , heightPage);
   }else if((e.altKey) && (e.which === 66)){// (Alt + b) -  alto contraste
      $("#contrast").click();
   }else if((e.altKey) && (e.which === 87)){// (Alt + w) - aumentar letra
      $("#increaseFont").click();
   }else if((e.altKey) && (e.which === 83)){ // (Alt + s) - diminuir letra
      $("#decreaseFont").click();
   }else if((e.altKey) && (e.which === 81)){// (Alt + q) -  letra normal
         $("#resetaFont").click();
   }else if((e.altKey) && (e.which === 78)){// (Alt + n) -  vai para o conteúdo do site
      $("#gotobody").click();
   }else if((e.altKey) && (e.which === 76)){// (Alt + l) -  abre o vLibras
      $('.access-button').click();
   }
});

/*
$(".btn-acessibilidade").on("click", function () {
   $(".on .acessibilidade").toggleClass("acessibilidade_mobile")
});
*/

//   AÇÕES PARA CLIQUE NA CAIXA DE INSTRUÇÕES
$("#altZ").on('click', function(){
      $('.search-box').css('display','block');
      $('.busca').focus();
});
$("#altC").on('click', function(){
   $("#gotomenu").click();
   $('.sm-clean').toggleClass('atalho-foco');
});
$("#altR").on('click', function(){
   var heightPage = document.body.scrollHeight;
   window.scrollTo(0 , heightPage);
});
$("#altB").on('click', function(){
   $("#contrast").click();
});
$("#altW").on('click', function(){
   $("#increaseFont").click();
});
$("#altS").on('click', function(){
   $("#decreaseFont").click();
});
$("#altQ").on('click', function(){
   $("#resetaFont").click();
});
$("#altN").on('click', function(){
   $("#gotobody").click();
});
$("#altL").on('click', function(){
   $('.access-button').click();
});

$('.mostra-libra').click(function () {
   $('.access-button').click();
});


