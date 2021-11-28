$(document).ready(function() {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('.nav .btn').click('.btn', function() {
        $('.nav .btn').removeClass('btn-Info')
        $(this).addClass('btn-Info')
    })
    $('.dropdown-menu .dropdown-item').click(function() {
        var gia = $(this).html()
        $('#dropdownMenuButton1').html(gia)
    })

    var action = "Phổ biến"

    $.ajax({
        url: "view_book.php",
        method: "POST",
        data: {
            action: action,
        },
        success: function(dt) {
            $('#view_book').html(dt)
        }
    })
    a = 1
    $('#page h6').click(function() {

        sotrang = $('#page_get').attr('sotrang')
        if (a < sotrang) {
            a = a + 1;
            // console.log(a);
            $('#page_get').attr('tranghientai', a)
            $.ajax({
                url: "view_book.php",
                method: "get",
                data: {
                    tranghientai: a
                },
                success: function(dt) {
                    $('#view_book').append(dt)
                }
            })
        } else {
            alert('Đã hết hiển thị hết sách .')
        }

    })

    $('.nav .btn_nav').click(function() {
        action = $(this).html();
        a = 1;
        $('#page h6').css('display', '')
        $.ajax({
            url: "view_book.php",
            method: "POST",
            data: {
                action: action,

            },
            success: function(dt) {
                $('#view_book').html(dt)
            }
        })
    })

    $('.dropdown-item').click(function() {
        action = $(this).html();
        $('#page h6').css('display', '')
        // alert(action);
        // alert(action)
        a = 1
        $.ajax({
            url: "view_book.php",
            method: "POST",
            data: {
                action: action
            },
            success: function(dt) {
                $('#view_book').html(dt)

            }
        })
    })
    $('.nav-item').click(function(e) {
        e.preventDefault();
        id = $(this).attr('id');
        $('.nav-item').removeClass('act')
        $(this).addClass('act');
        // alert(id)
        a = 1
        $.ajax({
            url: "view_book.php",
            method: "POST",
            data: {
                tl_id: id
            },
            success: function(dt) {
                $('#view_book').html(dt)
                $('#page h6').css('display', '')
            }
        })
    })

    $('#wrapper').click(function() {
        $('#list_sach').css({
            "display": "none"
        })
        get_ip = $('#val_ip').attr('get_ip')
        if (get_ip != '') {
            $('#search_ip').val(get_ip);
        }
    })

    $('#search_ip').keyup(function() {
        value = $(this).val();
        if (value == '') {

            $('#list_sach').html('');
        } else {
            $('#list_sach').html('');
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {
                    value: value
                },
                success: function(dt) {
                    $('#list_sach').css({
                        "display": "block"
                    })
                    // $('#wrapper').css({"background":"rgb(0 0 0 / 53%)"})                      
                    $('#list_sach').html(dt);
                }
            })
        }

    })

    $('#btn_search').click(function() {
        get_search = $('#val_ip').attr('id_ip');
        action = "search"
        if (typeof(get_search) == 'string') {
            $.ajax({
                url: "view_book.php",
                method: "POST",
                data: {
                    get_search: get_search,
                    action: action
                },
                success: function(dt) {
                    $('#view_book').html(dt);
                    $('#page h6').css('display', 'none')
                }
            })
        }else{
            alert('Không tìm thấy sách của bạn!')
        }



        // alert(get_search);


    })
    // $('.page-item').live('click', function() {
    //     a = $(this).attr('id')
    //     alert(a)
    //     $.ajax({
    //         url: "view_book.php",
    //         method: "GET",
    //         data: {
    //             tranghientai: a
    //         },
    //         success: function(dt) {
    //             $('#view_book').html(dt);
    //         }
    //     })
    // });




})