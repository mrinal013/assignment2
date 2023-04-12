/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/title.js":
/*!**********************!*\
  !*** ./src/title.js ***!
  \**********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

const {
  __
} = wp.i18n;
const {
  compose
} = wp.compose;
const {
  withSelect,
  withDispatch
} = wp.data;
const {
  PluginDocumentSettingPanel
} = wp.editPost;
const {
  ToggleControl,
  TextControl,
  PanelRow
} = wp.components;
const Component = _ref => {
  let {
    postType,
    postMeta,
    setPostMeta
  } = _ref;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PluginDocumentSettingPanel, {
    title: __('My Custom Post meta', 'txtdomain'),
    initialOpen: "true"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
    label: __('Write some text, if you like', 'txtdomain'),
    value: postMeta._movie_title,
    onChange: value => setPostMeta({
      _movie_title: value
    })
  })));
};
/* harmony default export */ __webpack_exports__["default"] = (compose([withSelect(select => {
  return {
    postMeta: select('core/editor').getEditedPostAttribute('meta'),
    postType: select('core/editor').getCurrentPostType()
  };
}), withDispatch(dispatch => {
  return {
    setPostMeta(newMeta) {
      dispatch('core/editor').editPost({
        meta: newMeta
      });
    }
  };
})])(Component));

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _title__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./title */ "./src/title.js");

const {
  registerPlugin
} = wp.plugins;
const {
  registerBlockType
} = wp.blocks;
const {
  RichText,
  InspectorControls
} = wp.blockEditor;
const {
  ToggleControl,
  PanelBody,
  PanelRow,
  CheckboxControl,
  SelectControl,
  ColorPicker
} = wp.components;

registerPlugin('movie-title-plugin', {
  render() {
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_title__WEBPACK_IMPORTED_MODULE_1__["default"], null);
  }
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map