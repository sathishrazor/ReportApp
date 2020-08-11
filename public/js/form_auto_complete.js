/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/form_auto_complete.js":
/*!********************************************!*\
  !*** ./resources/js/form_auto_complete.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

$(function () {
  var DROP_DOWN_PRX = [];
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var cache = {};
  $(".autocomplete").autocomplete({
    minLength: 0,
    source: function source(request, response) {
      var _this = this;

      var dropdown_id = _this.element.attr("dropdown"); // Fetch data


      $.ajax({
        url: "/picklist/search",
        type: 'post',
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          q: request.term,
          id: dropdown_id
        },
        success: function success(data) {
          var term = request.term;
          term = dropdown_id + "_" + term;

          if (term in cache) {
            response(cache[term]);
            return;
          }

          response(data);
        }
      });
    } // select: function (event, ui) {
    //    // Set selection
    //    $('#employee_search').val(ui.item.label); // display the selected text
    //    $('#employeeid').val(ui.item.value); // save selected id to input
    //    return false;
    // }

  }); //render dropdown

  $(".select").each(function (index, el) {
    var select = $(el);
    var drop_down = select.attr("dropdown");
    var record = select.attr("record");
    var url = $("#rooturl").val();

    if (drop_down) {
      url += "/picklist/get/" + drop_down;
    } else if (record) {
      url += "/form/".concat(record);
    }

    var req = $.get(url);
    req.then(function (res) {
      if (res.length > 0) {
        var htmlselect = new __HtmlSelect(res);
        DROP_DOWN_PRX.push(htmlselect);
        htmlselect.registerListener(function (newval) {
          console.log("dropdown_changed", newval);
        });
        console.log(DROP_DOWN_PRX);
        htmlselect.render(select, "value", -1);
      } else {
        var label = select.prev().text();
        var name = select.attr("name");
        var css = select.attr("class");
        var id = select.attr("id");
        var tpl = "<label>".concat(label, "</label><input id=\"").concat(id, "\" class=\"").concat(css, "\" name=\"").concat(name, "\" type=\"text\" />");
        select.parent().html(tpl);
      }
    });
  });
});

var __HtmlSelect = /*#__PURE__*/function () {
  function __HtmlSelect(data) {
    _classCallCheck(this, __HtmlSelect);

    this.listeners = [];
    this._data = data.map(function (c) {
      c.name = c.name == undefined ? "" : c.name;
      return {
        value: c.value,
        text: c.text + "::" + c.name
      };
    });
  }

  _createClass(__HtmlSelect, [{
    key: "render",
    value: function render(el, name, option) {
      var tpl = "";
      tpl += this._data.map(function (c, i) {
        if (i == option) {
          return "<option selected value=" + c.value + ">" + c.text + "</option>";
        }

        return "<option value=" + c.value + ">" + c.text + "</option>";
      }).join("");
      el.html(tpl);
    }
  }, {
    key: "registerListener",
    value: function registerListener(fn) {
      this.listeners.push(fn);
    }
  }, {
    key: "data",
    get: function get() {
      return this._data;
    },
    set: function set(val) {
      this._data = val;
      this.listeners.forEach(function (c) {
        c(val);
      });
    }
  }]);

  return __HtmlSelect;
}();

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./resources/js/form_auto_complete.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\sathish\Desktop\laravel demo\reports\ReportApp\resources\js\form_auto_complete.js */"./resources/js/form_auto_complete.js");


/***/ })

/******/ });