<?php

  /**
   * fn. to convert english integers to nepali integers
   *
   * @param int
   * @return int
   */
  function numToNep($num){
    return preg_replace_callback('~(\d)~', function($i) { return '&#'.($i[1]+2406).';'; }, $num);
  }

  function next_month($date){
    $date['mon'] = $date['mon'] + 1;

    if($date['mon']==13){
      $date['year'] += 1;
      $date['mon'] = 1;
    }

    return $date;
  }

  function prev_month($date){
    $date['mon'] = $date['mon'] - 1;

    if($date['mon']==0){
      $date['year'] -= 1;
      $date['mon'] = 12;
    }

    return $date;
  }

  //--------------------------------------------------


  require('nepali_calendar_class.php');

  $cal = new Nepali_Calendar();
  $cur_month=[];

  if($_GET){
    //get selected day ... in english
    $date = new DateTime($_GET['y'].'-'.$_GET['m'].'-12');
    $timestamp = $date->getTimestamp();
    $en_today = getdate($timestamp);
  }else{
    //get today ... in english
    $en_today = getdate();
  }
  $np_today = $cal->eng_to_nep($en_today['year'],$en_today['mon'],$en_today['mday']);

  //-------------------------------------
  $next_month = next_month($en_today);
  $prev_month = prev_month($en_today);
  //data for next & previous links
  $link = [
            'prevY' => $prev_month['year'],
            'prevM' => $prev_month['mon'],
            'nextY' => $next_month['year'],
            'nextM' => $next_month['mon']
          ];
  //-------------------------------------

  $en_first_day = $cal->nep_to_eng($np_today['year'],$np_today['month'],1);

  $first_day = [
                'en_year'   =>$en_first_day['year'],
                'en_month'  =>$en_first_day['month'],
                'en_date'   =>$en_first_day['date'],
                'np_year'   =>$np_today['year'],
                'np_month'  =>$np_today['month'],
                'np_date'   =>1,//$np_today['date'],
                'num_day'   =>$en_first_day['num_day'],
              ];

  //data for the empty boxes -- before 1st of the month
  for($i=$first_day['num_day'];$i>1;$i--){
    $day = [
            'en_year'   =>null,
            'en_month'  =>null,
            'en_date'   =>'&nbsp;',
            'np_year'   =>null,
            'np_month'  =>null,
            'np_date'   =>'&nbsp;',
            'num_day'   =>null,
            'class'     =>'off',
          ];
    array_push($cur_month, $day);
  }

  
  $num_days = $cal->get_num_days($first_day['np_year'],$first_day['np_month']);
  for($i=1;$i<=$num_days;$i++){

    $en_selected_day = $cal->nep_to_eng($np_today['year'],$np_today['month'],$i);

    $class='';
    $tmp_today = getdate();
    if( $tmp_today['year']==$en_selected_day['year'] &&
        $tmp_today['mon'] ==$en_selected_day['month'] &&
        $tmp_today['mday']==$en_selected_day['date'] )
    {
      $class='active';
    }

    $day = [
            'en_year'   =>$en_selected_day['year'],
            'en_month'  =>$en_selected_day['s_emonth'],
            'en_date'   =>$en_selected_day['date'],
            'np_year'   =>numToNep($np_today['year']),
            'np_month'  =>$np_today['nmonth'],
            'np_date'   =>numToNep($i),
            'num_day'   =>$en_selected_day['num_day'],
            'class'     =>$class,
          ];

    array_push($cur_month,$day);
  }

  while(count($cur_month)%7!=0){
    $day = [
            'en_year'   =>null,
            'en_month'  =>null,
            'en_date'   =>'&nbsp;',
            'np_year'   =>null,
            'np_month'  =>null,
            'np_date'   =>'&nbsp;',
            'num_day'   =>null,
            'class'     =>'off',
          ];
    array_push($cur_month, $day);
  }



?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Calendar</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(function(){
      $('th .en').hide();
      //$('th .np').hide();
      $('tbody').find('a').click(function(e){
        e.preventDefault;
        return false;
      })
    })
    </script>
  </head>
  <body>
    <section id="calendar" class="container">
      <table class="cal">
        <caption>
          <span class="prev"><a href="?y=<?= $link['prevY']?>&m=<?= $link['prevM']?>">&larr;</a></span>
          <span class="next"><a href="?y=<?= $link['nextY']?>&m=<?= $link['nextM']?>">&rarr;</a></span>
          <span class="np"><?=$cur_month[20]['np_month']?> <?= $cur_month[20]['np_year']?></span>
          <span class="en">(<?=$cur_month[7]['en_month']?> - <?=$cur_month[28]['en_month']?> <?= $cur_month[28]['en_year']?>)</span>
        </caption>
        <thead>
          <tr>
            <th>
              <span class="en">Sunday</span>
              <span class="np">आइतवार</span>
            </th>
            <th>
              <span class="en">Monday</span>
              <span class="np">सोमवार</span>
            </th>
            <th>
              <span class="en">Tuesday</span>
              <span class="np">मगलवार</span>
            </th>
            <th>
              <span class="en">Wednesday</span>
              <span class="np">बुधवार</span>
            </th>
            <th>
              <span class="en">Thursday</span>
              <span class="np">बिहिवार</span>
            </th>
            <th>
              <span class="en">Friday</span>
              <span class="np">शुक्रवार</span>
            </th>
            <th>
              <span class="en">Saturday</span>
              <span class="np">शनिवार</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=0;$i<sizeof($cur_month);$i++):?>

            <?php echo ($i%7 == 0)?'<tr>':''; ?>

              <td class="<?php echo $cur_month[$i]['class']?>" >
                <?php if($cur_month[$i]['class']!='off'){?>  
                  <a <?php 
                        if( 
                          ($cur_month[$i]['en_date']!='&nbsp;')&&
                          ($cur_month[$i]['np_date']!='&nbsp;') 
                        ){
                          ?>href="index.html" <?php
                        }?> >
                    <span class="en small"><?php echo $cur_month[$i]['en_date']?></span>
                    <span class="np centere"><?php echo $cur_month[$i]['np_date']?></span>
                  </a>
                <?php } ?>  
              </td>
            <?php echo ($i%7==6)?'</tr>':''; ?>
          <?php endfor?>
        </tbody>
      </table>
    </section>
  </body>
</html>