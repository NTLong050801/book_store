$(document).ready(function() {
    $('.img_small img').mouseover(function() {
      name_src = $(this).attr('src');
      $('.img_full img').attr('src', name_src)
      $('.img_small img').click(function() {
        $('#exampleModal').modal('show')
        $('.modal-body img').attr('src', name_src)
      })
      $('.img_full img').click(function() {
        $('#exampleModal').modal('show')
        $('.modal-body img').attr('src', name_src)
      })
    })

    $(".thongdiep > div:gt(0)").hide();
    setInterval(function() {
      $('.thongdiep > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.thongdiep');
    }, 5000);

    a = 1
    a1 = 1
    sotrang = $('#this').attr('sotrang')
    sotrang_tt = $('#this').attr('sotrang')
    tl_id = $('#this').attr('tl_id')
    if (a = 1) {
      $('#back').css("display", "none")
    }
    if (a1 = 1) {
      $('#back_tt').css("display", "none")
    }
    // if (a == sotrang) {
    //   $('#next').css("display", "none")
    // }
    $('.spkhac .tiep').click(function() {
      b = $(this).attr('id');
      if (b == 'next') {
        a = a + 1;
        $('#back').css("display", "")
        if (a == 6) {
          $('#next').css("display", "none")
        }
      }
      if (b == 'back') {
        a = a - 1;
        $('#next').css("display", "")
        if (a == 1) {
          $('#back').css("display", "none")
        }
      }
      $.ajax({
        url: "spkhac.php",
        method: "POST",
        data: {
          tl_id: tl_id,
          tranghientai: a
        },
        success: function(dt) {
          $('#sp_new_tl').html(dt)
        }
      })
    })

    $('.sptt .tiep_tt').click(function() {
      b1 = $(this).attr('id');
      // alert(b1)
      if (b1 == 'next_tt') {
        a1 = a1 + 1;
        $('#back_tt').css("display", "")
        if (a1 == 4) {
          $('#next_tt').css("display", "none")
        }
      }
      if (b1 == 'back_tt') {
        a1 = a1 - 1;
        $('#next_tt').css("display", "")
        if (a1 == 1) {
          $('#back_tt').css("display", "none")
        }
      }
      if (a1 < 3) {
        $.ajax({
          url: "sptt.php",
          method: "POST",
          data: {
            tl_id: tl_id,
            tranghientai: a1
          },
          success: function(dt) {
            $('#sp_tt_tl').html(dt)
          }
        })
      }

    })




    $.ajax({
      url: "spkhac.php",
      method: "POST",
      data: {
        tl_id: tl_id,
        tranghientai: a,
      },
      success: function(dt) {
        $('#sp_new_tl').html(dt)
      }
    })
    $.ajax({
      url: "sptt.php",
      method: "POST",
      data: {
        tl_id: tl_id,
        tranghientai: a,
      },
      success: function(dt) {
        $('#sp_tt_tl').html(dt)
      }
    })
  })


  //add cart

  $('#add_cart').click(function(){
      sluong = $('#sluong').val()
      if(sluong > 10){
        sluong = 10;
      }
      s_id = $(this).attr('s_id');
      tt = $(this).attr('tt')
      $.ajax({
        url : "process_add_cart.php",
        method:"POST",
        data : {
          sluong : sluong,
          s_id : s_id,
          tt : tt
        },
        success : function(dt){
          alert(dt)
        }
      })
  })