<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <title>LeTour Booking</title>
</head>
<body style="background-color:#dad7d3">
  <!--- Start header -->
  <header>
  <!--- Start navigation -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navigation">
      <a class="navbar-brand" href="top.html">LeTour</a>
      </nav>
      <!--- End navigation -->
  </header>
  <!--- End header-->

  <!--- Start container1 -->
  <div class="container">

    <div class="box align-self-center">
      <h1>注意事项</h1>
      <label>
        <p>我们会通过您提供的信息，查询空方情况。查询结果将发送到您填写的email。</p>
        <h3>清洁规则</h3>
        <p>根据入住时间不同，执行不同的清扫规则，分别为“简单清洁”和“全面清洁”，具体如下：<br>
          <li>简单情节:更换毛巾，更换牙刷，垃圾桶收集垃圾</li>
        </p>
        <p>根据入住时间不同，执行不同的清扫规则，分别为“简单清洁”和“全面清洁”，具体如下：<br>
          <li>简单情节:更换毛巾，更换牙刷，垃圾桶收集垃圾</li>
        </p>
        <p>根据入住时间不同，执行不同的清扫规则，分别为“简单清洁”和“全面清洁”，具体如下：<br>
          <li>简单情节:更换毛巾，更换牙刷，垃圾桶收集垃圾</li>
        </p>
        <p>根据入住时间不同，执行不同的清扫规则，分别为“简单清洁”和“全面清洁”，具体如下：<br>
          <li>简单情节:更换毛巾，更换牙刷，垃圾桶收集垃圾</li>
        </p>
        <p>根据入住时间不同，执行不同的清扫规则，分别为“简单清洁”和“全面清洁”，具体如下：<br>
          <li>简单情节:更换毛巾，更换牙刷，垃圾桶收集垃圾</li>
        </p>
      </label>
    </div>

    <div class="checkbox-wrapper" style="margin: 0 60px">
      <input type="checkbox" name="check" value="">同意并了解注意事项</input>
    </div>

    <div class="msg-wrapper">
      <label id="goNextWorn">必须了解注意事项才能进行下一步</label>
    </div>
    <div class="button-wrapper">
      <button class="btn btn-success" id="goNext" style="margin:auto">next</button>
    </div>

  </div>
  <!--- End container1 -->

  <div class="container" id="book2">
    <?php
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
     ?>
    <div class="table-responsive">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">酒店</th>
            <th scope="col">房型</th>
            <th scope="col">入住日期</th>
            <th scope="col">入住时长（晚）</th>
            <th scope="col">房间数</th>
            <th scope="col">成人（人）</th>
            <th scope="col">儿童（人）</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
        <tr scope="row">
          <th>1</th>
          <td><?php echo $hotels['hotle'][$_POST['hotel']] ?></td>
          <td><?php echo $hotels['roomstyle'][$_POST['hotel']][$_POST['roomstyle']] ?></td>
          <td><?php echo $_POST['date'] ?></td>
          <td><?php echo $_POST['stay'] ?></td>
          <td><?php echo $_POST['room'] ?></td>
          <td><?php echo $_POST['adult'] ?></td>
          <td><?php echo $_POST['children'] ?></td>
          <td><?php echo $_POST['email'] ?></td>
        </tr>
      </tbody>
      </table>
    </div>

    <div class="button-wrapper">
      <form action="mail.php" method="post">
        <input type="hidden" name="hotel" value="<?php echo $_POST['hotel'] ?>" />
        <input type="hidden" name="roomstyle" value="<?php echo $_POST['roomstyle'] ?>" />
        <input type="hidden" name="date" value="<?php echo $_POST['date'] ?>" />
        <input type="hidden" name="stay" value="<?php echo $_POST['stay'] ?>" />
        <input type="hidden" name="room" value="<?php echo $_POST['room'] ?>" />
        <input type="hidden" name="adult" value="<?php echo $_POST['adult'] ?>" />
        <input type="hidden" name="children" value="<?php echo $_POST['children'] ?>" />
        <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>" />

      <button  class="btn btn-success" id="goNext" style="margin:auto">next</button>
    </div>

  </div>



</doby>
<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/flex-mobile.js"></script>

<?php ?>
