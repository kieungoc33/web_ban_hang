$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id, url){
    if(confirm('Bạn có chắc chắn muốn xóa không?')){
        $.ajax({
            url: url,
            type: 'DELETE',
            datatype: 'JSON',
            data :{id},
            success: function(result){
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa thất bại!');
                }
            }
        });
    }
}