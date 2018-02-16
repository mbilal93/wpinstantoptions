jQuery(document).ready(function($) {
  wp_instantopt_addsection = function (e) {
    var input = $(e).find('input').val();
    var url = input.replace(/\W/g, '_');
    url = url.toLowerCase();

    $.post(ajaxreq.ajaxurl, {
      "action": "add_allinone_section",
      "input": input
    }, function (data) {
      if (data) {
        $('#wp_instantopt_addsection').remove();
        $('#form_categories_list').append('<div id="' + url + '" class="title category_list" data-id="' + url + '_content"><h4>' + input + '</h4> </div>');
      }
      else {
        alert("Error: Section already exists.");
      }
    });
  };

  wp_instantopt_addoption = function (event) {
    event.preventDefault();
    var target = event.target;
    var form = $(target).closest('form').serializeArray();
    form[form.length] = {"parent":wp_instantopt_current_page};

    $.post(ajaxreq.ajaxurl, {
      "action": "add_allinone_option",
      "formdata": form
    }, function (data) {
      console.log(data);
      init_option_submenu_close();
    });
  }
});