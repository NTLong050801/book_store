$(document).ready(function () {
    fetch_data()

    function fetch_data() {
        $.ajax({
            url: "data_cart.php",
            method: "POST",
            data: {

            },
            success: function (dt) {
                if (dt != '') {
                    $('#data').html(dt)
                    //alert(dt)
                }
                if (dt == '') {
                    $('#tbl_data').html('<div><label for="">Giỏ hàng của bạn còn trống</label><br><a href="index.php"><button class="btn btn-success">Mua ngay</button></a></div>')
                }
            }
        })

    }


    $(document).on('click', '.delete', function () {
        s_id = $(this).attr('id_delete');
        var action = "delete"
        s_ids = [];
        $('.check').each(function () {
            if ($(this).prop("checked") == true) {
                s_ids.push($(this).attr("s_id"));
            }
        })
        $.ajax({
            url: "data_cart.php",
            method: "POST",
            data: {
                s_id: s_id,
                action: action,
            },
            success: function () {
                // alert(dt)
                $.ajax({
                    url: "data_cart.php",
                    method: "POST",
                    data: {},
                    success: function (dt) {
                        if (dt != '') {
                            
                            //alert(dt)

                            // $('.check').each(function () {
                            //     for (i = 0; i < s_ids.length; i++) {
                            //         x = $(this).attr("s_id")
                            //         if (x == s_ids[i]) {
                            //             $(this).prop("checked", true)
                            //             // console.log(x)
                            //         }
                            //     }

                            // })
                            $('.check').each(function () {
                                ttt = 0;
                                dem = 0;
                                if ($(this).prop("checked") == true) {
                                    s_id = $(this).attr('s_id');
                                    
                                    tongthanhtoan(s_id)
                                    dem = dem + 1;
                                    // tiensp = parseInt($('#tongtien' + s_id).html())
                                    // ttt = ttt + tiensp;
                                    // $('#ttt').html(ttt)
                                }
                                if(dem == 0) {
                                    ttt = 0;
                                    $('#ttt').html('0');
                                }
                            })
                            $('#data').html(dt)

                        }
                    }
                })

            }
        })

    })

    $('#delete_all').click(function () {
        // check = confirm("Bạn có chắc chắn muốn xóa ?")
        s_ids = []
        dem = 0;
        $('.check').each(function () {
            if ($(this).prop("checked") == true) {
                s_ids.push($(this).attr("s_id"));
                dem = dem + 1;
            }
        })

        if (dem == 0) {
            $('#exampleModal1').modal('show')
            $('.modal-body').html("Vui lòng chọn sản phẩm")
            $('#huy').html('OK bro !')
            $('#xoa').css("display", "none")
        } else {
            $('#exampleModal1').modal('show')
            $('.modal-body').html("Bạn có muốn bỏ " + dem + " sản phẩm ?")
            $('#huy').html('Thôi')
            $('#xoa').css("display", "block")
            $('#xoa').click(function () {
                var action = "delete_all"
                $.ajax({
                    url: "data_cart.php",
                    method: "POST",
                    data: {
                        s_ids: s_ids,
                        action: action
                    },
                    success: function (dt) {
                        //  alert(dt)
                        fetch_data();
                        $('#ttt').html('0')
                        $('#exampleModal1').modal('hide')
                    }
                })
            })
        }

    })
    // thay đổi số lượng
    $(document).on('change', '.sluong', function () {
        ttt = 0;
        action = "update"
        sluong = $(this).val();
        if (sluong > 10) {
            sluong = 10;
            $(this).val('10');
        }
        gia = $(this).attr('price');
        s_id = $(this).attr('s_id');
        tongtien = sluong * gia;
        $.ajax({
            url: "data_cart.php",
            method: "POST",
            data: {
                action: action,
                sluong: sluong,
                s_id: s_id
            },
            success: function (dt) {
                // fetch_data()
            }
        })
        $('#tongtien' + s_id).html(tongtien)
        $('.check').each(function () {
            if ($(this).prop('checked') == true) {
                s_id = $(this).attr('s_id');
                tiensp = parseInt($('#tongtien' + s_id).html())
                ttt = ttt + tiensp;
                $('#ttt').html(ttt)
            }

        })
    })
    tong = 0;
    ttt = 0;
    // click alll
    $(document).on('click', '#checkall', function () {
        ttt = 0;
        if ($(this).is(':checked')) {
            $(this).attr('checked', true)
            $('#checkbox_all').prop("checked", true)
            console.log('1')
            $('.check').each(function () {
                $(this).prop("checked", true)
                s_id = $(this).attr('s_id');
                tongthanhtoan(s_id)

            })
        } else {
            $(this).removeAttr('checked')
            $('#checkbox_all').prop("checked", false)
            $('.check').each(function () {
                $(this).prop("checked", false)
                ttt = 0;
                $('#ttt').html(ttt)

            })
        }
    })

    $(document).on('click', '#checkbox_all', function () {
        ttt = 0;
        if ($(this).is(':checked')) {
            $(this).attr('checked', true)
            $('#checkall').prop("checked", true)
            $('.check').each(function () {
                $(this).prop("checked", true)
                s_id = $(this).attr('s_id');
                tongthanhtoan(s_id)

            })
        } else {
            $(this).removeAttr('checked')
            $('#checkall').prop("checked", false)
            $('.check').each(function () {
                $(this).prop("checked", false)
                ttt = 0;
                $('#ttt').html(ttt)

            })
        }
    })
    // hàm tính tổng
    function tongthanhtoan(s_id) {

        tiensp = parseInt($('#tongtien' + s_id).html())
        ttt = ttt + tiensp;
        $('#ttt').html(ttt)
    }

    // click từng checkbox
    $(document).on('click', '.check', function () {
        if ($(this).is(':checked')) {
            $(this).prop("checked", true)
            // s_id = $(this).attr('s_id');
            // tongthanhtoan(s_id);

        } else {
            $(this).prop("checked", false)
        }
        check_length = $('.check').length
        dem = 0
        $('.check').each(function () {

            if ($(this).prop('checked') == true) {
                dem = dem + 1;

            } else {
                dem = dem - 1
                // console.log(dem)
            }

        }) // nêu đếm bằng tổng số checkbox thì checkbox đầu checked
        if (dem == check_length) {
            $('#checkall').prop('checked', true)
            $('#checkbox_all').prop('checked', true)
        } else {
            $('#checkall').prop('checked', false)
            $('#checkbox_all').prop('checked', false)

        }
        ttt = 0;

        // tính tiền khi click checkbox
        $('.check').each(function () {
            if ($(this).prop("checked") == true) {
                s_id = $(this).attr('s_id');
                tongthanhtoan(s_id);
            }

        })
        if (dem == -check_length) {
            ttt = 0;
            $('#ttt').html(ttt)
        }

    })

    $(document).on('click', '#sptt', function () {
        id_tl = $(this).attr('id_tl');
        $('#exampleModal').modal('show')
        action = "sptt"
        $.ajax({
            url: "sptt.php",
            method: "POST",
            data: {
                tl_id: id_tl,
                action: action
            },
            success: function (dt) {
                $('.modal-body').html(dt)
                $('.book_id').css("margin-top", "20px")
            }
        })
    })
    a = 1;

    function get_banthich() {
        $.ajax({
            url: "spkhac.php",
            method: "POST",
            data: {
                // tl_id: tl_id,
                tranghientai: a
            },
            success: function (dt) {
                $('#sp_new_tl').html(dt)
            }
        })
    }
    get_banthich()


    $('.tiep i').mouseover(function () {
        $(this).addClass('fa-3x')

    })
    $('.tiep i').mouseleave(function () {
        $(this).removeClass('fa-3x')

    })
    if (a = 1) {
        $('#back').css("display", 'none')
    }
    $('#next').click(function () {
        a = a + 1;
        if (a < 7 || a > 1) {
            get_banthich()
            if (a == 6) {
                $(this).css("display", 'none')
            }
            $('#back').css("display", '')
        }

    })
    $('#back').click(function () {
        a = a - 1;
        if (a > 0) {
            get_banthich()
            if (a == 1) {
                $('#back').css("display", 'none')
            }
        }
    })








// alert('okj')

})