
document.addEventListener('DOMContentLoaded', function() {

  var events = [];
  var idDoc = document.getElementById('idDoc').value;
  var calendarEl = document.getElementById('calendar');
  var calendar;
  $.ajax({
      type: 'get',
      url: '/getEventsDoctor/'+idDoc,
      success: function(data) {
        var i;
        for( i =0; i < data.events.length ; i++){
    
         events.push({title: data.events[i]['nom']+' '+data.events[i]['prenom'] , start: data.events[i]['date']+'T'+data.events[i]['heure_debut'], end:data.events[i]['date']+'T'+data.events[i]['heure_fin']  });
        }
        
        calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
          
          navLinks: true, // can click day/week names to navigate views
          businessHours: true, // display business hours
          editable: true,
          selectable: true,
          events: events
        });
 
        calendar.render();
      },
      error:function(error){
        console.log('error',error);
      }
  });
});