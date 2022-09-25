<script>
    $('body').on('click','#btn-delete-contact',function(){

        let contact_id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr('content');

        //show notification
        Swal.fire({
           title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
         }).then((result) => {
            if(result.isConfirmed){
                console.log('test');
                
                //fetch ajax
                $.ajax({
                    url:`/contacts/${contact_id}`,
                    type:'delete',
                    cache:false,
                    data:{
                        "_token" :token
                    },
                    success:function(response){

                        //show message or notification
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        
                        //remove contact from table
                        $(`#index_${contact_id}`).remove();
                    }
                });
            }
        });
    });
</script>