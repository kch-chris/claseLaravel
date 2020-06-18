$(document).ready( function () {
    $('#productsTable').DataTable();
} );

function checkDelete(e,id)
{
    e.preventDefault();

    $('#confirmModal').modal('show');

    $('[data-response="ok"]').on('click', function() {
        $('#confirmModal').modal('hide');
        $('#'+id).submit();
     });
}