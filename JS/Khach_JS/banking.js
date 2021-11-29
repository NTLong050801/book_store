$(document).ready(function () {
    data_khach()
    $(document).on('click', "#change", function () {
        $('#exampleModal1').modal("show")
        k_id = $(this).attr("k_id")
        $('#btn_change').click(function () {
            action = "update_khach";
            k_ten = $("#k_ten").val()
            k_sdt = $("#k_sdt").val()
            k_diachi = $("#k_diachi").val()
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {
                    action: action,
                    k_ten: k_ten,
                    k_sdt: k_sdt,
                    k_diachi: k_diachi
                },
                success: function (dt) {
                    $('#exampleModal1').modal("hide")
                    data_khach()
                }
            })
        })
    })

    function data_khach() {
        action = "data_khach";
        $.ajax({
            url: "data_cart.php",
            method: "POST",
            data: {
                action: action,
            },
            success: function (dt) {
                $('.address').html(dt)
            }
        })
    }
    $('#btn_voucher').click(function () {
        // ttt = parseInt( $('#ttt').html())
        ttt = parseInt($('#ttt').html())
        $('#exampleModal').modal("show")
        $('.use_voucher').each(function () {
            giatri = $(this).attr("value")
            if (ttt < giatri) {
                $(this).css("display", "none")
            }
        })
        $('.use_voucher').click(function () {
            ttt = parseInt($('#ttt').html())
            $('.use_voucher').each(function () {
                if ($(this).hasClass("btn-success")) {
                    $(this).removeClass("btn-success")
                    $(this).addClass("btn-secondary")
                }
            })
            if ($(this).hasClass("btn-secondary")) {
                $(this).removeClass("btn-secondary")
                $(this).addClass("btn-success")
            }
            ptgiamgia = $(this).attr("ptgiamgia")
            tiengiam = parseInt(ttt * (ptgiamgia / 100))
            ttt = ttt - tiengiam
            $('#giamgia').html(tiengiam + 'đ')
            $('#tongall').html(ttt + 'đ')
            $('#exampleModal').modal("hide")
            $('#btn_voucher').removeClass("btn-secondary")
            $('#btn_voucher').addClass("btn-primary")
        })

        $('#btn_apdung').click(function () {
            ttt = parseInt($('#ttt').html())
            magg = $('#ip_magg').val();
         
            if (magg == "longdz") {
                ptgiamgia = 99
                tiengiam = parseInt(ttt * (ptgiamgia / 100))
                ttt = ttt - tiengiam
                $('#giamgia').html(tiengiam + 'đ')
                $('#tongall').html(ttt + 'đ')
                $('#exampleModal').modal("hide")
                $('#btn_voucher').removeClass("btn-secondary")
                $('#btn_voucher').addClass("btn-primary")
                // magg = $('#ip_magg').val('');
            } else {
                alert("Mã giảm giá không chính xác")
            }
            // $('.use_voucher').each(function () {
            //     if ($(this).hasClass("btn-success")) {
            //         $(this).removeClass("btn-success")
            //         $(this).addClass("btn-secondary")
            //     }
            // })
        })
    })

    $('.pay').mouseover(function () {
        $(this).addClass("change")
        $(this).click(function () {
            $('.pay').removeClass("btn-primary")
            $(this).addClass("btn-primary")
        })
    })
    $('.pay').mouseleave(function () {
        $(this).removeClass("change")
    })
})