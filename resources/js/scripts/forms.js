import ENV from './routes.js';
$(document).ready(function(){
   let form = $('#form_date');
   form.on('submit',function(e){
        e.preventDefault();
        let form ={
            'anio':$('#anio').val(),
            'ticket':$('#ticket').val()
        },
        dates = JSON.stringify(form);
        console.log(dates);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: "application/json; charset=utf-8",
            url:ENV.datos,
            method:'POST',
            data:dates,
            
            success:function(response){
                console.log(response);
            }
        });
   })
})