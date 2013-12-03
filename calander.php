<?php
  include('nepali_calendar.php');
  $cal = new Nepali_Calendar();

  if($_GET){
    $get_year = $_GET['y'];
    $get_month = $_GET['m'];
  }

  print_r ($cal->eng_to_nep(2008,11,23));
  print_r($cal->nep_to_eng(2065,8,8));

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
      $('a').click(function(e){
        e.preventDefault;
        return false;
      })
    })
    </script>
  </head>
  <body>
    <section id="calandar" class="container">
      <table class="cal">
        <caption>
          <span class="prev"><a href="index.html">&larr;</a></span>
          <span class="next"><a href="index.html">&rarr;</a></span>
          <span class="np"><?= $cur_np_month?> <?= $cur_np_year?></span>
          <span class="en">(<?= $cur_en_month?> <?= $cur_en_year?>)</span>
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
          <?php for($dayCount=0;$dayCount<33;$dayCount++):?>
            <?php echo ($dayCount%7)?'<tr>':''; ?>
              <td>
                <a href="index.html">
                  <span class="en small"><?= $dates['en'][$dayCount]?></span>
                  <span class="np centere"><?= $dates['np'][$dayCount]?></span>
                </a>
              </td>
            <?php echo ($dayCount%7)?'</tr>':''; ?>
          <?php endforeach?>
          <tr>
            <td class="off">
              <a href="index.html">
                <span class="en small">26</span>
                <span class="np centere">१</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">27</span>
                <span class="np center">२</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">28</span>
                <span class="np center">३</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">29</span>
                <span class="np center">४</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">30</span>
                <span class="np center">५</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">31</span>
                <span class="np center">६</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">1</span>
                <span class="np center">७</span>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="index.html">
                <span class="en small">2</span>
                <span class="np center">८</span>
              </a>  
            </td>
            <td>
              <a href="index.html">
                <span class="en small">3</span>
                <span class="np center">९</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">4</span>
                <span class="np center">१०</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">5</span>
                <span class="np center">११</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">6</span>
                <span class="np center">१२</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">7</span>
                <span class="np center">१३</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">8</span>
                <span class="np center">१४</span>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="index.html">
                <span class="en small">9</span>
                <span class="np center">१५</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">10</span>
                <span class="np center">१५</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">11</span>
                <span class="np center">१६</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">12</span>
                <span class="np center">१७</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">13</span>
                <span class="np center">१८</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">14</span>
                <span class="np center">१९</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">15</span>
                <span class="np center">२०</span>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="index.html">
                <span class="en small">16</span>
                <span class="np center">२१</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">17</span>
                <span class="np center">२२</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">18</span>
                <span class="np center">२३</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">19</span>
                <span class="np center">२४</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">20</span>
                <span class="np center">२५</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">21</span>
                <span class="np center">२६</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">22</span>
                <span class="np center">२७</span>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="index.html">
                <span class="en small">23</span>
                <span class="np center">२८</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">24</span>
                <span class="np center">२९</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">25</span>
                <span class="np center">३०</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">26</span>
                <span class="np center">३१</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">27</span>
                <span class="np center">१</span>
              </a>
            </td>
            <td class="active">
              <a href="index.html">
                <span class="en small">28</span>
                <span class="np center">२</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">29</span>
                <span class="np center">३</span>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="index.html">
                <span class="en small">30</span>
                <span class="np center">४</span>
              </a>
            </td>
            <td>
              <a href="index.html">
                <span class="en small">31</span>
                <span class="np center">५</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">1</span>
                <span class="np center">६</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">2</span>
                <span class="np center">७</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">33</span>
                <span class="np center">८</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">4</span>
                <span class="np center">९</span>
              </a>
            </td>
            <td class="off">
              <a href="index.html">
                <span class="en small">5</span>
                <span class="np center">१०</span>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </body>
</html>