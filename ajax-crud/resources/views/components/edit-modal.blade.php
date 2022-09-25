<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="contact_id">
                <div class="mb-3">
                    <label for="name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="email-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email-edit"></div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="col-form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-phone-edit"></div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="store-edit">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('body').on('click', '#btn-edit-contact', function () {  
        
        let contact_id = $(this).data('id');

        $.ajax({
            
            url:`/contacts/${contact_id}`,
            type:"GET",
            cache:false,
            success:function(response){
                // data form
 
                $('#contact_id').val(response.data.id);
                $('#name-edit').val(response.data.name);
                $('#email-edit').val(response.data.email);
                $('#phone-edit').val(response.data.phone);
                //open modal
                $('#modal-edit').modal('show');
            }
        })

    });

    //save or store-edit-edit
    
    $('#store-edit').click(function(e){
        
       e.preventDefault();

        //define variabel
        let contact_id = $('#contact_id').val();
        let name = $('#name-edit').val();
        let email = $('#email-edit').val();
        let phone = $('#phone-edit').val();
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url:`/contacts/${contact_id}`,
            type:'PUT',
            cache:false,
            data:{
                'name':name,
                'email':email,
                'phone':phone,
                '_token':token
            },
            success:function(response){
                //show success message
               Swal.fire({
                    title: 'success!',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer:2000
                 })

                //data contact
                let contact = `
                <tr id="index_${response.data.id}">
                    <td>${response.data.name}</td>
                    <td>${response.data.email}</td>
                    <td>${response.data.phone}</td>
              
                    <td>
                        <a href="javascript:void(0)" id="btn-edit-contact" data-id="${response.data.id}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <a href="javascript:void(0)" id="btn-delete-contact" data-id="${response.data.id}"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                `;

                //masukan ke tabel
                $(`#index_${response.data.id}`).replaceWith(contact);

                //close modal
                $('#modal-add').modal('hide');
            },
            
            error:function(error){
                if(error.responseJSON.name[0]){
                    //show alert
                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');
                    
                    //add message to alert
                    $('#alert-name-edit').html(error.responseJSON.name[0]);
                }
                if(error.responseJSON.email[0]){
                //show alert
                $('#alert-email-edit').removeClass('d-none');
                $('#alert-email-edit').addClass('d-block');
                
                //add message to alert
                $('#alert-email-edit').html(error.responseJSON.email[0]);
                }
                if(error.responseJSON.phone[0]){
                //show alert
                $('#alert-phone-edit').removeClass('d-none');
                $('#alert-phone-edit').addClass('d-block');
                
                //add message to alert
                $('#alert-phone-edit').html(error.responseJSON.phone[0]);
                }
                
            }
        });

    });


</script>