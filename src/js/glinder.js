window.addEventListener('load',function () {
    new Glider(document.querySelector('.carousel__lista'),{
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: '.carousel__indicadores',
        arrows: {
          prev: '.carousel__anterior',
          next: '.carousel__siguiente'
        },
        responsive: [
            {
              // screens greater than >= 450px
              breakpoint: 0,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
        
              }
            },{
                // screens greater than >= 600px
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
          
                }
              },{
              // screens greater than >= 800px
              breakpoint: 900,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
              
              }
            }
          ]
    });
});