// Helper Functions

const send_notification = (err_arr, msg_type = "error") => {
    
    const text_color = {
        "error": "danger",
        "success": "success"
    };
    
    for(let i = 0; i < err_arr.length; i++){
        $('.error-notification').append(`<li class="text-${text_color[msg_type]}">${err_arr[i]}</li>`);
    }
}


const changeStateOfInput = (value = false) => {
    $('#s-name').prop('disabled', value);
    $('#s-email').prop('disabled', value);
    $('#s-phone').prop('disabled', value);
    $('#s-phone-2').prop('disabled', value);
    $('#s-section').prop('disabled', value);
}


$('#edit-btn').on('click', function(){
    changeStateOfInput(false);
    $('#update-btn').show();
    console.log('Running');
})

const validateInputs = (sname,semail,sphone,section,alternate_number) => {
    const section_array = ["M1","M2","E1","E2","None"];
    const error_array = [];
    let regex_name = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
    if(!regex_name.test(sname)){
        error_array.push('Enter a Valid Name');
    }
    
    let regex_phone = /^\d{10}$/;
    if(!regex_phone.test(sphone)){
        error_array.push('Enter a Valid 10 Digit Mobile Number');
    }
    
    let regex_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!regex_email.test(semail)) {
        error_array.push('Enter a Valid Email');
    }
    
    if(section_array.indexOf(section) < 0){
        error_array.push('Choose a section from the dropdown.');
    }
    
    if(alternate_number.length !== 0){
        if(!regex_phone.test(alternate_number)){
            error_array.push('Enter a Valid 10 Digit Alternate Number');
        } 
    }
    return error_array;
    
}

// End


const fetchDetails = (ID) => {
    $.ajax({
        method: 'POST',
        url: './includes/fetch_details.php',
        data: {
            'fetch_details': 1,
            'id': ID
        },
        success: function(result){
            $.each(result, function(index,value){
                $(`#s-${index}`).val(value);
            })
        }
    })
}





const updateDetails = (ID) => {
    $('.error-notification').html('');
    
    let sname = document.querySelector('#s-name').value;
    let semail = document.querySelector('#s-email').value;
    let sphone = document.querySelector('#s-phone').value;
    let section = document.querySelector('#s-section').value;
    let alt_phone = document.querySelector('#s-phone-2').value;
    console.log(alt_phone);
    
    const error_array = validateInputs(sname,semail,sphone,section,alt_phone);
    console.log(error_array);
    if(error_array.length > 0){
        send_notification(error_array);
    }else{
        console.log('Sending POST Req');
        $.ajax({
            method:'POST',
            url:'./includes/fetch_details.php',
            data: {
                'update_details': 1,
                'id': ID,
                's_name': sname,
                's_email': semail,
                's_phone': sphone,
                's_section': section,
                'alt_phone': alt_phone
            },
            success: function(result){
                console.log(result.status_code);
                if(result['status_code'] == 200){
                    $('.error-notification').append(`<div class="alert alert-success">${result['success_message']} <i class="fa fa-check-circle-o" aria-hidden="true"></i> </div>`);
                    fetchDetails(ID);
                    $('#update-btn').hide();
                    changeStateOfInput(true);
                }else{
                    send_notification(result);
                }
            }
        });    
    }
    
    
}