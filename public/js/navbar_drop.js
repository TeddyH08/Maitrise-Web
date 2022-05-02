$(window).load(function(){
  
    var container_margin = $('.container').first().offset().left;
    $('.dd-mnu').css('left', container_margin + 'px').css('right', container_margin + 'px');
    $('.navbar .dropdown').hover(function(){
      var mnu = $(this).find('.dd-mnu').first();
      var dd = $(this).find('.dropdown-menu').first();
      
      dd.show();
      mnu.show();
    }, function() {
      var mnu = $(this).find('.dd-mnu').first();
      var dd = $(this).find('.dropdown-menu').first();
  
      dd.hide();
      mnu.hide();
    });
  });