(function () {
    // webpackBootstrap
    /******/
    var __webpack_modules__ = {
        /***/
        "./src/blocks/modules/colaboradores/employees.js":
            /*!*******************************************************!*\
    \*******************************************************/
            /***/
            function () {
                $(document).ready(function () {
                    $(".employees-items__list").slick({
                        dots: false,
                        arrows: true,
                        infinite: false,
                        swipe: true,
                        swipeToSlide: true,
                        autoplay: true,
                        autoplaySpeed: 5000,
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                },
                            },
                        ],
                    });
                });

                /***/
            },

        /***/
        "./src/blocks/modules/doacoes/doacoes.js":
            /*!***********************************************!*\
    \***********************************************/
            /***/
            function () {
                document.addEventListener("DOMContentLoaded", function () {
                    var copyLinkBtn = document.getElementById("copy-link-btn");
                    var qrcodeLink = document.getElementById("qrcode-link");
                    copyLinkBtn.addEventListener("click", function () {
                        // Create a range object
                        var range = document.createRange();
                        // Select the text inside the qrcode link paragraph
                        range.selectNode(qrcodeLink);
                        // Add the selected text to the clipboard
                        window.getSelection().addRange(range);
                        try {
                            // Copy the selected text
                            document.execCommand("copy");
                            copyLinkBtn.textContent = "✓ Link copiado!";
                        } catch (err) {
                            console.error("Erro ao copiar link:", err);
                            copyLinkBtn.textContent = "✕ Erro ao copiar link.";
                        }

                        // Remove the selection
                        window.getSelection().removeAllRanges();
                    });
                });

                /***/
            },

        /***/
        "./src/blocks/modules/estrutura/structure.js":
            /*!***************************************************!*\
    \***************************************************/
            /***/
            function () {
                $(document).ready(function () {
                    $(".structure__slick").slick({
                        lazyLoad: "ondemand",
                        dots: false,
                        arrows: false,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        initialSlide: 0,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        vertical: true,
                        verticalSwiping: true,
                        adaptiveHeight: false,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1,
                                    vertical: false,
                                    verticalSwiping: false,
                                },
                            },
                        ],
                    });
                });

                /***/
            },

        /***/
        "./src/blocks/modules/fale-conosco/contact.js":
            /*!****************************************************!*\
    \****************************************************/
            /***/
            function () {
                /***/
            },

        /***/
        "./src/blocks/modules/footer/footer.js":
            /*!*********************************************!*\
    \*********************************************/
            /***/
            function () {
                /***/
            },

        /***/
        "./src/blocks/modules/header/header.js":
            /*!*********************************************!*\*/

            function () {
                document.addEventListener("DOMContentLoaded", function () {
                    let body = document.body;
                    let isMobileDevice = window.innerWidth <= 768;
                    let btnMobile = document.getElementById("btn-mobile");
                    let menuItems = document.querySelectorAll(
                        ".header__menu_mobile .menu-item a"
                    );
                    let dropdownButtons = document.querySelectorAll(
                        ".header__menu_mobile .menu-item-has-children > a"
                    );

                    function toggleMenu(event) {
                        if (event.type === "touchstart") event.preventDefault();

                        let headerNav = document.getElementById("header-nav");
                        headerNav.classList.toggle("active");

                        let headerNavActive =
                            headerNav.classList.contains("active");

                        event.currentTarget.setAttribute(
                            "aria-expanded",
                            true
                            // active
                        );

                        if (headerNavActive) {
                            event.currentTarget.setAttribute(
                                "aria-label",
                                "Fechar Menu"
                            );
                            body.classList.add("overflow-hidden");
                            btnMobile.classList.add("active");
                        } else {
                            event.currentTarget.setAttribute(
                                "aria-label",
                                "Abrir Menu"
                            );
                            body.classList.remove("overflow-hidden");
                            btnMobile.classList.remove("active");
                        }
                    }

                    function closeMenuOnOptionSelect() {
                        let headerNav = document.getElementById("header-nav");
                        headerNav.classList.remove("active");
                        btnMobile.classList.add("active");
                        btnMobile.setAttribute("aria-expanded", false);
                        btnMobile.setAttribute("aria-label", "Abrir Menu");
                        body.classList.remove("overflow-hidden");
                    }

                    btnMobile.addEventListener("click", toggleMenu);
                    btnMobile.addEventListener("touchstart", toggleMenu);

                    if (isMobileDevice) {
                        let menuItemsHasChildren = document.querySelector(
                            ".header__menu_mobile .menu .menu-item-has-children .sub-menu"
                        );
                        if (!menuItemsHasChildren) {
                            menuItems.forEach(function (menuItem) {
                                menuItem.addEventListener(
                                    "click",
                                    closeMenuOnOptionSelect
                                );
                                menuItem.addEventListener(
                                    "touchstart",
                                    closeMenuOnOptionSelect
                                );
                            });
                        }

                        dropdownButtons.forEach(function (dropdownButton) {
                            dropdownButton.addEventListener(
                                "click",
                                toggleSubMenu
                            );
                            dropdownButton.addEventListener(
                                "touchstart",
                                toggleSubMenu
                            );
                        });
                    }

                    function toggleSubMenu(event) {
                        event.preventDefault();
                        const submenu = dropdownButtons.nextElementSibling;
                        const isSubMenuVisible =
                            submenu.classList.contains("show");

                        // Fechar todos os submenus abertos
                        document
                            .querySelectorAll(".sub-menu.show")
                            .forEach(function (submenu) {
                                submenu.classList.remove("show");
                                submenu.classList.add("hide");
                                submenu.previousSibling.classList.remove("add");
                                submenu.classList.add("hide");
                                // dropdownButtons.classList.remove("open");
                                // dropdownButtons.classList.add("close");
                            });

                        if (!isSubMenuVisible) {
                            submenu.classList.add("show");
                            submenu.classList.remove("hide");
                            // dropdownButtons.classList.add("open");
                            // dropdownButtons.classList.remove("close");
                        }
                    }

                    $(window).scroll(function () {
                        var sticky = $(".header__container"),
                            scroll = $(window).scrollTop();
                        if (scroll >= 100) sticky.addClass("is-fixed");
                        else sticky.removeClass("is-fixed");
                    });
                });
            },
        "./src/blocks/modules/home/main-home.js":
            /*!**********************************************!*\*/

            function (
                __unused_webpack_module,
                __webpack_exports__,
                __webpack_require__
            ) {
                "use strict";
                __webpack_require__.r(__webpack_exports__);
                /* harmony import */
                var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! jquery */
                    "../../../node_modules/jquery/dist/jquery.js"
                );
                /* harmony import */
                var jquery__WEBPACK_IMPORTED_MODULE_0___default =
                    /*#__PURE__*/
                    __webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
                /* harmony import */
                var slick_carousel__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! slick-carousel */
                        "./node_modules/slick-carousel/slick/slick.js"
                    );
                /* harmony import */
                var slick_carousel__WEBPACK_IMPORTED_MODULE_1___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        slick_carousel__WEBPACK_IMPORTED_MODULE_1__
                    );

                // Garantindo que o jQuery seja fornecido globalmente
                window.$ = jquery__WEBPACK_IMPORTED_MODULE_0___default();
                window.jQuery = jquery__WEBPACK_IMPORTED_MODULE_0___default();
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(
                    function () {
                        jquery__WEBPACK_IMPORTED_MODULE_0___default()(
                            ".home-main__banner--container"
                        ).slick({
                            dots: true,
                            autoplay: true,
                            autoplaySpeed: 8000,
                            // fade: true,
                            // cssEase: "linear",
                        });
                    }
                );
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(
                    function () {
                        jquery__WEBPACK_IMPORTED_MODULE_0___default()(
                            ".home-employees__list"
                        ).slick({
                            dots: false,
                            arrows: false,
                            infinite: true,
                            swipe: true,
                            swipeToSlide: true,
                            speed: 5000,
                            autoplay: true,
                            autoplaySpeed: 0,
                            slidesToShow: 6,
                            slidesToScroll: 1,
                            cssEase: "ease",
                            responsive: [
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 1,
                                    },
                                },
                            ],
                        });
                    }
                );

                /***/
            },

        /***/
        "./src/blocks/modules/servicos/services.js":
            /*!*************************************************!*\*/

            function () {
                $(document).ready(function () {
                    $(".services-bazar__list").slick({
                        lazyLoad: "ondemand",
                        dots: false,
                        arrows: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        centerMode: false,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                },
                            },
                        ],
                    });
                });

                /***/
            },

        /***/
        "./src/blocks/modules/sobre-nos/about-us.js":
            /*!**************************************************!*\*/
            function () {
                $(document).ready(function () {
                    $(".about-team__list").slick({
                        dots: false,
                        arrows: true,
                        infinite: false,
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                },
                            },
                        ],
                    });
                });
                $(document).ready(function () {
                    $("#yearSelect").change(function () {
                        var selectedYearNumber = $(this).val();
                        if (selectedYearNumber === "2023") {
                            $("#table2023").show();
                            $("#table2022").hide();
                        } else if (selectedYearNumber === "2022") {
                            $("#table2023").hide();
                            $("#table2022").show();
                        }
                    });
                });

                /***/
            },

        /***/
        "./src/js/import/components.js":
            /*!*************************************!*\*/

            function () {
                /***/
            },

        /***/
        "./src/js/import/modules.js":
            /*!**********************************!*\*/

            function (
                __unused_webpack_module,
                __webpack_exports__,
                __webpack_require__
            ) {
                "use strict";
                __webpack_require__.r(__webpack_exports__);
                /* harmony import */
                var _modules_header_header__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! %modules%/header/header */
                        "./src/blocks/modules/header/header.js"
                    );
                /* harmony import */
                var _modules_header_header__WEBPACK_IMPORTED_MODULE_0___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_header_header__WEBPACK_IMPORTED_MODULE_0__
                    );
                /* harmony import */
                var _modules_footer_footer__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! %modules%/footer/footer */
                        "./src/blocks/modules/footer/footer.js"
                    );
                /* harmony import */
                var _modules_footer_footer__WEBPACK_IMPORTED_MODULE_1___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_footer_footer__WEBPACK_IMPORTED_MODULE_1__
                    );
                /* harmony import */
                var _modules_home_main_home__WEBPACK_IMPORTED_MODULE_2__ =
                    __webpack_require__(
                        /*! %modules%/home/main-home */
                        "./src/blocks/modules/home/main-home.js"
                    );
                /* harmony import */
                var _modules_sobre_nos_about_us__WEBPACK_IMPORTED_MODULE_3__ =
                    __webpack_require__(
                        /*! %modules%/sobre-nos/about-us */
                        "./src/blocks/modules/sobre-nos/about-us.js"
                    );
                /* harmony import */
                var _modules_sobre_nos_about_us__WEBPACK_IMPORTED_MODULE_3___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_sobre_nos_about_us__WEBPACK_IMPORTED_MODULE_3__
                    );
                /* harmony import */
                var _modules_servicos_services__WEBPACK_IMPORTED_MODULE_4__ =
                    __webpack_require__(
                        /*! %modules%/servicos/services */
                        "./src/blocks/modules/servicos/services.js"
                    );
                /* harmony import */
                var _modules_servicos_services__WEBPACK_IMPORTED_MODULE_4___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_servicos_services__WEBPACK_IMPORTED_MODULE_4__
                    );
                /* harmony import */
                var _modules_estrutura_structure__WEBPACK_IMPORTED_MODULE_5__ =
                    __webpack_require__(
                        /*! %modules%/estrutura/structure */
                        "./src/blocks/modules/estrutura/structure.js"
                    );
                /* harmony import */
                var _modules_estrutura_structure__WEBPACK_IMPORTED_MODULE_5___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_estrutura_structure__WEBPACK_IMPORTED_MODULE_5__
                    );
                /* harmony import */
                var _modules_colaboradores_employees__WEBPACK_IMPORTED_MODULE_6__ =
                    __webpack_require__(
                        /*! %modules%/colaboradores/employees */
                        "./src/blocks/modules/colaboradores/employees.js"
                    );
                /* harmony import */
                var _modules_colaboradores_employees__WEBPACK_IMPORTED_MODULE_6___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_colaboradores_employees__WEBPACK_IMPORTED_MODULE_6__
                    );
                /* harmony import */
                var _modules_doacoes_doacoes__WEBPACK_IMPORTED_MODULE_7__ =
                    __webpack_require__(
                        /*! %modules%/doacoes/doacoes */
                        "./src/blocks/modules/doacoes/doacoes.js"
                    );
                /* harmony import */
                var _modules_doacoes_doacoes__WEBPACK_IMPORTED_MODULE_7___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_doacoes_doacoes__WEBPACK_IMPORTED_MODULE_7__
                    );
                /* harmony import */
                var _modules_fale_conosco_contact__WEBPACK_IMPORTED_MODULE_8__ =
                    __webpack_require__(
                        /*! %modules%/fale-conosco/contact */
                        "./src/blocks/modules/fale-conosco/contact.js"
                    );
                /* harmony import */
                var _modules_fale_conosco_contact__WEBPACK_IMPORTED_MODULE_8___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _modules_fale_conosco_contact__WEBPACK_IMPORTED_MODULE_8__
                    );

                /***/
            },

        /***/
        "./src/js/index.js":
            /*!*************************!*\
    !*** ./src/js/index.js ***!
    \*************************/
            /***/
            function (
                __unused_webpack_module,
                __webpack_exports__,
                __webpack_require__
            ) {
                "use strict";
                __webpack_require__.r(__webpack_exports__);
                /* harmony import */
                var _import_modules__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! ./import/modules */
                        "./src/js/import/modules.js"
                    );
                /* harmony import */
                var _import_components__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! ./import/components */
                        "./src/js/import/components.js"
                    );
                /* harmony import */
                var _import_components__WEBPACK_IMPORTED_MODULE_1___default =
                    /*#__PURE__*/
                    __webpack_require__.n(
                        _import_components__WEBPACK_IMPORTED_MODULE_1__
                    );

                /***/
            },

        /******/
    };
    /************************************************************************/
    /******/ // The module cache
    /******/
    var __webpack_module_cache__ = {};
    /******/
    /******/ // The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/ // Check if module is in cache
        /******/
        var cachedModule = __webpack_module_cache__[moduleId];
        /******/
        if (cachedModule !== undefined) {
            /******/
            return cachedModule.exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/
        var module = (__webpack_module_cache__[moduleId] = {
            /******/ // no module.id needed
            /******/ // no module.loaded needed
            /******/
            exports: {},
            /******/
        });
        /******/
        /******/ // Execute the module function
        /******/
        __webpack_modules__[moduleId].call(
            module.exports,
            module,
            module.exports,
            __webpack_require__
        );
        /******/
        /******/ // Return the exports of the module
        /******/
        return module.exports;
        /******/
    }
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = __webpack_modules__;
    /******/
    /************************************************************************/
    /******/
    /* webpack/runtime/chunk loaded */
    /******/
    !(function () {
        /******/
        var deferred = [];
        /******/
        __webpack_require__.O = function (result, chunkIds, fn, priority) {
            /******/
            if (chunkIds) {
                /******/
                priority = priority || 0;
                /******/
                for (
                    var i = deferred.length;
                    i > 0 && deferred[i - 1][2] > priority;
                    i--
                )
                    deferred[i] = deferred[i - 1];
                /******/
                deferred[i] = [chunkIds, fn, priority];
                /******/
                return;
                /******/
            }
            /******/
            var notFulfilled = Infinity;
            /******/
            for (var i = 0; i < deferred.length; i++) {
                /******/
                var chunkIds = deferred[i][0];
                /******/
                var fn = deferred[i][1];
                /******/
                var priority = deferred[i][2];
                /******/
                var fulfilled = true;
                /******/
                for (var j = 0; j < chunkIds.length; j++) {
                    /******/
                    if (
                        (priority & (1 === 0) || notFulfilled >= priority) &&
                        Object.keys(__webpack_require__.O).every(function (
                            key
                        ) {
                            return __webpack_require__.O[key](chunkIds[j]);
                        })
                    ) {
                        /******/
                        chunkIds.splice(j--, 1);
                        /******/
                    } else {
                        /******/
                        fulfilled = false;
                        /******/
                        if (priority < notFulfilled) notFulfilled = priority;
                        /******/
                    }
                    /******/
                }
                /******/
                if (fulfilled) {
                    /******/
                    deferred.splice(i--, 1);
                    /******/
                    var r = fn();
                    /******/
                    if (r !== undefined) result = r;
                    /******/
                }
                /******/
            }
            /******/
            return result;
            /******/
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/compat get default export */
    /******/
    !(function () {
        /******/ // getDefaultExport function for compatibility with non-harmony modules
        /******/
        __webpack_require__.n = function (module) {
            /******/
            var getter =
                module && module.__esModule
                    ? /******/
                      function () {
                          return module["default"];
                      }
                    : /******/
                      function () {
                          return module;
                      };
            /******/
            __webpack_require__.d(getter, {
                a: getter,
            });
            /******/
            return getter;
            /******/
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/define property getters */
    /******/
    !(function () {
        /******/ // define getter functions for harmony exports
        /******/
        __webpack_require__.d = function (exports, definition) {
            /******/
            for (var key in definition) {
                /******/
                if (
                    __webpack_require__.o(definition, key) &&
                    !__webpack_require__.o(exports, key)
                ) {
                    /******/
                    Object.defineProperty(exports, key, {
                        enumerable: true,
                        get: definition[key],
                    });
                    /******/
                }
                /******/
            }
            /******/
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/hasOwnProperty shorthand */
    /******/
    !(function () {
        /******/
        __webpack_require__.o = function (obj, prop) {
            return Object.prototype.hasOwnProperty.call(obj, prop);
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/make namespace object */
    /******/
    !(function () {
        /******/ // define __esModule on exports
        /******/
        __webpack_require__.r = function (exports) {
            /******/
            if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
                /******/
                Object.defineProperty(exports, Symbol.toStringTag, {
                    value: "Module",
                });
                /******/
            }
            /******/
            Object.defineProperty(exports, "__esModule", {
                value: true,
            });
            /******/
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/jsonp chunk loading */
    /******/
    !(function () {
        /******/ // no baseURI
        /******/
        /******/ // object to store loaded and loading chunks
        /******/ // undefined = chunk not loaded, null = chunk preloaded/prefetched
        /******/ // [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
        /******/
        var installedChunks = {
            /******/
            main: 0,
            /******/
        };
        /******/
        /******/ // no chunk on demand loading
        /******/
        /******/ // no prefetching
        /******/
        /******/ // no preloaded
        /******/
        /******/ // no HMR
        /******/
        /******/ // no HMR manifest
        /******/
        /******/
        __webpack_require__.O.j = function (chunkId) {
            return installedChunks[chunkId] === 0;
        };
        /******/
        /******/ // install a JSONP callback for chunk loading
        /******/
        var webpackJsonpCallback = function (parentChunkLoadingFunction, data) {
            /******/
            var chunkIds = data[0];
            /******/
            var moreModules = data[1];
            /******/
            var runtime = data[2];
            /******/ // add "moreModules" to the modules object,
            /******/ // then flag all "chunkIds" as loaded and fire callback
            /******/
            var moduleId,
                chunkId,
                i = 0;
            /******/
            if (
                chunkIds.some(function (id) {
                    return installedChunks[id] !== 0;
                })
            ) {
                /******/
                for (moduleId in moreModules) {
                    /******/
                    if (__webpack_require__.o(moreModules, moduleId)) {
                        /******/
                        __webpack_require__.m[moduleId] = moreModules[moduleId];
                        /******/
                    }
                    /******/
                }
                /******/
                if (runtime) var result = runtime(__webpack_require__);
                /******/
            }
            /******/
            if (parentChunkLoadingFunction) parentChunkLoadingFunction(data);
            /******/
            for (; i < chunkIds.length; i++) {
                /******/
                chunkId = chunkIds[i];
                /******/
                if (
                    __webpack_require__.o(installedChunks, chunkId) &&
                    installedChunks[chunkId]
                ) {
                    /******/
                    installedChunks[chunkId][0]();
                    /******/
                }
                /******/
                installedChunks[chunkId] = 0;
                /******/
            }
            /******/
            return __webpack_require__.O(result);
            /******/
        };
        /******/
        /******/
        var chunkLoadingGlobal = (self["webpackChunkgulp_pug_starter"] =
            self["webpackChunkgulp_pug_starter"] || []);
        /******/
        chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
        /******/
        chunkLoadingGlobal.push = webpackJsonpCallback.bind(
            null,
            chunkLoadingGlobal.push.bind(chunkLoadingGlobal)
        );
        /******/
    })();

    /******/ // startup
    /******/ // Load entry module and return exports
    /******/ // This entry module depends on other loaded chunks and execution need to be delayed

    var __webpack_exports__ = __webpack_require__.O(
        undefined,
        ["vendor"],
        function () {
            return __webpack_require__("./src/js/index.js");
        }
    );

    __webpack_exports__ = __webpack_require__.O(__webpack_exports__);
})();
//# sourceMappingURL=main.js.map
