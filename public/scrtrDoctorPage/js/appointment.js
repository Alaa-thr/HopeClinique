	var tempDebut = 0,tempFin = 0;
    function addInfoPatient(e) {
        if(e.target.value == ""){
            document.getElementById("email").value = null;
            document.getElementById("phone_number").value = null;
        }else{
            $.ajax({
                type: 'get',
                url: 'getPatientSelected/'+e.target.value,
                success: function(data) {
                    document.getElementById("email").value = data.email;
                    document.getElementById("phone_number").value = data.phone;
                },
                error:function(error){
                    console.log(error);
                }
            });
        }

    }
    function checkTime(time) {
        
        if(time.name == 'time_beging'){
            tempDebut = time.value;
        }else{
            tempFin = time.value;
        }

        if(tempDebut > tempFin){
            document.getElementById('tempDebutSuppr').style.display = 'block';
            document.getElementById('createAppointmentButton').disabled = true;
            document.getElementById('time_beging').classList.add('is-invalid');
        }else if(tempDebut <= tempFin){
            document.getElementById('tempDebutSuppr').style.display = 'none';
            document.getElementById('time_beging').classList.remove('is-invalid');
            document.getElementById('createAppointmentButton').disabled = false;
        }
        if(tempDebut != 0 && tempFin != 0 && document.getElementById("date").value != 0 ){
            checkAppointmentDate(document.getElementById("date"));
        }
    }
    function checkAppointmentDate(date) {
        
        if(tempDebut != 0 && tempFin != 0){
            $.ajax({
                type: 'get',
                url: 'checkDateAppointment/'+date.value+'/'+tempDebut+'/'+tempFin,
                success: function(data) {
                    if(data.appointmentExist){
                        document.getElementById('dateExiste').style.display = 'block';
                        document.getElementById('createAppointmentButton').disabled = true;
                        document.getElementById('date').classList.add('is-invalid');
                    }else{
                        document.getElementById('dateExiste').style.display = 'none';
                        document.getElementById('createAppointmentButton').disabled = false;
                        document.getElementById('date').classList.remove('is-invalid');
                    }
                },
                error:function(error){
                    console.log('error',error);
                }
            });
        }
      
    }
