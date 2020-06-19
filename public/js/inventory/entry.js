var detEntry = [];

$(document).ready( function () {
    
    if(window.location.pathname=='/inventoryEntry')
      {
        $('#inventoryEntryTable').DataTable();
      }  

    if(detEntry.length)
        detTable();

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

function addDetEntry(){

    let productId = $('#productsID option:selected').val();
    let product = $('#productsID option:selected').text();
    
    let cantidad = $('#quantity').val();

    $('#detEntry > tbody').html("");
    let inArray= detEntry.findIndex(entry => entry.id==productId);    
    console.log(inArray);
    if(inArray<0)
        detEntry.push({id: productId, name: product, quantity:cantidad});
    else
        detEntry[inArray].quantity= parseInt(detEntry[inArray].quantity) +parseInt(cantidad);

        detTable();   

}

function delDetEntry(id)
{
    let inArray= detEntry.findIndex(entry => entry.id==id);    

    detEntry.splice(inArray,1);

    $('#'+id).remove();
}

function detTable(){
    detEntry.forEach(element => {
        $('#detEntry tbody').append('<tr id="'+element.id+'"><td>'+element.name+'</td><td>'+element.quantity+'</td><td><a href="#" onclick="delDetEntry('+element.id+')"><i class="fa fa-trash"></i></a></td></tr>');
   }); 
}

function saveEntry(e)
{
    $.ajaxSetup({

        headers: {
    
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    
    });
    e.preventDefault();

    let description= $('#description').val();
    //let totalPieces = detEntry.reduce((a,b) => parseInt(a) + parseInt(b.quantity) ,0 );
    let data = { description: description,  details : detEntry };
    $.ajax({

        type:'POST',

        url:'/inventoryEntry',

        data:data,

        success:function(res){

           if(res.success=="ok")
           {
                Swal.fire({
                    title: 'Entrada',
                    text: 'Entrada registrada con Exito',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
               window.location.href="/inventoryEntry";
           }
           else
           console.log(res);

        }

     });
}