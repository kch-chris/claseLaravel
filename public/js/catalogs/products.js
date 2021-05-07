$(document).ready( function () {
    if(window.location.pathname=='/products')
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


function saveProduct(e)
{
    $.ajaxSetup({

        headers: {
    
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    
    });
    e.preventDefault();

    let description= $('#description').val();
    let name= $('#name').val();
    let price= $('#price').val();
    let cost= $('#cost').val();
    
    let data = { description: description,  name : name , price : price , cost : cost };

    console.log(data);
    $.ajax({
        
        type:'POST',

        url:'/products',

        data:data,

        success:function(res){

           if(res.status)
           {
                Swal.fire({
                    title: 'Producto',
                    text: res.message,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3500
                });
               window.location.href="/products";
           }
           else
           {
            Swal.fire({
                title: 'Usuario',
                text: res.message,
                icon: 'error',
                showConfirmButton: true
            });
           }

        },
        error: function(res){
             let errors= res.responseJSON.errors;
             
             errors = Object.values(errors);
            
            let errors2 =errors.reduce(function(e1, e2){
                return e1 + '<br>'+ e2;
            });

            Swal.fire({
                title: 'Usuario',
                html: errors2,
                icon: 'error',
                showConfirmButton: true
            });
        }

     });
}


function updateProduct(e)
{
    $.ajaxSetup({

        headers: {
    
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    
    });
    e.preventDefault();
    let ID = $("#productID").val()
    let description= $('#description').val();
    let name= $('#name').val();
    let price= $('#price').val();
    let cost= $('#cost').val();
    
    let data = { description: description,  name : name , price : price , cost : cost };

    console.log(data);
    $.ajax({
        
        type:'POST',

        url:'/products/'+ID,

        data:data,

        success:function(res){
            console.log(res)
           if(res.status)
           {
                Swal.fire({
                    title: 'Producto',
                    text: res.message,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3500
                });
               window.location.href="/products";
           }
           else
           {
            Swal.fire({
                title: 'Producto',
                text: res.message,
                icon: 'error',
                showConfirmButton: true
            });
           }

        },
        error: function(res){
            console.log(res);
        }

     });
}