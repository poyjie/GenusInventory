$('#frm-release').on('submit', function(e){
    e.preventDefault();
    var form = this;

    $(form).find('input[class=cbadded]').remove()
      $(form).append(
                $('<input class="cbadded">')
                    .attr('type', 'hidden')
                    .attr('name', $(form).find('button[name=btnStatus]').attr('name'))
                    .val($(this).find("button[type=submit]:focus" ).val()));

      // console.log($(form).serialize());

      $.ajax({
        type: "POST",
        url: '/storeRelease',
        data: $(form).serialize(),
        dataType: "json",
        encode: true,
      }).done(function (data) {
        alert(data.msg);
        // console.log(data);

      });

      reloadTableRelease();
  });
