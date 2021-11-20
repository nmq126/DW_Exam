$(document).ready(function () {
    $("form[name=student-form]").validate({
        rules: {
            name: "required",
            email: "required",
            phone: {
                required: true,
                number: true
            },
            feedback:{
                required: true,
                minlength: 50
            }
        },
        messages: {
            name: "Vui lòng nhập tên",
            email: "Vui lòng nhập email",
            phone:{
                required: "Vui lòng nhập số điện thoại",
                number: "Số điện thoại không đúng định dạng"
            },
            feedback: {
                required: "Vui lòng nhập feedback",
                minlength: "Feedback ít nhất 50 từ"
            }
        },
        submitHandler: function () {
            submitData();
        }
    });

})

function submitData() {
    $(".submit-text").hide();
    $(".spinner-border").show();
    let inputName = $('input[name=name]');
    let inputEmail = $('input[name=email]');
    let inputPhone = $('input[name=phone]');
    let inputFeedback = $('textarea[name=feedback]');

    let data = {
        name: inputName.val(),
        email: inputEmail.val(),
        phone: inputPhone.val(),
        feedback: inputFeedback.val()
    }
    $.ajax({
        url: 'http://localhost/student_feedback/server/store_feedback.php',
        method: 'POST',
        data: JSON.stringify(data),
        success: function (responseData) {
            alert(responseData.message);
            location.reload();

        },
        error: function () {
            alert('Something is wrong!!');
            location.reload();

        }
    })

}



