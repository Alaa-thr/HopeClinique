function getText(idText,idLettre) {

   document.getElementById("causeUpdateBtn").value = idText;
   document.getElementById("idLettre").value = idLettre;
   document.getElementById('updateButton').style.display = 'block';
   document.getElementById('addButton').style.display = 'none'; 
}

function cancelUpdate() {

   document.getElementById("idLettre").value = "";
   document.getElementById("causeUpdateBtn").value = "";
   document.getElementById('updateButton').style.display = 'none';
   document.getElementById('addButton').style.display = 'block'; 
}

function deleteLettre() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('deleteBtn').submit();
      }
    })
}