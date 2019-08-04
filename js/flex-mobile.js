
  var $win = $(window);

  $win.on('load resize', function() {
    var windowWidth = window.innerWidth;


    if (windowWidth < 768) {
      if ( $( "#flex-mobile" ).length == 0 ) {

        $( "<div class='form-group row' id='flex-mobile'></div>" ).insertAfter( $("#flex-pc") );

        $( "#stay-selector").appendTo("#flex-mobile");
        $( "#stay-selector-label").appendTo("#flex-mobile");

        $( "#room-selector").appendTo("#flex-mobile");
        $( "#room-selector-label").appendTo("#flex-mobile");

        $( "<div class='form-group row' id='flex-mobile'></div>" ).insertAfter( $("#flex-mobile") );
        $( "#adult-selector-label-1" ).appendTo( document.querySelectorAll('#flex-mobile')[1] );
        $( "#adult-selector").appendTo( document.querySelectorAll('#flex-mobile')[1] );
        $( "#adult-selector-label-2").appendTo( document.querySelectorAll('#flex-mobile')[1] );

        $( "#children-selector-lable-1" ).appendTo( document.querySelectorAll('#flex-mobile')[1] );
        $( "#children-selector").appendTo( document.querySelectorAll('#flex-mobile')[1] );
        $( "#children-selector-lable-2").appendTo( document.querySelectorAll('#flex-mobile')[1] );

      }
    } else {

      if ( $( "#flex-mobile" ).length != 0 ) {
        $( "#stay-selector").appendTo( $("#flex-pc") );
        $( "#stay-selector-label").appendTo( $("#flex-pc") );

        $( "#room-selector").appendTo( $("#flex-pc") );
        $( "#room-selector-label").appendTo( $("#flex-pc") );

        $( "#adult-selector-label-1" ).appendTo( $("#flex-pc") );
        $( "#adult-selector").appendTo( $("#flex-pc") );
        $( "#adult-selector-label-2").appendTo( $("#flex-pc") );

        $( "#children-selector-lable-1" ).appendTo( $("#flex-pc") );
        $( "#children-selector").appendTo( $("#flex-pc") );
        $( "#children-selector-lable-2").appendTo( $("#flex-pc") );

        document.querySelectorAll('#flex-mobile').forEach( function(node) {
          $(node).remove();
        });
      }
    }

  });

  var today = new Date();
  function formatdate(date) {
    return date.getFullYear() + '/' + (date.getMonth() + 1).toString().padStart(2, '0') + '/' + date.getDate().toString().padStart(2, '0');
  }
  $( "#datepicker" ).css("display", "none");
  $( "#date-text" ).html(formatdate(today));
  $( "#date-hidden").val(formatdate(today));
  $( "#datepicker" ).datepicker({
    closeText: "閉じる",
    prevText: "&#x3C;前",
    nextText: "次&#x3E;",
    currentText: "今日",
    monthNames: [ "1月","2月","3月","4月","5月","6月",
    "7月","8月","9月","10月","11月","12月" ],
    monthNamesShort: [ "1月","2月","3月","4月","5月","6月",
    "7月","8月","9月","10月","11月","12月" ],
    dayNames: [ "日曜日","月曜日","火曜日","水曜日","木曜日","金曜日","土曜日" ],
    dayNamesShort: [ "日","月","火","水","木","金","土" ],
    dayNamesMin: [ "日","月","火","水","木","金","土" ],
    weekHeader: "週",
    dateFormat: "yy/mm/dd",
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: true,
    yearSuffix: "年",
    minDate: 0,
    onSelect: function(dateText, inst) {
      $( "#date-text" ).html(dateText);
      $( "#date-hidden").val(dateText);
      $( "#datepicker" ).css("display", "none");
    }

  });

  $( "#date-text" ).click(function(){
    $( "#datepicker" ).css("display", "block");
  });

  $( "#hotel-selector" ).change(function(){

    switch ( $(this).val() ) {

      case '0':
        $ ( "#roomstyle-selector > option" ).remove();
        $ ( "<option value='0'>商务双床</option>" ).appendTo( "#roomstyle-selector" );
        $ ( "<option value='1'>商务大床</option>" ).appendTo( "#roomstyle-selector" );
        $ ( "<option value='2'>公寓式标准双人</option>" ).appendTo( "#roomstyle-selector" );
        $ ( "<option value='3'>公寓式双人/双床可加床最多3位成人</option>" ).appendTo( "#roomstyle-selector" );
        $ ( "<option value='<option value='4'>公寓式双床最多4位成人2个大床</option>'>公寓式双人/双床可加床最多3位成人</option>" ).appendTo( "#roomstyle-selector" );
        break;
      case '1':
        $ ( "#roomstyle-selector > option" ).remove();
        $ ( "<option value='0'>商务双床</option>" ).appendTo( "#roomstyle-selector" );
        break;
      default:
      break;
    }

  });

  $( "#roomstyle-selector" ).change( setRoom );

