
<script>


    import 'dhtmlx-scheduler/codebase/dhtmlxscheduler';
    import 'dhtmlx-scheduler/codebase/ext/dhtmlxscheduler_multiselect';
    import './calendar/ext/dhtmlxscheduler_timeline';
    import './calendar/ext/dhtmlxscheduler_daytimeline';




    export default {
        name: 'scheduler',
        props:[
            'urldatauser',
            'urldataeventtype'


        ],
        data() {
            return {
                text:null,
                start_date: null,
                status:null,
                assigned:null,
            }
        },
        methods:{
            getUser(){
                var item;
                var i=0;
                var sections = [];

                for (item in this.urldatauser ){



                    sections [i] = {key:this.urldatauser[i].id, label: this.urldatauser[i].name}


                    i++;
                }
                return sections;
            },
            getEventType(){
                var item;
                var i=0;
                var EventType = [];

                for (item in this.urldataeventtype ){



                    EventType [i] = {key:this.urldataeventtype[i].id, label: this.urldataeventtype[i].name}


                    i++;
                }
                return EventType;
            }


        },


        mounted: function () {

            scheduler.config.multisection = true;


            var staff;
            var eventType;

            staff = this.getUser();
            eventType = this.getEventType();

            var subject = eventType;


            scheduler.config.hour_date = "%h:%i %a";
            scheduler.config.first_hour = '6';
            scheduler.config.last_hour = '18';






            //'timeline_tab' is the name of our div
            scheduler.locale.labels.timeline_tab ="timeline";



            //Sheduler Typs Config !!!
            scheduler.locale.labels.section_subject = "Subject";
            scheduler.config.limit_time_select = true;
            scheduler.config.details_on_dblclick = true;
            scheduler.config.details_on_create = true;


            scheduler.templates.event_class=function(start, end, event){
                var css = "";
                var i;
                if(event.type_id) // if event has subject property then special class should be assigned
                    css += "event_"+event.type_id;

                if(event.id == scheduler.getState().select_id){
                    css += " selected";
                }
                return css; // default return

                /*
                 Note that it is possible to create more complex checks
                 events with the same properties could have different CSS classes depending on the current view:

                 var mode = scheduler.getState().mode;
                 if(mode == "day"){
                 // custom logic here
                 }
                 else {
                 // custom logic here
                 }
                 */
            };


            scheduler.config.lightbox.sections=[
                {name:"description", height:43, map_to:"text", type:"textarea" , focus:true},
                {name:"Type", height:20, type:"select", options: subject, map_to:"type_id" },
                {name:"AssignTo", height:20, type:"select", options:  staff, map_to:"assigned" },
                {name:"time", height:72, type:"time", map_to:"auto" }
            ];

            //Sheduler Typs Config !!!
            scheduler.locale.labels.section_subject = "Subject";
            scheduler.config.limit_time_select = true;
            scheduler.config.details_on_dblclick = true;
            scheduler.config.details_on_create = true;


            scheduler.templates.event_class=function(start, end, event){
                var css = "";
                if(event.type_id) // if event has subject property then special class should be assigned
                    css += "event_"+event.type_id;

                if(event.id == scheduler.getState().select_id){
                    css += " selected";
                }
                return css; // default return

                /*
                 Note that it is possible to create more complex checks
                 events with the same properties could have different CSS classes depending on the current view:

                 var mode = scheduler.getState().mode;
                 if(mode == "day"){
                 // custom logic here
                 }
                 else {
                 // custom logic here
                 }
                 */
            };

            scheduler.config.lightbox.sections=[
                {name:"description", height:43, map_to:"text", type:"textarea" , focus:true},
                {name:"Type", height:20, type:"select", options: subject, map_to:"type_id" },
                {name:"AssignTo", height:20, type:"select", options:  staff, map_to:"assigned" },
                {name:"time", height:72, type:"time", map_to:"auto" }
            ];

// initialize a scheduler

            scheduler.setLoadMode("day");//!
            scheduler.init('scheduler', new Date(), "day");
            scheduler.load("/api/events", "json"); //loading data from a file


            var dp = new dataProcessor("/api/events");//!
            dp.init(scheduler);
            dp.setTransactionMode("REST");
            scheduler.config.responsive_lightbox = true;

        }
    }

</script>



<template>

    <div id="scheduler" class="dhx_cal_container" style="width:100%; height:100vh;">
        <div class="dhx_cal_navline">
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
            <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
            <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
            <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
        </div>
        <div class="dhx_cal_header"></div>
        <div class="dhx_cal_data"></div>
    </div>
</template>


<style>

    .dhx_cal_event div.dhx_footer,
    .dhx_cal_event.past_event div.dhx_footer,
    .dhx_cal_event.event_english div.dhx_footer,
    .dhx_cal_event.event_math div.dhx_footer,
    .dhx_cal_event.event_science div.dhx_footer{
        background-color: transparent !important;
    }
    .dhx_cal_event .dhx_body{
        -webkit-transition: opacity 0.1s;
        background-color: rgba(0, 99, 36, 0) !important;
        transition: opacity 0.1s;
        opacity: 0.7;
    }
    .dhx_cal_event .dhx_title{
        background-color: rgba(0, 99, 36, 0) !important;
        line-height: 12px;
    }
    .dhx_cal_event_line:hover,
    .dhx_cal_event:hover .dhx_body,
    .dhx_cal_event.selected .dhx_body,
    .dhx_cal_event.dhx_cal_select_menu .dhx_body{
        opacity: 1;
    }

    .dhx_cal_event {
        background-color: rgba(0, 99, 36, 0.77);

    }

    .event_2 {
        background-color: #474CB3 !important;
        color: #fff;
    }



    .event_1 {
        background-color: #006324 !important;
        color: #fff;
    }




    .event_3 {
        background-color: #684f8c !important;
        color: #fff;
    }


</style>