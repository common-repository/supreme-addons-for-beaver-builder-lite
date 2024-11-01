<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */

?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.10.2">
<style>
 .add-to-calender
 {
     text-align: center;
 }
 .add-to-calender a
 {
     font-size: 40px;
 }
 .add-to-calender h3
 {
     text-align: center;
     font-size: 18px;
     font-family: 'Open Sans', sans-serif;
     font-weight: 700;
 }
</style>
  
   <div class="add-to-calender">
    <h3 class="secondaryTextColor"><?php echo isset($settings->default_event_title)?$settings->default_event_title:""; ?></h3>
    <?php     
  

    date_default_timezone_set('UTC');
    $strtime= date("Ymd\THis\Z" ,strtotime($settings->default_event_start));  
    $strend= date("Ymd\THis\Z", strtotime($settings->default_event_end));
    $default_event_name = str_replace(' ', '+', $settings->default_event_name);
    $default_event_address =  str_replace(' ', '+', $settings->default_event_address);
    ?>
    <a class="primaryColorasColor" target="_blank" href=<?php echo "https://calendar.google.com/calendar/render?action=TEMPLATE&text=$default_event_name&dates=$strtime/$strend&details=Event+Details+Here&location=$default_event_address&pli=1&t=AKUaPmaig20ITiBA2hqC6HIUdpZ6GgF6RtN5aMU7C-XiklhqPueGf-OhilH6a3onifRY6I0SwR_2AkrKQESuYCJt_Nkmq2TVCA%3D%3D&sf=true&output=xml#eventpage_6" ;?>><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span></a>    
</div>  <?php

?>