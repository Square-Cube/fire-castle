$('.subscribe-form').on('submit' ,function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var form = $(this);

    $.ajax({
        method: "POST",
        url: url,
        data: form.serialize(),
        dataType: "json",
        success: function (data) {
            if (data.response === "success") {
                var alertSelector = '#headLogActionSuccess';
                var alertOpSelector = '#headLogActionError';
            } else if (data.response === "error") {
                var alertSelector = '#headLogActionError';
                var alertOpSelector = '#headLogActionSuccess';
            }
            $(alertSelector).text(data.message);
            $(alertSelector).hide().removeClass('hidden').fadeIn();
            setTimeout(function () {
                $(alertSelector).fadeOut().addClass('hidden');
            }, 3000);
            $(alertOpSelector).fadeOut().addClass('hidden');
            if (data.response === "success") {
                form.get(0).reset();
            }
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });

    return false;
});

/**
 * career form
 */
$('.career-form').on('submit' ,function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var form = $(this);

    $.ajax({
        method: "POST",
        url: url,
        data: new FormData(form[0]),
        dataType: "json",
        contentType:false,
        cache: false,
        processData:false,
        success: function (data) {
            if (data.response === "success") {
                var alertSelector = '.headLogActionSuccess';
                var alertOpSelector = '.headLogActionError';
            } else if (data.response === "error") {
                var alertSelector = '.headLogActionError';
                var alertOpSelector = '.headLogActionSuccess';
            }
            $(alertSelector).html(data.message);
            $(alertSelector).hide().removeClass('hidden').fadeIn();
            setTimeout(function () {
                $(alertSelector).fadeOut().addClass('hidden');
            }, 3000);
            $(alertOpSelector).fadeOut().addClass('hidden');
            if (data.response === "success") {
                form.get(0).reset();
            }
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });

    return false;
});


/**
 * contact form
 */
$('.contact-form').on('submit' ,function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var form = $(this);

    $.ajax({
        method: "POST",
        url: url,
        data: form.serialize(),
        dataType: "json",
        success: function (data) {
            if (data.response === "success") {
                var alertSelector = '.headLogActionSuccess';
                var alertOpSelector = '.headLogActionError';
            } else if (data.response === "error") {
                var alertSelector = '.headLogActionError';
                var alertOpSelector = '.headLogActionSuccess';
            }
            $(alertSelector).html(data.message);
            $(alertSelector).hide().removeClass('hidden').fadeIn();
            setTimeout(function () {
                $(alertSelector).fadeOut().addClass('hidden');
            }, 3000);
            $(alertOpSelector).fadeOut().addClass('hidden');
            if (data.response === "success") {
                form.get(0).reset();
            }
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });

    return false;
});
