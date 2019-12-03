@extends('layouts.manage')
@section('content')
    <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }

    </style>
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">&nbsp;</div>
        <div class="dhx_cal_next_button">&nbsp;</div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_cal_date"></div>
        <div class="dhx_cal_tab" name="day_tab"></div>
        <div class="dhx_cal_tab" name="week_tab"></div>
        <div class="dhx_cal_tab" name="month_tab"></div>
    </div>
    <div class="dhx_cal_header"></div>
    <div class="dhx_cal_data"></div>
</div>
<script type="text/javascript">


    scheduler.config.xml_date = "%d.%m.%Y";
    scheduler.setLoadMode("day");//!


    scheduler.init("scheduler_here", new Date(), "day");

    scheduler.load("/api/events", "json");//!
    var dp = new dataProcessor("/api/events");//!
    dp.init(scheduler);
    dp.setTransactionMode("REST");
    scheduler.config.responsive_lightbox = true;





</script>

@endsection
