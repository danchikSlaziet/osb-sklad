// ajax
$("#addReviews").submit(function () {
    let html = document.querySelector('html');
    let $this = $(this);
    let action = $this.attr('action') + '?RND='+ Math.random();
    let formData = new FormData(document.forms.contactForm);

    // console.log(action)
    // console.log(formData)

    $.ajax({
        type: "POST",
        url: action,
        dataType: 'json',
        data: formData,
        contentType: false,
        processData: false,
        success: function(msg) {
            if (msg == 'OK') {
                alert(msg)
                // openPopup('Спасибо за отзыв!', 'success', 5000)

            }else{
                // openPopup(msg.text, 'danger')
                alert(msg)
                return false;
            }
        }
    });
    return false;
});