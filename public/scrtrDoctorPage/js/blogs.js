function deleteUser() {
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
function UpdateUser() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger',
      confirmButtonText: 'Yes, Updated it!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('updateBtn').submit();
      }
    })
}
