<?php
mb_language("zh-cn");
mb_internal_encoding("utf-8");

$to = "cuinan163@gmail.com";
$title = "booking";
$content = null;

$hotels = array("hotle"=>
                  array("秋叶原","上野"),
                "roomstyle"=>
                  array(
                    array("商务双床"
                    ,"商务大床"
                    ,"公寓式标准双人"
                    ,"公寓式双人/双床可加床最多3位成人"
                    ,"公寓式双床最多4位成人2个大床")

                    ,array("2卧室（和，洋）")
                    ,("3卧室（和，和，洋）")
                    ,("3卧室（和，和，和）")
                  )
                );

$hotel = $_POST['hotel'];
$roomstyle = $_POST['roomstyle'];
$date = $_POST['date'];
$stay = $_POST['stay'];
$room = $_POST['room'];
$adult = $_POST['adult'];
$children = $_POST['children'];
$email = $_POST['email'];
$editeContent = true;

//validateRequestPrameter
if (preg_match_all("/^[0-9]$/", $hotel) != 1) {

    echo "hotel is wrong";

    $editeContent = false;
}

if (preg_match_all("/^[0-9]$/", $roomstyle) != 1) {

    echo "roomstyle is wrong";

    $editeContent = false;
}

if (!validateDate($date, 'Y/m/d')) {

    echo "date is wrong";

    $editeContent = false;
}

if (preg_match_all("/^[1-9]{1,2}$/", $stay) != 1) {

    echo "stay is wrong";

    $editeContent = false;
}

if (preg_match_all("/^[1-9]{1,2}$/", $room) != 1) {

    echo "room is wrong";

    $editeContent = false;
}

if (preg_match_all("/^[1-9]{1,2}$/", $adult) != 1) {

    echo "adult is wrong";

    $editeContent = false;
}

if (preg_match_all("/^[0-9]{1,2}$/", $children) != 1) {

    echo "children is wrong";

    $editeContent = false;
}

//validateDate
function validateDate($date, $format)
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if ($editeContent) {

    $content  = '酒店 : '.$hotels['hotle'][$_POST['hotel']]."\r\n";
    $content .= '房型 : '.$hotels['roomstyle'][$_POST['hotel']][$_POST['roomstyle']]."\r\n";
    $content .= '入住日期 : '.$date."\r\n";
    $content .= '入住时长 : '.$stay."\r\n";
    $content .= '房间数 : '.$room."\r\n";
    $content .= '成人 : '.$adult."人\r\n";
    $content .= '儿童 : '.$children."人\r\n";
    $content .= '邮件 : '.$email."\r\n";

    echo $content;
    //send mail
    if (mb_send_mail($to, $title, $content)) {

        echo "已发送";

    } else {

        echo "失败";

    }
}


?>
