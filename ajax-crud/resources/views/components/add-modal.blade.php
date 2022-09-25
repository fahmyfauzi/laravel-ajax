<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone:</label>
                        <input type="text" class="form-control" id="phone">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-phone"></div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="store">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('body').on('click', '#btn-add-contact', function () {  
        //open modal
        $('#modal-add').modal('show');

    });

    //save or store
    $('#store').click(function(e){
        
       e.preventDefault();

        //define variabel
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: `/contacts`,
            type:'post',
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
                $('#table-contacts').prepend(contact);

                //clear form
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');

                //close modal
                $('#modal-add').modal('hide');
            },
            error:function(error){
                if(error.responseJSON.name[0]){
                    //show alert
                    $('#alert-name').removeClass('d-none');
                    $('#alert-name').addClass('d-block');
                    
                    //add message to alert
                    $('#alert-name').html(error.responseJSON.name[0]);
                }
                if(error.responseJSON.email[0]){
                //show alert
                $('#alert-email').removeClass('d-none');
                $('#alert-email').addClass('d-block');
                
                //add message to alert
                $('#alert-email').html(error.responseJSON.email[0]);
                }
                if(error.responseJSON.phone[0]){
                //show alert
                $('#alert-phone').removeClass('d-none');
                $('#alert-phone').addClass('d-block');
                
                //add message to alert
                $('#alert-phone').html(error.responseJSON.phone[0]);
                }
                
            }
        });

    });

   

</script>