webpackJsonp([27],{

/***/ 235:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(322),
  /* template */
  __webpack_require__(329),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/home/margul/Code/Bidder/resources/assets/js/components/User/Notifications/Notifications.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Notifications.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6a8e96e5", Component.options)
  } else {
    hotAPI.reload("data-v-6a8e96e5", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 322:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__NotificationSettings__ = __webpack_require__(323);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__NotificationSettings___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__NotificationSettings__);
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
	components: {
		appNotificationSettings: __WEBPACK_IMPORTED_MODULE_0__NotificationSettings___default.a
	}
});

/***/ }),

/***/ 323:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(324),
  /* template */
  __webpack_require__(328),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/home/margul/Code/Bidder/resources/assets/js/components/User/Notifications/NotificationSettings.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] NotificationSettings.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-9dbe6a7e", Component.options)
  } else {
    hotAPI.reload("data-v-9dbe6a7e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 324:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(134);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__NotificationSettingsItem__ = __webpack_require__(325);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__NotificationSettingsItem___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__NotificationSettingsItem__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__includes_Model__ = __webpack_require__(3);
var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

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
	components: {
		appNotificationSettingsItem: __WEBPACK_IMPORTED_MODULE_1__NotificationSettingsItem___default.a
	},
	data: function data() {
		return {
			settings: {},
			processing: false
		};
	},

	computed: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["b" /* mapGetters */])(['userNotificationSettings', 'userNotificationSettingsFetched'])),
	methods: {
		settingChanged: function settingChanged(event) {
			this.settings[event.setting] = Boolean(!this.settings[event.setting]);
		},
		update: function update() {
			var _this = this;

			this.processing = true;
			new __WEBPACK_IMPORTED_MODULE_2__includes_Model__["a" /* default */]("users/" + this.$store.getters.authUser.id + "/notification-settings").patch(this.settings).then(function (response) {
				_this.$store.commit('SET_NOTIFICATIONSETTINGS', { notificationSettings: _this.settings });
				_this.$store.dispatch('showNotification', { type: 'success', msg: 'Vi har uppdaterat dina inställningar för när du ska få notifikationer.' });
				_this.processing = false;
			}).catch(function (error) {
				return console.log(error);
			});
		}
	},
	created: function created() {
		var _this2 = this;

		if (!this.userNotificationSettingsFetched) {
			this.$store.dispatch('fetchUserNotificationSettings').then(function (response) {
				_this2.settings = _this2.userNotificationSettings;
			});
		} else {
			this.settings = this.userNotificationSettings;
		}
	}
});

/***/ }),

/***/ 325:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(326),
  /* template */
  __webpack_require__(327),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/home/margul/Code/Bidder/resources/assets/js/components/User/Notifications/NotificationSettingsItem.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] NotificationSettingsItem.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-8b0ea818", Component.options)
  } else {
    hotAPI.reload("data-v-8b0ea818", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 326:
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

/* harmony default export */ __webpack_exports__["default"] = ({
	props: ['setting', 'value'],
	data: function data() {
		return {
			settingTexts: {
				bid_on_service: 'När någon lägger ett bud på en av mina tjänster.',
				comment_on_service: 'När någon lägger en kommentar på en av mina tjänster.',
				comment_reply: 'När någon lägger en kommentar på en tjänst som jag också har kommenterat på.',
				competing_bid: 'När någon lägger ett bud på en tjänst som jag också har lagt ett bud på.',
				leave_review: 'När ett av dina projekt är avslutat och det är dags att lägga omdöme på den andra parten.',
				message_in_project: 'När jag får ett nytt meddelande i ett av mina projekt.',
				other_party_accepted: 'När den andra parten har accepterat ett projekt och är redo att starta.',
				project_details_changed: 'När specifikationerna för ett projekt blir ändrat.',
				project_started: 'När ett projekt startar.'
			}
		};
	},

	computed: {
		settingText: function settingText() {
			return this.settingTexts[this.setting];
		},
		toggle: function toggle() {
			return this.value ? ['fa-toggle-on'] : ['fa-toggle-off'];
		}
	}
});

/***/ }),

/***/ 327:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "notification_settings_item-component"
  }, [_c('div', {
    staticClass: "setting-text"
  }, [_vm._v("\n\t\t" + _vm._s(_vm.settingText) + "\n\t")]), _vm._v(" "), _c('div', {
    staticClass: "setting-value"
  }, [_c('i', {
    staticClass: "fa fa-2x",
    class: _vm.toggle,
    attrs: {
      "aria-hidden": "true"
    },
    on: {
      "click": function($event) {
        _vm.$emit('updated', {
          setting: _vm.setting
        })
      }
    }
  })])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-8b0ea818", module.exports)
  }
}

/***/ }),

/***/ 328:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "notification_settings-component"
  }, [(_vm.userNotificationSettingsFetched) ? [_vm._l((_vm.settings), function(value, setting) {
    return _c('app-notification-settings-item', {
      key: setting,
      attrs: {
        "setting": setting,
        "value": value
      },
      on: {
        "updated": _vm.settingChanged
      }
    })
  }), _vm._v(" "), _c('button', {
    staticClass: "btn btn-primary full-width mt15",
    class: {
      processing: _vm.processing
    },
    attrs: {
      "type": "button",
      "disabled": _vm.processing
    },
    on: {
      "click": function($event) {
        $event.preventDefault();
        _vm.update($event)
      }
    }
  }, [_vm._v("\n\t\t\tUppdatera inställningarna\n\t\t")])] : _c('app-loading')], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-9dbe6a7e", module.exports)
  }
}

/***/ }),

/***/ 329:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "notifications-component"
  }, [_c('section', {
    staticClass: "white-contentSection"
  }, [_vm._m(0), _vm._v(" "), _c('div', {
    staticClass: "white-contentSection-content"
  }, [_c('app-notification-settings')], 1)])])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('header', {
    staticClass: "white-contentSection-header"
  }, [_c('h3', [_vm._v("Notifikationer")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6a8e96e5", module.exports)
  }
}

/***/ })

});