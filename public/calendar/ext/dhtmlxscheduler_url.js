/*

@license
dhtmlxScheduler v.5.3.4 Professional Evaluation

This software is covered by DHTMLX Evaluation License. Contact sales@dhtmlx.com to get Commercial or Enterprise license. Usage without proper license is prohibited.

(c) XB Software Ltd.

*/
Scheduler.plugin(function(e){e._get_url_nav=function(){for(var e={},t=(document.location.hash||"").replace("#","").split(","),a=0;a<t.length;a++){var n=t[a].split("=");2==n.length&&(e[n[0]]=n[1])}return e},e.attachEvent("onTemplatesReady",function(){function t(t){r=t,e.getEvent(t)&&e.showEvent(t)}var a=!0,n=e.date.str_to_date("%Y-%m-%d"),i=e.date.date_to_str("%Y-%m-%d"),r=e._get_url_nav().event||null;e.attachEvent("onAfterEventDisplay",function(e){return r=null,!0}),
e.attachEvent("onBeforeViewChange",function(o,_,s,d){if(a){a=!1;var l=e._get_url_nav();if(l.event)try{if(e.getEvent(l.event))return t(l.event),!1;var c=e.attachEvent("onXLE",function(){t(l.event),e.detachEvent(c)})}catch(e){}if(l.date||l.mode){try{this.setCurrentView(l.date?n(l.date):null,l.mode||null)}catch(e){this.setCurrentView(l.date?n(l.date):null,s)}return!1}}var h=["date="+i(d||_),"mode="+(s||o)];r&&h.push("event="+r);var u="#"+h.join(",");return document.location.hash=u,!0})})});