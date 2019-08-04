
  var $win = $(window);

  $win.on('load resize', function() {
    var windowWidth = window.innerWidth;

    if (windowWidth < 768) {
      if ( $( "div.flex-container-mobile" ).length == 0 ) {

        $( "<div class='flex-container-mobile'></div>" ).appendTo("body");

        for ( $i = 7; $i <= 12; $i++ ) {

          $( "div.flex-container-mobile" ).append( $( ".i" + $i ) );

        }

      } else if ( windowWidth < 325) {
        if ( $( "div.flex-container-mobile-s" ).length == 0 )  {

          $( "<div class='flex-container-mobile-s'></div>" ).appendTo("body");

          for ( $i = 7; $i <= 12; $i++ ) {

            $( "div.flex-container-mobile-s" ).append( $( ".i" + $i ) );

          }
        }
      }


    }
  });
