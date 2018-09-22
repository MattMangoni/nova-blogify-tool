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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(6);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

Nova.booting(function (Vue, router) {
    router.addRoutes([{
        name: 'nova-blogify-tool',
        path: '/nova-blogify-tool',
        component: __webpack_require__(2)
    }]);
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(4)
/* template */
var __vue_template__ = __webpack_require__(5)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/Tool.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-68ff5483", Component.options)
  } else {
    hotAPI.reload("data-v-68ff5483", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 3 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 4 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            installed: null,
            messages: [],
            error: false
        };
    },
    mounted: function mounted() {
        this.installationCheck();
    },


    methods: {
        installationCheck: function installationCheck() {
            var _this = this;

            Nova.request().get("/nova-vendor/nova-blogify-tool/check-migrations").then(function (response) {
                return _this.installed = response.data.installed;
            }).catch(function () {
                return _this.error = true;
            });
        },
        install: function install() {
            var _this2 = this;

            Nova.request().get("/nova-vendor/nova-blogify-tool/migrate-tables").then(function (response) {
                return _this2.messages = response.data.messages;
            }).then(function () {
                return _this2.reloadPage();
            }).then(function () {
                return _this2.installationCheck();
            }).catch(function (error) {
                return _this2.error = true;
            });
        },
        resetContent: function resetContent() {
            var _this3 = this;

            this.resetMessages();

            Nova.request().get("/nova-vendor/nova-blogify-tool/reset-content").then(function (response) {
                return _this3.messages = response.data.messages;
            }).then(function () {
                setTimeout(function () {
                    _this3.messages = [];
                }, 2000);
            }).catch(function (error) {
                return _this3.error = true;
            });
        },
        deleteTables: function deleteTables() {
            var _this4 = this;

            this.resetMessages();

            Nova.request().get("/nova-vendor/nova-blogify-tool/uninstall").then(function (response) {
                return _this4.messages = response.data.messages;
            }).then(function () {
                return _this4.reloadPage();
            }).catch(function (error) {
                return _this4.error = true;
            });
        },
        resetMessages: function resetMessages() {
            this.messages = [];
        },
        reloadPage: function reloadPage() {
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        }
    }
});

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("heading", { staticClass: "mb-6" }, [_vm._v("Blogify")]),
      _vm._v(" "),
      _c(
        "card",
        [
          _vm.messages.length !== 0
            ? [
                _c("div", { staticClass: "px-4 py-4 " }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "mx-2 my-2 px-6 py-8 relative bg-80 text-20 rounded-lg"
                    },
                    [
                      _c(
                        "div",
                        { staticClass: "absolute pin-t pin-r mr-2 mt-2 pr-1" },
                        [
                          _c(
                            "button",
                            {
                              staticClass: "text-20 font-bold",
                              on: { click: _vm.resetMessages }
                            },
                            [_c("strong", [_vm._v("X")])]
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _vm._l(_vm.messages, function(message, index) {
                        return _c("div", { key: index }, [
                          _c("p", [_vm._v(_vm._s(message))])
                        ])
                      })
                    ],
                    2
                  )
                ])
              ]
            : _vm._e(),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "px-6 py-8 text-80" },
            [
              _vm.installed
                ? [
                    _c("h4", { staticClass: "mb-4" }, [
                      _vm._v("Blogify is currently installed and active.")
                    ]),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-default btn-danger",
                        on: { click: _vm.deleteTables }
                      },
                      [_vm._v("Uninstall and delete blog tables")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass:
                          "btn btn-default bg-80 text-20 font-normal",
                        on: { click: _vm.resetContent }
                      },
                      [_vm._v("Reset blog content")]
                    )
                  ]
                : [
                    _c("p", [
                      _c("span", { staticClass: "pr-4" }, [
                        _vm._v("Blogify DB tables not found.")
                      ]),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-default btn-primary",
                          on: { click: _vm.install }
                        },
                        [_vm._v("Install")]
                      )
                    ])
                  ]
            ],
            2
          )
        ],
        2
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-68ff5483", module.exports)
  }
}

/***/ }),
/* 6 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);