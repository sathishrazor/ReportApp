$(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var cache = {};
  $( ".autocomplete" ).autocomplete({
    minLength: 0,
    source: function( request, response ) {
        var _this = this;
       var dropdown_id = _this.element.attr("dropdown")
      // Fetch data
      $.ajax({
        url:"/picklist/search",
        type: 'post',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           q: request.term,
           id:dropdown_id
        },
        success: function( data ) {
            var term = request.term;
            term = dropdown_id + "_" + term;
            if (term in cache) {
                response(cache[term]);
                return;
            }
           response( data );
        }
      });
    }
    // select: function (event, ui) {
    //    // Set selection
    //    $('#employee_search').val(ui.item.label); // display the selected text
    //    $('#employeeid').val(ui.item.value); // save selected id to input
    //    return false;
    // }

});

//render dropdown
$(".select").each(function(index,el){
    var select = $(el);
    var drop_down = select.attr("dropdown");
    var url = "/picklist/get/"+drop_down;
    var req = $.get(url);
    req.then(function(res){
        if(res.length>0)
        {
            var htmlselect = new __HtmlSelect(res);
            htmlselect.render(select,"value",-1);
        }
        else
        {
            var name = select.attr("name");
            var css = select.attr("class");
            var id = select.attr("id");
            var tpl = `<input id="${id}" class="${css}" name="${name}" type="text" />`
            select.parent().html(tpl);

        }
    })
})


})

class __HtmlSelect {
        constructor(data) {
            this.data = data.map(function (c) {
                return {
                    value: c.value,
                    text: c.text
                }
            });
        }
        render(el, name, option) {
            var tpl = "<option value='All'>Please select " + name + "</option>";
            tpl += this.data.map(function (c, i) {
                if (i == option) {
                    return "<option selected value=" + c.value + ">" + c.text + "</option>";
                }
                return "<option value=" + c.value + ">" + c.text + "</option>";
            }).join("")
            el.html(tpl);
        }
    }
