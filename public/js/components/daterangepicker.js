!function(t,a){var e,i;"function"==typeof define&&define.amd?define(["moment","jquery"],function(t,e){return e.fn||(e.fn={}),"function"!=typeof t&&t.hasOwnProperty("default")&&(t=t.default),a(t,e)}):"object"==typeof module&&module.exports?((e="undefined"!=typeof window?window.jQuery:void 0)||(e=require("jquery")).fn||(e.fn={}),i="undefined"!=typeof window&&void 0!==window.moment?window.moment:require("moment"),module.exports=a(i,e)):t.daterangepicker=a(t.moment,t.jQuery)}(this,function(A,L){function i(t,e,a){var i,s,n,r;if(this.parentEl="body",this.element=L(t),this.startDate=A().startOf("day"),this.endDate=A().endOf("day"),this.minDate=!1,this.maxDate=!1,this.maxSpan=!1,this.autoApply=!1,this.singleDatePicker=!1,this.showDropdowns=!1,this.minYear=A().subtract(100,"year").format("YYYY"),this.maxYear=A().add(100,"year").format("YYYY"),this.showWeekNumbers=!1,this.showISOWeekNumbers=!1,this.showCustomRangeLabel=!0,this.timePicker=!1,this.timePicker24Hour=!1,this.timePickerIncrement=1,this.timePickerSeconds=!1,this.linkedCalendars=!0,this.autoUpdateInput=!0,this.alwaysShowCalendars=!1,this.ranges={},this.opens="right",this.element.hasClass("pull-right")&&(this.opens="left"),this.drops="down",this.element.hasClass("dropup")&&(this.drops="up"),this.buttonClasses="btn btn-sm",this.applyButtonClasses="btn-primary",this.cancelButtonClasses="btn-default",this.locale={direction:"ltr",format:A.localeData().longDateFormat("L"),separator:" - ",applyLabel:"Apply",cancelLabel:"Cancel",weekLabel:"W",customRangeLabel:"Custom Range",daysOfWeek:A.weekdaysMin(),monthNames:A.monthsShort(),firstDay:A.localeData().firstDayOfWeek()},this.callback=function(){},this.isShowing=!1,this.leftCalendar={},this.rightCalendar={},"object"==typeof e&&null!==e||(e={}),"string"==typeof(e=L.extend(this.element.data(),e)).template||e.template instanceof L||(e.template='<div class="daterangepicker"><div class="ranges"></div><div class="drp-calendar left"><div class="calendar-table"></div><div class="calendar-time"></div></div><div class="drp-calendar right"><div class="calendar-table"></div><div class="calendar-time"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn" type="button"></button><button class="applyBtn" disabled="disabled" type="button"></button> </div></div>'),this.parentEl=e.parentEl&&L(e.parentEl).length?L(e.parentEl):L(this.parentEl),this.container=L(e.template).appendTo(this.parentEl),"object"==typeof e.locale&&("string"==typeof e.locale.direction&&(this.locale.direction=e.locale.direction),"string"==typeof e.locale.format&&(this.locale.format=e.locale.format),"string"==typeof e.locale.separator&&(this.locale.separator=e.locale.separator),"object"==typeof e.locale.daysOfWeek&&(this.locale.daysOfWeek=e.locale.daysOfWeek.slice()),"object"==typeof e.locale.monthNames&&(this.locale.monthNames=e.locale.monthNames.slice()),"number"==typeof e.locale.firstDay&&(this.locale.firstDay=e.locale.firstDay),"string"==typeof e.locale.applyLabel&&(this.locale.applyLabel=e.locale.applyLabel),"string"==typeof e.locale.cancelLabel&&(this.locale.cancelLabel=e.locale.cancelLabel),"string"==typeof e.locale.weekLabel&&(this.locale.weekLabel=e.locale.weekLabel),"string"==typeof e.locale.customRangeLabel)&&((h=document.createElement("textarea")).innerHTML=e.locale.customRangeLabel,l=h.value,this.locale.customRangeLabel=l),this.container.addClass(this.locale.direction),"string"==typeof e.startDate&&(this.startDate=A(e.startDate,this.locale.format)),"string"==typeof e.endDate&&(this.endDate=A(e.endDate,this.locale.format)),"string"==typeof e.minDate&&(this.minDate=A(e.minDate,this.locale.format)),"string"==typeof e.maxDate&&(this.maxDate=A(e.maxDate,this.locale.format)),"object"==typeof e.startDate&&(this.startDate=A(e.startDate)),"object"==typeof e.endDate&&(this.endDate=A(e.endDate)),"object"==typeof e.minDate&&(this.minDate=A(e.minDate)),"object"==typeof e.maxDate&&(this.maxDate=A(e.maxDate)),this.minDate&&this.startDate.isBefore(this.minDate)&&(this.startDate=this.minDate.clone()),this.maxDate&&this.endDate.isAfter(this.maxDate)&&(this.endDate=this.maxDate.clone()),"string"==typeof e.applyButtonClasses&&(this.applyButtonClasses=e.applyButtonClasses),"string"==typeof e.applyClass&&(this.applyButtonClasses=e.applyClass),"string"==typeof e.cancelButtonClasses&&(this.cancelButtonClasses=e.cancelButtonClasses),"string"==typeof e.cancelClass&&(this.cancelButtonClasses=e.cancelClass),"object"==typeof e.maxSpan&&(this.maxSpan=e.maxSpan),"object"==typeof e.dateLimit&&(this.maxSpan=e.dateLimit),"string"==typeof e.opens&&(this.opens=e.opens),"string"==typeof e.drops&&(this.drops=e.drops),"boolean"==typeof e.showWeekNumbers&&(this.showWeekNumbers=e.showWeekNumbers),"boolean"==typeof e.showISOWeekNumbers&&(this.showISOWeekNumbers=e.showISOWeekNumbers),"string"==typeof e.buttonClasses&&(this.buttonClasses=e.buttonClasses),"object"==typeof e.buttonClasses&&(this.buttonClasses=e.buttonClasses.join(" ")),"boolean"==typeof e.showDropdowns&&(this.showDropdowns=e.showDropdowns),"number"==typeof e.minYear&&(this.minYear=e.minYear),"number"==typeof e.maxYear&&(this.maxYear=e.maxYear),"boolean"==typeof e.showCustomRangeLabel&&(this.showCustomRangeLabel=e.showCustomRangeLabel),"boolean"==typeof e.singleDatePicker&&(this.singleDatePicker=e.singleDatePicker,this.singleDatePicker)&&(this.endDate=this.startDate.clone()),"boolean"==typeof e.timePicker&&(this.timePicker=e.timePicker),"boolean"==typeof e.timePickerSeconds&&(this.timePickerSeconds=e.timePickerSeconds),"number"==typeof e.timePickerIncrement&&(this.timePickerIncrement=e.timePickerIncrement),"boolean"==typeof e.timePicker24Hour&&(this.timePicker24Hour=e.timePicker24Hour),"boolean"==typeof e.autoApply&&(this.autoApply=e.autoApply),"boolean"==typeof e.autoUpdateInput&&(this.autoUpdateInput=e.autoUpdateInput),"boolean"==typeof e.linkedCalendars&&(this.linkedCalendars=e.linkedCalendars),"function"==typeof e.isInvalidDate&&(this.isInvalidDate=e.isInvalidDate),"function"==typeof e.isCustomDate&&(this.isCustomDate=e.isCustomDate),"boolean"==typeof e.alwaysShowCalendars&&(this.alwaysShowCalendars=e.alwaysShowCalendars),0!=this.locale.firstDay)for(var o=this.locale.firstDay;0<o;)this.locale.daysOfWeek.push(this.locale.daysOfWeek.shift()),o--;if(void 0===e.startDate&&void 0===e.endDate&&L(this.element).is(":text")&&(r=i=null,2==(n=(t=L(this.element).val()).split(this.locale.separator)).length?(r=A(n[0],this.locale.format),i=A(n[1],this.locale.format)):this.singleDatePicker&&""!==t&&(r=A(t,this.locale.format),i=A(t,this.locale.format)),null!==r)&&null!==i&&(this.setStartDate(r),this.setEndDate(i)),"object"==typeof e.ranges){for(s in e.ranges){r="string"==typeof e.ranges[s][0]?A(e.ranges[s][0],this.locale.format):A(e.ranges[s][0]),i="string"==typeof e.ranges[s][1]?A(e.ranges[s][1],this.locale.format):A(e.ranges[s][1]),this.minDate&&r.isBefore(this.minDate)&&(r=this.minDate.clone());var h,l,c=this.maxDate;(c=this.maxSpan&&c&&r.clone().add(this.maxSpan).isAfter(c)?r.clone().add(this.maxSpan):c)&&i.isAfter(c)&&(i=c.clone()),this.minDate&&i.isBefore(this.minDate,this.timepicker?"minute":"day")||c&&r.isAfter(c,this.timepicker?"minute":"day")||((h=document.createElement("textarea")).innerHTML=s,l=h.value,this.ranges[l]=[r,i])}var d="<ul>";for(s in this.ranges)d+='<li data-range-key="'+s+'">'+s+"</li>";this.showCustomRangeLabel&&(d+='<li data-range-key="'+this.locale.customRangeLabel+'">'+this.locale.customRangeLabel+"</li>"),d+="</ul>",this.container.find(".ranges").prepend(d)}"function"==typeof a&&(this.callback=a),this.timePicker||(this.startDate=this.startDate.startOf("day"),this.endDate=this.endDate.endOf("day"),this.container.find(".calendar-time").hide()),this.timePicker&&this.autoApply&&(this.autoApply=!1),this.autoApply&&this.container.addClass("auto-apply"),"object"==typeof e.ranges&&this.container.addClass("show-ranges"),this.singleDatePicker&&(this.container.addClass("single"),this.container.find(".drp-calendar.left").addClass("single"),this.container.find(".drp-calendar.left").show(),this.container.find(".drp-calendar.right").hide(),!this.timePicker)&&this.autoApply&&this.container.addClass("auto-apply"),(void 0===e.ranges&&!this.singleDatePicker||this.alwaysShowCalendars)&&this.container.addClass("show-calendar"),this.container.addClass("opens"+this.opens),this.container.find(".applyBtn, .cancelBtn").addClass(this.buttonClasses),this.applyButtonClasses.length&&this.container.find(".applyBtn").addClass(this.applyButtonClasses),this.cancelButtonClasses.length&&this.container.find(".cancelBtn").addClass(this.cancelButtonClasses),this.container.find(".applyBtn").html(this.locale.applyLabel),this.container.find(".cancelBtn").html(this.locale.cancelLabel),this.container.find(".drp-calendar").on("click.daterangepicker",".prev",L.proxy(this.clickPrev,this)).on("click.daterangepicker",".next",L.proxy(this.clickNext,this)).on("mousedown.daterangepicker","td.available",L.proxy(this.clickDate,this)).on("mouseenter.daterangepicker","td.available",L.proxy(this.hoverDate,this)).on("change.daterangepicker","select.yearselect",L.proxy(this.monthOrYearChanged,this)).on("change.daterangepicker","select.monthselect",L.proxy(this.monthOrYearChanged,this)).on("change.daterangepicker","select.hourselect,select.minuteselect,select.secondselect,select.ampmselect",L.proxy(this.timeChanged,this)),this.container.find(".ranges").on("click.daterangepicker","li",L.proxy(this.clickRange,this)),this.container.find(".drp-buttons").on("click.daterangepicker","button.applyBtn",L.proxy(this.clickApply,this)).on("click.daterangepicker","button.cancelBtn",L.proxy(this.clickCancel,this)),this.element.is("input")||this.element.is("button")?this.element.on({"click.daterangepicker":L.proxy(this.show,this),"focus.daterangepicker":L.proxy(this.show,this),"keyup.daterangepicker":L.proxy(this.elementChanged,this),"keydown.daterangepicker":L.proxy(this.keydown,this)}):(this.element.on("click.daterangepicker",L.proxy(this.toggle,this)),this.element.on("keydown.daterangepicker",L.proxy(this.toggle,this))),this.updateElement()}return i.prototype={constructor:i,setStartDate:function(t){"string"==typeof t&&(this.startDate=A(t,this.locale.format)),"object"==typeof t&&(this.startDate=A(t)),this.timePicker||(this.startDate=this.startDate.startOf("day")),this.timePicker&&this.timePickerIncrement&&this.startDate.minute(Math.round(this.startDate.minute()/this.timePickerIncrement)*this.timePickerIncrement),this.minDate&&this.startDate.isBefore(this.minDate)&&(this.startDate=this.minDate.clone(),this.timePicker)&&this.timePickerIncrement&&this.startDate.minute(Math.round(this.startDate.minute()/this.timePickerIncrement)*this.timePickerIncrement),this.maxDate&&this.startDate.isAfter(this.maxDate)&&(this.startDate=this.maxDate.clone(),this.timePicker)&&this.timePickerIncrement&&this.startDate.minute(Math.floor(this.startDate.minute()/this.timePickerIncrement)*this.timePickerIncrement),this.isShowing||this.updateElement(),this.updateMonthsInView()},setEndDate:function(t){"string"==typeof t&&(this.endDate=A(t,this.locale.format)),"object"==typeof t&&(this.endDate=A(t)),this.timePicker||(this.endDate=this.endDate.endOf("day")),this.timePicker&&this.timePickerIncrement&&this.endDate.minute(Math.round(this.endDate.minute()/this.timePickerIncrement)*this.timePickerIncrement),this.endDate.isBefore(this.startDate)&&(this.endDate=this.startDate.clone()),this.maxDate&&this.endDate.isAfter(this.maxDate)&&(this.endDate=this.maxDate.clone()),this.maxSpan&&this.startDate.clone().add(this.maxSpan).isBefore(this.endDate)&&(this.endDate=this.startDate.clone().add(this.maxSpan)),this.previousRightTime=this.endDate.clone(),this.container.find(".drp-selected").html(this.startDate.format(this.locale.format)+this.locale.separator+this.endDate.format(this.locale.format)),this.isShowing||this.updateElement(),this.updateMonthsInView()},isInvalidDate:function(){return!1},isCustomDate:function(){return!1},updateView:function(){this.timePicker&&(this.renderTimePicker("left"),this.renderTimePicker("right"),this.endDate?this.container.find(".right .calendar-time select").prop("disabled",!1).removeClass("disabled"):this.container.find(".right .calendar-time select").prop("disabled",!0).addClass("disabled")),this.endDate&&this.container.find(".drp-selected").html(this.startDate.format(this.locale.format)+this.locale.separator+this.endDate.format(this.locale.format)),this.updateMonthsInView(),this.updateCalendars(),this.updateFormInputs()},updateMonthsInView:function(){if(this.endDate){if(!this.singleDatePicker&&this.leftCalendar.month&&this.rightCalendar.month&&(this.startDate.format("YYYY-MM")==this.leftCalendar.month.format("YYYY-MM")||this.startDate.format("YYYY-MM")==this.rightCalendar.month.format("YYYY-MM"))&&(this.endDate.format("YYYY-MM")==this.leftCalendar.month.format("YYYY-MM")||this.endDate.format("YYYY-MM")==this.rightCalendar.month.format("YYYY-MM")))return;this.leftCalendar.month=this.startDate.clone().date(2),this.linkedCalendars||this.endDate.month()==this.startDate.month()&&this.endDate.year()==this.startDate.year()?this.rightCalendar.month=this.startDate.clone().date(2).add(1,"month"):this.rightCalendar.month=this.endDate.clone().date(2)}else this.leftCalendar.month.format("YYYY-MM")!=this.startDate.format("YYYY-MM")&&this.rightCalendar.month.format("YYYY-MM")!=this.startDate.format("YYYY-MM")&&(this.leftCalendar.month=this.startDate.clone().date(2),this.rightCalendar.month=this.startDate.clone().date(2).add(1,"month"));this.maxDate&&this.linkedCalendars&&!this.singleDatePicker&&this.rightCalendar.month>this.maxDate&&(this.rightCalendar.month=this.maxDate.clone().date(2),this.leftCalendar.month=this.maxDate.clone().date(2).subtract(1,"month"))},updateCalendars:function(){var t,e,a,i;this.timePicker&&(this.endDate?(e=parseInt(this.container.find(".left .hourselect").val(),10),a=parseInt(this.container.find(".left .minuteselect").val(),10),isNaN(a)&&(a=parseInt(this.container.find(".left .minuteselect option:last").val(),10)),t=this.timePickerSeconds?parseInt(this.container.find(".left .secondselect").val(),10):0,this.timePicker24Hour||("PM"===(i=this.container.find(".left .ampmselect").val())&&e<12&&(e+=12),"AM"===i&&12===e&&(e=0))):(e=parseInt(this.container.find(".right .hourselect").val(),10),a=parseInt(this.container.find(".right .minuteselect").val(),10),isNaN(a)&&(a=parseInt(this.container.find(".right .minuteselect option:last").val(),10)),t=this.timePickerSeconds?parseInt(this.container.find(".right .secondselect").val(),10):0,this.timePicker24Hour||("PM"===(i=this.container.find(".right .ampmselect").val())&&e<12&&(e+=12),"AM"===i&&12===e&&(e=0))),this.leftCalendar.month.hour(e).minute(a).second(t),this.rightCalendar.month.hour(e).minute(a).second(t)),this.renderCalendar("left"),this.renderCalendar("right"),this.container.find(".ranges li").removeClass("active"),null!=this.endDate&&this.calculateChosenLabel()},renderCalendar:function(t){var e="left"==t?this.leftCalendar:this.rightCalendar,a=e.month.month(),i=e.month.year(),s=e.month.hour(),n=e.month.minute(),r=e.month.second(),o=A([i,a]).daysInMonth(),h=A([i,a,1]),i=A([i,a,o]),a=A(h).subtract(1,"month").month(),o=A(h).subtract(1,"month").year(),l=A([o,a]).daysInMonth(),c=h.day();(e=[]).firstDay=h,e.lastDay=i;for(var d=0;d<6;d++)e[d]=[];for(var h=l-c+this.locale.firstDay+1,m=(l<h&&(h-=7),c==this.locale.firstDay&&(h=l-6),A([o,a,h,12,n,r])),d=0,p=0,f=0;d<42;d++,p++,m=A(m).add(24,"hour"))0<d&&p%7==0&&(p=0,f++),e[f][p]=m.clone().hour(s).minute(n).second(r),m.hour(12),this.minDate&&e[f][p].format("YYYY-MM-DD")==this.minDate.format("YYYY-MM-DD")&&e[f][p].isBefore(this.minDate)&&"left"==t&&(e[f][p]=this.minDate.clone()),this.maxDate&&e[f][p].format("YYYY-MM-DD")==this.maxDate.format("YYYY-MM-DD")&&e[f][p].isAfter(this.maxDate)&&"right"==t&&(e[f][p]=this.maxDate.clone());"left"==t?this.leftCalendar.calendar=e:this.rightCalendar.calendar=e;var u="left"==t?this.minDate:this.startDate,D=this.maxDate,g=("left"==t?this.startDate:this.endDate,this.locale.direction,'<table class="table-condensed">'),i=(g=g+"<thead>"+"<tr>",(this.showWeekNumbers||this.showISOWeekNumbers)&&(g+="<th></th>"),u&&!u.isBefore(e.firstDay)||this.linkedCalendars&&"left"!=t?g+="<th></th>":g+='<th class="prev available"><span></span></th>',this.locale.monthNames[e[1][1].month()]+e[1][1].format(" YYYY"));if(this.showDropdowns){for(var y=e[1][1].month(),k=e[1][1].year(),b=D&&D.year()||this.maxYear,c=u&&u.year()||this.minYear,C=k==c,v=k==b,Y='<select class="monthselect">',w=0;w<12;w++)(!C||u&&w>=u.month())&&(!v||D&&w<=D.month())?Y+="<option value='"+w+"'"+(w===y?" selected='selected'":"")+">"+this.locale.monthNames[w]+"</option>":Y+="<option value='"+w+"'"+(w===y?" selected='selected'":"")+" disabled='disabled'>"+this.locale.monthNames[w]+"</option>";Y+="</select>";for(var P='<select class="yearselect">',x=c;x<=b;x++)P+='<option value="'+x+'"'+(x===k?' selected="selected"':"")+">"+x+"</option>";i=Y+(P+="</select>")}g+='<th colspan="5" class="month">'+i+"</th>",D&&!D.isAfter(e.lastDay)||this.linkedCalendars&&"right"!=t&&!this.singleDatePicker?g+="<th></th>":g+='<th class="next available"><span></span></th>',g+="</tr><tr>",(this.showWeekNumbers||this.showISOWeekNumbers)&&(g+='<th class="week">'+this.locale.weekLabel+"</th>"),L.each(this.locale.daysOfWeek,function(t,e){g+="<th>"+e+"</th>"}),g+="</tr></thead><tbody>",null==this.endDate&&this.maxSpan&&(l=this.startDate.clone().add(this.maxSpan).endOf("day"),D&&!l.isBefore(D)||(D=l));for(f=0;f<6;f++){g+="<tr>",this.showWeekNumbers?g+='<td class="week">'+e[f][0].week()+"</td>":this.showISOWeekNumbers&&(g+='<td class="week">'+e[f][0].isoWeek()+"</td>");for(p=0;p<7;p++){for(var M=[],I=(e[f][p].isSame(new Date,"day")&&M.push("today"),5<e[f][p].isoWeekday()&&M.push("weekend"),e[f][p].month()!=e[1][1].month()&&M.push("off","ends"),this.minDate&&e[f][p].isBefore(this.minDate,"day")&&M.push("off","disabled"),D&&e[f][p].isAfter(D,"day")&&M.push("off","disabled"),this.isInvalidDate(e[f][p])&&M.push("off","disabled"),e[f][p].format("YYYY-MM-DD")==this.startDate.format("YYYY-MM-DD")&&M.push("active","start-date"),null!=this.endDate&&e[f][p].format("YYYY-MM-DD")==this.endDate.format("YYYY-MM-DD")&&M.push("active","end-date"),null!=this.endDate&&e[f][p]>this.startDate&&e[f][p]<this.endDate&&M.push("in-range"),this.isCustomDate(e[f][p])),S=(!1!==I&&("string"==typeof I?M.push(I):Array.prototype.push.apply(M,I)),""),B=!1,d=0;d<M.length;d++)S+=M[d]+" ","disabled"==M[d]&&(B=!0);B||(S+="available"),g+='<td class="'+S.replace(/^\s+|\s+$/g,"")+'" data-title="r'+f+"c"+p+'">'+e[f][p].date()+"</td>"}g+="</tr>"}g+="</tbody></table>",this.container.find(".drp-calendar."+t+" .calendar-table").html(g)},renderTimePicker:function(t){if("right"!=t||this.endDate){for(var e,a,i=this.maxDate,s=(!this.maxSpan||this.maxDate&&!this.startDate.clone().add(this.maxSpan).isBefore(this.maxDate)||(i=this.startDate.clone().add(this.maxSpan)),"left"==t?(e=this.startDate.clone(),a=this.minDate):"right"==t&&(e=this.endDate.clone(),a=this.startDate,""!=(s=this.container.find(".drp-calendar.right .calendar-time")).html()&&(e.hour(isNaN(e.hour())?s.find(".hourselect option:selected").val():e.hour()),e.minute(isNaN(e.minute())?s.find(".minuteselect option:selected").val():e.minute()),e.second(isNaN(e.second())?s.find(".secondselect option:selected").val():e.second()),this.timePicker24Hour||("PM"===(s=s.find(".ampmselect option:selected").val())&&e.hour()<12&&e.hour(e.hour()+12),"AM"===s&&12===e.hour()&&e.hour(0))),e.isBefore(this.startDate)&&(e=this.startDate.clone()),i)&&e.isAfter(i)&&(e=i.clone()),d='<select class="hourselect">',this.timePicker24Hour?0:1),n=this.timePicker24Hour?23:12,r=s;r<=n;r++){var o=r,h=(this.timePicker24Hour||(o=12<=e.hour()?12==r?12:r+12:12==r?0:r),e.clone().hour(o)),l=!1;a&&h.minute(59).isBefore(a)&&(l=!0),i&&h.minute(0).isAfter(i)&&(l=!0),o!=e.hour()||l?d+=l?'<option value="'+r+'" disabled="disabled" class="disabled">'+r+"</option>":'<option value="'+r+'">'+r+"</option>":d+='<option value="'+r+'" selected="selected">'+r+"</option>"}for(var c,d=d+"</select> "+': <select class="minuteselect">',r=0;r<60;r+=this.timePickerIncrement){var m=r<10?"0"+r:r,h=e.clone().minute(r),l=!1;a&&h.second(59).isBefore(a)&&(l=!0),i&&h.second(0).isAfter(i)&&(l=!0),e.minute()!=r||l?d+=l?'<option value="'+r+'" disabled="disabled" class="disabled">'+m+"</option>":'<option value="'+r+'">'+m+"</option>":d+='<option value="'+r+'" selected="selected">'+m+"</option>"}if(d+="</select> ",this.timePickerSeconds){d+=': <select class="secondselect">';for(r=0;r<60;r++){m=r<10?"0"+r:r,h=e.clone().second(r),l=!1;a&&h.isBefore(a)&&(l=!0),i&&h.isAfter(i)&&(l=!0),e.second()!=r||l?d+=l?'<option value="'+r+'" disabled="disabled" class="disabled">'+m+"</option>":'<option value="'+r+'">'+m+"</option>":d+='<option value="'+r+'" selected="selected">'+m+"</option>"}d+="</select> "}this.timePicker24Hour||(d+='<select class="ampmselect">',c=s="",a&&e.clone().hour(12).minute(0).second(0).isBefore(a)&&(s=' disabled="disabled" class="disabled"'),i&&e.clone().hour(0).minute(0).second(0).isAfter(i)&&(c=' disabled="disabled" class="disabled"'),12<=e.hour()?d+='<option value="AM"'+s+'>AM</option><option value="PM" selected="selected"'+c+">PM</option>":d+='<option value="AM" selected="selected"'+s+'>AM</option><option value="PM"'+c+">PM</option>",d+="</select>"),this.container.find(".drp-calendar."+t+" .calendar-time").html(d)}},updateFormInputs:function(){this.singleDatePicker||this.endDate&&(this.startDate.isBefore(this.endDate)||this.startDate.isSame(this.endDate))?this.container.find("button.applyBtn").prop("disabled",!1):this.container.find("button.applyBtn").prop("disabled",!0)},move:function(){var t,e={top:0,left:0},a=this.drops,i=L(window).width();switch(this.parentEl.is("body")||(e={top:this.parentEl.offset().top-this.parentEl.scrollTop(),left:this.parentEl.offset().left-this.parentEl.scrollLeft()},i=this.parentEl[0].clientWidth+this.parentEl.offset().left),a){case"auto":(t=this.element.offset().top+this.element.outerHeight()-e.top)+this.container.outerHeight()>=this.parentEl[0].scrollHeight&&(t=this.element.offset().top-this.container.outerHeight()-e.top,a="up");break;case"up":t=this.element.offset().top-this.container.outerHeight()-e.top;break;default:t=this.element.offset().top+this.element.outerHeight()-e.top}this.container.css({top:0,left:0,right:"auto"});var s,n=this.container.outerWidth();this.container.toggleClass("drop-up","up"==a),"left"==this.opens?n+(i=i-this.element.offset().left-this.element.outerWidth())>L(window).width()?this.container.css({top:t,right:"auto",left:9}):this.container.css({top:t,right:i,left:"auto"}):"center"==this.opens?(s=this.element.offset().left-e.left+this.element.outerWidth()/2-n/2)<0?this.container.css({top:t,right:"auto",left:9}):s+n>L(window).width()?this.container.css({top:t,left:"auto",right:0}):this.container.css({top:t,left:s,right:"auto"}):(s=this.element.offset().left-e.left)+n>L(window).width()?this.container.css({top:t,left:"auto",right:0}):this.container.css({top:t,left:s,right:"auto"})},show:function(t){this.isShowing||(this._outsideClickProxy=L.proxy(function(t){this.outsideClick(t)},this),L(document).on("mousedown.daterangepicker",this._outsideClickProxy).on("touchend.daterangepicker",this._outsideClickProxy).on("click.daterangepicker","[data-toggle=dropdown]",this._outsideClickProxy).on("focusin.daterangepicker",this._outsideClickProxy),L(window).on("resize.daterangepicker",L.proxy(function(t){this.move(t)},this)),this.oldStartDate=this.startDate.clone(),this.oldEndDate=this.endDate.clone(),this.previousRightTime=this.endDate.clone(),this.updateView(),this.container.show(),this.move(),this.element.trigger("show.daterangepicker",this),this.isShowing=!0)},hide:function(t){this.isShowing&&(this.endDate||(this.startDate=this.oldStartDate.clone(),this.endDate=this.oldEndDate.clone()),this.startDate.isSame(this.oldStartDate)&&this.endDate.isSame(this.oldEndDate)||this.callback(this.startDate.clone(),this.endDate.clone(),this.chosenLabel),this.updateElement(),L(document).off(".daterangepicker"),L(window).off(".daterangepicker"),this.container.hide(),this.element.trigger("hide.daterangepicker",this),this.isShowing=!1)},toggle:function(t){this.isShowing?this.hide():this.show()},outsideClick:function(t){var e=L(t.target);"focusin"==t.type||e.closest(this.element).length||e.closest(this.container).length||e.closest(".calendar-table").length||(this.hide(),this.element.trigger("outsideClick.daterangepicker",this))},showCalendars:function(){this.container.addClass("show-calendar"),this.move(),this.element.trigger("showCalendar.daterangepicker",this)},hideCalendars:function(){this.container.removeClass("show-calendar"),this.element.trigger("hideCalendar.daterangepicker",this)},clickRange:function(t){var t=t.target.getAttribute("data-range-key");(this.chosenLabel=t)==this.locale.customRangeLabel?this.showCalendars():(t=this.ranges[t],this.startDate=t[0],this.endDate=t[1],this.timePicker||(this.startDate.startOf("day"),this.endDate.endOf("day")),this.alwaysShowCalendars||this.hideCalendars(),this.clickApply())},clickPrev:function(t){L(t.target).parents(".drp-calendar").hasClass("left")&&(this.leftCalendar.month.subtract(1,"month"),!this.linkedCalendars)||this.rightCalendar.month.subtract(1,"month"),this.updateCalendars()},clickNext:function(t){(L(t.target).parents(".drp-calendar").hasClass("left")||(this.rightCalendar.month.add(1,"month"),this.linkedCalendars))&&this.leftCalendar.month.add(1,"month"),this.updateCalendars()},hoverDate:function(t){var e,a,s,n,r,o;L(t.target).hasClass("available")&&(e=(a=L(t.target).attr("data-title")).substr(1,1),a=a.substr(3,1),s=(L(t.target).parents(".drp-calendar").hasClass("left")?this.leftCalendar:this.rightCalendar).calendar[e][a],n=this.leftCalendar,r=this.rightCalendar,o=this.startDate,this.endDate||this.container.find(".drp-calendar tbody td").each(function(t,e){var a,i;L(e).hasClass("week")||(i=(a=L(e).attr("data-title")).substr(1,1),a=a.substr(3,1),(i=(L(e).parents(".drp-calendar").hasClass("left")?n:r).calendar[i][a]).isAfter(o)&&i.isBefore(s)||i.isSame(s,"day")?L(e).addClass("in-range"):L(e).removeClass("in-range"))}))},clickDate:function(t){var e,a,i,s,n,r;L(t.target).hasClass("available")&&(a=(e=L(t.target).attr("data-title")).substr(1,1),e=e.substr(3,1),a=(L(t.target).parents(".drp-calendar").hasClass("left")?this.leftCalendar:this.rightCalendar).calendar[a][e],this.endDate||a.isBefore(this.startDate,"day")?(this.timePicker&&(i=parseInt(this.container.find(".left .hourselect").val(),10),this.timePicker24Hour||("PM"===(s=this.container.find(".left .ampmselect").val())&&i<12&&(i+=12),"AM"===s&&12===i&&(i=0)),n=parseInt(this.container.find(".left .minuteselect").val(),10),isNaN(n)&&(n=parseInt(this.container.find(".left .minuteselect option:last").val(),10)),r=this.timePickerSeconds?parseInt(this.container.find(".left .secondselect").val(),10):0,a=a.clone().hour(i).minute(n).second(r)),this.endDate=null,this.setStartDate(a.clone())):!this.endDate&&a.isBefore(this.startDate)?this.setEndDate(this.startDate.clone()):(this.timePicker&&(i=parseInt(this.container.find(".right .hourselect").val(),10),this.timePicker24Hour||("PM"===(s=this.container.find(".right .ampmselect").val())&&i<12&&(i+=12),"AM"===s&&12===i&&(i=0)),n=parseInt(this.container.find(".right .minuteselect").val(),10),isNaN(n)&&(n=parseInt(this.container.find(".right .minuteselect option:last").val(),10)),r=this.timePickerSeconds?parseInt(this.container.find(".right .secondselect").val(),10):0,a=a.clone().hour(i).minute(n).second(r)),this.setEndDate(a.clone()),this.autoApply&&(this.calculateChosenLabel(),this.clickApply())),this.singleDatePicker&&(this.setEndDate(this.startDate),!this.timePicker)&&this.autoApply&&this.clickApply(),this.updateView(),t.stopPropagation())},calculateChosenLabel:function(){var t,e=!0,a=0;for(t in this.ranges){if(this.timePicker){var i=this.timePickerSeconds?"YYYY-MM-DD HH:mm:ss":"YYYY-MM-DD HH:mm";if(this.startDate.format(i)==this.ranges[t][0].format(i)&&this.endDate.format(i)==this.ranges[t][1].format(i)){e=!1,this.chosenLabel=this.container.find(".ranges li:eq("+a+")").addClass("active").attr("data-range-key");break}}else if(this.startDate.format("YYYY-MM-DD")==this.ranges[t][0].format("YYYY-MM-DD")&&this.endDate.format("YYYY-MM-DD")==this.ranges[t][1].format("YYYY-MM-DD")){e=!1,this.chosenLabel=this.container.find(".ranges li:eq("+a+")").addClass("active").attr("data-range-key");break}a++}e&&(this.showCustomRangeLabel?this.chosenLabel=this.container.find(".ranges li:last").addClass("active").attr("data-range-key"):this.chosenLabel=null,this.showCalendars())},clickApply:function(t){this.hide(),this.element.trigger("apply.daterangepicker",this)},clickCancel:function(t){this.startDate=this.oldStartDate,this.endDate=this.oldEndDate,this.hide(),this.element.trigger("cancel.daterangepicker",this)},monthOrYearChanged:function(t){var t=L(t.target).closest(".drp-calendar").hasClass("left"),e=this.container.find(".drp-calendar."+(t?"left":"right")),a=parseInt(e.find(".monthselect").val(),10),e=e.find(".yearselect").val();t||(e<this.startDate.year()||e==this.startDate.year()&&a<this.startDate.month())&&(a=this.startDate.month(),e=this.startDate.year()),this.minDate&&(e<this.minDate.year()||e==this.minDate.year()&&a<this.minDate.month())&&(a=this.minDate.month(),e=this.minDate.year()),this.maxDate&&(e>this.maxDate.year()||e==this.maxDate.year()&&a>this.maxDate.month())&&(a=this.maxDate.month(),e=this.maxDate.year()),t?(this.leftCalendar.month.month(a).year(e),this.linkedCalendars&&(this.rightCalendar.month=this.leftCalendar.month.clone().add(1,"month"))):(this.rightCalendar.month.month(a).year(e),this.linkedCalendars&&(this.leftCalendar.month=this.rightCalendar.month.clone().subtract(1,"month"))),this.updateCalendars()},timeChanged:function(t){var t=L(t.target).closest(".drp-calendar"),e=t.hasClass("left"),a=parseInt(t.find(".hourselect").val(),10),i=parseInt(t.find(".minuteselect").val(),10),s=(isNaN(i)&&(i=parseInt(t.find(".minuteselect option:last").val(),10)),this.timePickerSeconds?parseInt(t.find(".secondselect").val(),10):0);this.timePicker24Hour||("PM"===(t=t.find(".ampmselect").val())&&a<12&&(a+=12),"AM"===t&&12===a&&(a=0)),e?((t=this.startDate.clone()).hour(a),t.minute(i),t.second(s),this.setStartDate(t),this.singleDatePicker?this.endDate=this.startDate.clone():this.endDate&&this.endDate.format("YYYY-MM-DD")==t.format("YYYY-MM-DD")&&this.endDate.isBefore(t)&&this.setEndDate(t.clone())):this.endDate&&((e=this.endDate.clone()).hour(a),e.minute(i),e.second(s),this.setEndDate(e)),this.updateCalendars(),this.updateFormInputs(),this.renderTimePicker("left"),this.renderTimePicker("right")},elementChanged:function(){var t,e,a;this.element.is("input")&&this.element.val().length&&(a=e=null,2===(t=this.element.val().split(this.locale.separator)).length&&(e=A(t[0],this.locale.format),a=A(t[1],this.locale.format)),!this.singleDatePicker&&null!==e&&null!==a||(a=e=A(this.element.val(),this.locale.format)),e.isValid())&&a.isValid()&&(this.setStartDate(e),this.setEndDate(a),this.updateView())},keydown:function(t){9!==t.keyCode&&13!==t.keyCode||this.hide(),27===t.keyCode&&(t.preventDefault(),t.stopPropagation(),this.hide())},updateElement:function(){var t;this.element.is("input")&&this.autoUpdateInput&&(t=this.startDate.format(this.locale.format),this.singleDatePicker||(t+=this.locale.separator+this.endDate.format(this.locale.format)),t!==this.element.val())&&this.element.val(t).trigger("change")},remove:function(){this.container.remove(),this.element.off(".daterangepicker"),this.element.removeData()}},L.fn.daterangepicker=function(t,e){var a=L.extend(!0,{},L.fn.daterangepicker.defaultOptions,t);return this.each(function(){var t=L(this);t.data("daterangepicker")&&t.data("daterangepicker").remove(),t.data("daterangepicker",new i(t,a,e))}),this},i});