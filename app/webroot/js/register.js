$(function(){
   $('#StudentScheduleWeek').on('change',function(){
       $.get('./open_periods/' + $(this).val(),function(data){console.log(data);
            $("#StudentScheduleDay").html('');
            $("#StudentSchedulePeriod").html('');
            $("#StudentScheduleDay").append("<option value=''></option>");
       $.each(data, function(day, periods)
           {
               window[day]=periods;
              
               $("#StudentScheduleDay").append("<option value='"+day+"'>"+day+"</option>");
           });
       },'json');
   });
   $('#StudentScheduleDay').on('change',function(){
            $("#StudentSchedulePeriod").html('');
            $("#StudentSchedulePeriod").append("<option value=''></option>");
       $.each(window[$(this).val()], function(id, period)
           {
               disabled = period.indexOf('FULL') !== -1;
               $("#StudentSchedulePeriod").append("<option value='"+id+"'"+(disabled?'disabled':'')+">"+period+"</option>");
           });
       
   });
});