$('#my-account').on('click',function(){
        $('.account-dropdown').slideToggle();
        $('.cart-dropdown').slideUp('slow');
        $('.drop-icon').css('transform','rotate(-180deg');
})

$('.user-icon').on('click',function(){
        $('.cart-dropdown').slideToggle();
        $('.account-dropdown').slideUp('slow');
})
$('.cart-icon').on('click',function(){
        $('.cart-dropdown').slideToggle();
        $('.account-dropdown').slideUp('slow');
})


document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
          
          element.addEventListener('click', function (e) {
      
            let nextEl = element.nextElementSibling;
            let parentEl  = element.parentElement;	
      
              if(nextEl) {
                  e.preventDefault();	
                  let mycollapse = new bootstrap.Collapse(nextEl);
                  
                  if(nextEl.classList.contains('show')){
                    mycollapse.hide();
                    
                   
                  } else {
                      mycollapse.show();
                //       $('.fa-angle-down').toggle().css('transform','rotate(-180deg)','display','block');
                      // find other submenus with class=show
                      var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                      
                      // if it exists, then close all of them
                      if(opened_submenu){
                        new bootstrap.Collapse(opened_submenu);
                      
                      }
                  }
              }
          }); // addEventListener
        }) // forEach
      }); 




      $('.icon-bar').on('click', function() {
        $('.mobile-menu').show('slow');
          $('.sidebar').css('margin-left','0');
          $(".side-navbar").toggle();
          $('.user-login-part').hide();
      });
       // mobile sidebar menu javascript
     
                $('.icon-bar').on('click', function() {
                        $(".sidebar").show('slow');
                });
        if ($(window).width() < 767) {
                $('.icon-bar').on('click',function(){
                $('.mobile-menu').on('click',function(e){
                        $(".sidebar").hide('slow');
                }).on('click', '#nav_accordion', function(e) {
                        e.stopPropagation();
                });
                })
               
        }
     
     
var counter = 0;
$(document).on('click', '.nav-item', function(e){
        const item = $(this).siblings('.nav-item');
        if(item.attr('type') === 'password'){
            item.attr('type', 'text');
        }else{
            item.attr('type', 'password');
        }
    });

    $('.submenu-1').click(function(){
        counter +=1;
        let man = counter % 2;
        if(man == 1){
                $('#menu-1').css('transform','rotate(-180deg)','transition','all .5s');
        }
        else{
                $('#menu-1').css('transform','rotate(0deg)','transition','all .5s');
        }
});
$('.submenu-2').click(function(){
        counter +=1;
        let man = counter % 2;
        if(man == 1){
                $('#menu-2').css('transform','rotate(-180deg)','transition','all .5s');
        }
        else{
                $('#menu-2').css('transform','rotate(0deg)','transition','all .5s');
        }
});




      