function setRoom() {

  if ( $("#hotel-selector").val() == '0') {
    switch ( $("#roomstyle-selector").val() ) {
      case '0':
        setRoomMaxD(1);
        changeRoomMember();
        break;
      case '1':
        setRoomMaxD(1);
        changeRoomMember();
        break;
      case '2':
        setRoomMaxD(1);
        changeRoomMember();
        break;
      case '3':
        setRoomMaxD(9);
        changeRoomMember();
        break;
      case '4':
        setRoomMaxD(6);
        changeRoomMember();
        break;
      default:
      break;
    }
  }

  if ( $("#hotel-selector").val() == '1') {
    switch ( $("#roomstyle-selector").val() ) {
      case '0':
        setRoomMaxD(1);
        changeRoomMember();
        break;
      case '1':
        setRoomMaxD(2);
        changeRoomMember();
        break;
      case '2':
        setRoomMaxD(2);
        changeRoomMember();
        break;
      case '3':
        setRoomMaxD(2);
        changeRoomMember();
        break;
      default:
      break;
    }
  }
}


  function setRoomMaxD( n ) {
    $ ("#room-selector > option").remove();
    var i = 1;
    while (i <= n) {
      $ ("<option value='" + i + "'>" + i + "</option>").appendTo( $("#room-selector") );
      i++;
    }

  }



  $( "#room-selector" ).change( changeRoomMember );

function changeRoomMember() {

  if ( $( "#hotel-selector").val() == "0") {

    switch ( $( "#roomstyle-selector" ).val() ) {
        case '0':
          setMemberMax(2, 0);
          break;
        case '1':
          setMemberMax(2, 1);
          break;
        case '2':
          setMemberMax(2, 1);
          break;
        case '3':
          setMemberMax(3, 1);
          break;
        case '4':
          setMemberMax(4, 1);
          break;
      default:
      break;
    }

  }

  if ( $( "#hotel-selector").val() == "1") {

    switch ( $( "#roomstyle-selector" ).val() ) {
        case '0':
          setMemberMax(2, 0);
          break;
        case '1':
          setMemberMax(2, 1);
          break;
        case '2':
          setMemberMax(2, 1);
          break;
        case '3':
          setMemberMax(3, 1);
          break;
      default:
      break;
    }
  }

}

function setMemberMax( a, c ) {

  var i = 1;

  $ ( "#adult-selector > option" ).remove();
  while( i <= ($("#room-selector").val() * a) ){
    $ ( "<option value="+i+">"+i+"</option>" ).appendTo( "#adult-selector" );
    i++;
  }

  $ ( "#children-selector > option ").remove();
  i = 0;
  while( i <= ($("#room-selector").val() * c) ) {
    $ ( "<option value="+i+">"+i+"</option>" ).appendTo( "#children-selector" );
    i++;
  }

}

$( "#goNext" ).click(function() {
  var displayA = "block";
  var n = $( "input:checked" ).length;
  if ( n === 1) {
    displayA = "none";
  }
  $( "#goNextWorn").css("display", displayA);
});
