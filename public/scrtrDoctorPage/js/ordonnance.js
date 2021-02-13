
var idDiv = 1;
function deleteLigne(idSelect,idDose,idDuree,idMoment,idHide) {

  document.getElementById(idSelect.id).style.display = 'none';
  document.getElementById(idDose.id).style.display = 'none';
  document.getElementById(idDuree.id).style.display = 'none';
  document.getElementById(idMoment.id).style.display = 'none';
  document.getElementById(idHide.id).style.display = 'none';
  console.log(document.getElementById("medicament"));
}

function deleteOrdonnance() {
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