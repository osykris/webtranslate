"use strict";

$("[data-checkboxes]").each(function() {
  var me = $(this),
    group = me.data('checkboxes'),
    role = me.data('checkbox-role');

  me.change(function() {
    var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
      checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
      dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
      total = all.length,
      checked_length = checked.length;

    if(role == 'dad') {
      if(me.is(':checked')) {
        all.prop('checked', true);
      }else{
        all.prop('checked', false);
      }
    }else{
      if(checked_length >= total) {
        dad.prop('checked', true);
      }else{
        dad.prop('checked', false);
      }
    }
  });
});

$("#table-1").dataTable();

  

$('#add-data').click(function() {
  if ($("#form-data")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-data"));

    $.ajax({
      type: "POST",
      url: "/add/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-data')[0].reset();
        $('#close-data').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-sampah")[0].reportValidity();
  }
});

function edit(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalDataUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#kata_edit').val(response.data.kata);
      $('#terminology_edit').val(response.data.terminology);
      $('#deskripsi_edit').val(response.data.deskripsi);
    },
  });
}
$('#update-data').click(function() {
  if ($("#form-data-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-data-update"));
    $.ajax({
      type: "POST",
      url: "/update/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-data-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-data")[0].reportValidity();
  }
});

function hapus_data(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-kata').attr('onclick', `del_data_data(` + response.data + `)`);

          $('#ModalHapusKata').modal('show');

          // fill data in modal

      },
  });
}

function del_data_data(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusData').modal('hide');
          // remove card data

      },
  });
}