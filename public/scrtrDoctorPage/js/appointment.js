	function addInfoPatient(e) {
        if(e.target.value == ""){
            document.getElementById("email").value = null;
            document.getElementById("phone_number").value = null;
        }else{
            console.log(e.target.value);
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
