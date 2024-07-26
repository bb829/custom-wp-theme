/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./js/app.js":
/*!*******************!*\
  !*** ./js/app.js ***!
  \*******************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/navigation */ \"./js/modules/navigation.js\");\n/* harmony import */ var _modules_navigation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_navigation__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _modules_section__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/section */ \"./js/modules/section.js\");\n/* harmony import */ var _modules_pricing__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/pricing */ \"./js/modules/pricing.js\");\n/* harmony import */ var _modules_pricing__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_modules_pricing__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _modules_filters__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/filters */ \"./js/modules/filters.js\");\n/* harmony import */ var _modules_filters__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_modules_filters__WEBPACK_IMPORTED_MODULE_3__);\n// import axios from 'axios';\n\n\n\n\n\n\n//# sourceURL=webpack://bart-bos/./js/app.js?");

/***/ }),

/***/ "./js/modules/filters.js":
/*!*******************************!*\
  !*** ./js/modules/filters.js ***!
  \*******************************/
/***/ (() => {

eval("function eventAnimationHandler() {\n  const events = document.querySelectorAll('.event');\n  events.forEach(event => {\n    if (!event.classList.contains('fade-in-top')) {\n      event.classList.remove('hidden');\n      event.classList.add('fade-in-top');\n      return;\n    }\n    if (!event.classList.contains('fade-out-bottom')) {\n      event.classList.remove('fade-in-top');\n      event.classList.add('fade-out-bottom');\n      return;\n    }\n  });\n}\njQuery(document).ready(function ($) {\n  eventAnimationHandler();\n  const submit = document.querySelector('.filterEvents');\n  if (submit) {\n    submit.addEventListener('click', e => {\n      e.preventDefault();\n      const form = document.querySelector('#getEvents');\n      const data = new FormData(form);\n      console.log(data);\n      $.ajax({\n        url: '/wp-json/myplugin/v1/getevents',\n        method: 'POST',\n        data: data,\n        processData: false,\n        contentType: false,\n        beforeSend: function () {\n          eventAnimationHandler();\n        },\n        success: function (response) {\n          console.log(response);\n          $(\".evenementen\").html(response);\n          eventAnimationHandler();\n        },\n        error: function (response) {\n          console.error('Error:', response);\n        }\n      });\n    });\n  }\n  $(function () {\n    if ($(\".datepicker\").length > 0) {\n      $(\".datepicker\").datepicker({\n        dateFormat: \"dd-mm-yy\"\n      });\n    }\n  });\n});\n\n//# sourceURL=webpack://bart-bos/./js/modules/filters.js?");

/***/ }),

/***/ "./js/modules/isinviewport.js":
/*!************************************!*\
  !*** ./js/modules/isinviewport.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   isInViewport: () => (/* binding */ isInViewport)\n/* harmony export */ });\nconst isInViewport = el => {\n  return el.getBoundingClientRect().top <= (window.innerHeight - 480 || document.documentElement.clientHeight);\n};\n\n\n//# sourceURL=webpack://bart-bos/./js/modules/isinviewport.js?");

/***/ }),

/***/ "./js/modules/navigation.js":
/*!**********************************!*\
  !*** ./js/modules/navigation.js ***!
  \**********************************/
/***/ (() => {

eval("const toggle = document.querySelector('.navigation__hamburger');\nconst navigation = document.querySelector('.navigation');\n// const wrapper = document.querySelector('.navigation__wrapper');\nconst items = document.querySelectorAll('[data-menu-item=\"true\"]');\nfunction toggleFunction() {\n  if (navigation) {\n    navigation.classList.toggle('navigation--focussed');\n    items.forEach(item => {\n      const parent = item.classList.contains('navigation__item--parent');\n      if (parent) {\n        const parentElement = item;\n        const dropdown = parentElement.querySelector('.navigation__dropdown');\n        const dropdownInner = dropdown.querySelector('.navigation__dropdownInner');\n        const dropdownHeight = dropdownInner.offsetHeight;\n        parentElement.addEventListener('click', () => {\n          if (!parentElement.classList.contains('navigation__item--expanded')) {\n            dropdown.style.maxHeight = dropdownHeight + 'px';\n            parentElement.classList.add('navigation__item--expanded');\n            return;\n          }\n          if (parentElement.classList.contains('navigation__item--expanded')) {\n            dropdown.style.maxHeight = 0 + 'px';\n            parentElement.classList.remove('navigation__item--expanded');\n            return;\n          }\n        });\n      }\n      setTimeout(() => {\n        if (navigation.classList.contains('navigation--fullScreen')) {\n          item.classList.toggle('fade-in');\n        }\n      }, 260);\n    });\n  }\n}\nif (toggle) {\n  toggle.addEventListener('click', () => {\n    toggleFunction();\n\n    // // wrapper.classList.remove('blur');\n    // // wrapper.classList.add('blur');\n\n    // setTimeout(() => {\n    //     wrapper.classList.remove('blur')\n    // }, 280);\n  });\n}\n\n//# sourceURL=webpack://bart-bos/./js/modules/navigation.js?");

/***/ }),

/***/ "./js/modules/pricing.js":
/*!*******************************!*\
  !*** ./js/modules/pricing.js ***!
  \*******************************/
/***/ (() => {

eval("const pricing = document.querySelector('.pricing--tabs');\nconst pricingTab = document.querySelectorAll('a.pricing__tab');\nconst tables = document.querySelectorAll('[data-pricing-table]');\npricingTab.forEach(tab => {\n  tab.addEventListener('click', function (event) {\n    event.preventDefault();\n    pricingTab.forEach(t => t.classList.remove('pricing__tab--active'));\n    event.target.classList.add('pricing__tab--active');\n    const tabID = event.target.getAttribute('id');\n    const pricingContent = document.querySelector('div#' + tabID);\n    tables.forEach(table => {\n      table.classList.add('d-none');\n    });\n    if (pricingContent.classList.contains('d-none')) {\n      pricingContent.classList.remove('d-none');\n    } else {\n      pricingContent.classList.add('d-none');\n    }\n  });\n});\n\n//# sourceURL=webpack://bart-bos/./js/modules/pricing.js?");

/***/ }),

/***/ "./js/modules/section.js":
/*!*******************************!*\
  !*** ./js/modules/section.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _isinviewport__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./isinviewport */ \"./js/modules/isinviewport.js\");\n\nconst section = document.querySelectorAll('[data-inviewport]');\nwindow.addEventListener('scroll', () => {\n  section.forEach(item => {\n    if ((0,_isinviewport__WEBPACK_IMPORTED_MODULE_0__.isInViewport)(item)) {\n      item.setAttribute(\"data-inviewport\", \"yes\");\n      item.classList.add('section--focussed');\n    }\n    if (!(0,_isinviewport__WEBPACK_IMPORTED_MODULE_0__.isInViewport)(item)) {\n      item.setAttribute(\"data-inviewport\", \"no\");\n      item.classList.remove('section--focussed');\n    }\n  });\n});\n\n//# sourceURL=webpack://bart-bos/./js/modules/section.js?");

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
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./js/app.js");
/******/ 	
/******/ })()
;