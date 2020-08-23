$(function() {
    var DROP_DOWN_PRX = [];
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var cache = {};
  $( ".autocomplete" ).autocomplete({
    minLength: 0,
    source: function( request, response ) {
        var _this = this;
       var dropdown_id = _this.element.prev().text();// attr("dropdown")
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
    var selected_value = select.attr("value");
    if(!selected_value)
    {
        selected_value = -1;
    }
    var record = select.attr("record");
    var url = $("#rooturl").val();
    if(drop_down)
    {
         url += "/picklist/get/"+drop_down;
    }else if(record)
    {
         url += `/form/${record}`;
    }
    var req = $.get(url);
    req.then(function(res){
        if(res.length>0)
        {
            var htmlselect = new __HtmlSelect(res);
            DROP_DOWN_PRX.push(htmlselect);
            htmlselect.registerListener(function(newval){
                console.log("dropdown_changed",newval)
            })
            //console.log(DROP_DOWN_PRX);
            htmlselect.render(select,"value",selected_value);
        }
        else
        {
            var label = select.prev().text();
            var name = select.attr("name");
            var css = select.attr("class");
            var id = select.attr("id");
            var tpl = `<label>${label}</label><input id="${id}" class="${css}" name="${name}" type="text" />`
            select.parent().html(tpl);

        }
    })
})



$(document).on('change','.address',function(e){
    console.log(e);
    var sel = $(this);
    var module = sel.attr("record");
    var record = sel.val();
    console.log({module,record});
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var req = $.post("/app/address",{module,record,_token:CSRF_TOKEN});

    req.then(function(res){
        console.log(res);
        var addr_select = res.map(function(c){
            var temp =
`${c.attention},
${c.addr1} ${c.addr2},
${c.city},
${c.state} ${c.country},
${c.zip}`;
            return temp;
        })
        sel.parent().next().find("textarea").val("");
        sel.parent().next().find("textarea").autocomplete({
            source: addr_select,
            minLength: 0
          });
        // var htmlselect = new __HtmlSelect(addr_select);
        // htmlselect.render(sel.parent().next().find("select"),"value",-1);
    })
})
})

class __HtmlSelect {
        constructor(data) {

            this.listeners =  [];
            this._data = data.map(function (c) {
                c.name= c.name == undefined ||c.name == null ? "": c.name;
                c.text= c.text == undefined ||c.text == null ? "": c.text;
                return {
                    value: c.value,
                    text: c.text + "::"+c.name
                }
            });
        }

        render(el, name, option) {
            var tpl = "<option></option>";
            tpl += this._data.map(function (c, i) {
                if(option.constructor.name =="Number")
                {
                    if (i == option) {
                        return "<option selected value=" + c.value + ">" + c.text + "</option>";
                    }
                }else{
                    if(c.value==option)
                    {
                        return "<option selected value=" + c.value + ">" + c.text + "</option>";
                    }
                }
                return "<option value=" + c.value + ">" + c.text + "</option>";
            }).join("")
            el.html(tpl);
        }

        get data()
        {
            return this._data;
        }

        set data(val)
        {
            this._data = val;
            this.listeners.forEach(function(c){
                c(val);
            })
        }


        registerListener(fn)
        {
            this.listeners.push(fn)
        }

    }






