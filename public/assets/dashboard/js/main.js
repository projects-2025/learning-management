(function ($) {
    "use strict";

    var menuleft = function () {
        if ($("div").hasClass("section-menu-right")) {
            var bt = $(".section-menu-right").find(".has-children");
            bt.on("click", function () {
                var args = { duration: 200 };
                if ($(this).hasClass("active")) {
                    $(this).children(".sub-menu").slideUp(args);
                    $(this).removeClass("active");
                } else {
                    $(".sub-menu").slideUp(args);
                    $(this).children(".sub-menu").slideDown(args);
                    $(".menu-item.has-children").removeClass("active");
                    $(this).addClass("active");
                }
            });
            $(".sub-menu-item").on("click", function (event) {
                event.stopPropagation();
            });
        }
    };

    var tabs = function () {
        $(".widget-tabs").each(function () {
            var $this = $(this);
            $this.find(".widget-content-tab").children().hide();
            $this.find(".widget-content-tab").children(".active").show();
            $this
                .find(".widget-menu-tab")
                .find("li")
                .on("click", function () {
                    var liActive = $(this).index();
                    var contentActive = $this
                        .find(".widget-content-tab")
                        .children()
                        .eq(liActive);
                    contentActive.addClass("active").fadeIn("slow");
                    contentActive.siblings().removeClass("active").hide();
                    $(this).addClass("active").siblings().removeClass("active");
                });
        });
    };

    var dropdownMenu = function () {
        $("ul.dropdown-menu.has-content").on("click", function (event) {
            event.stopPropagation();
        });
    };

    var closeDropdown = function () {
        $(".button-close-dropdown").on("click", function () {
            var $dropdown = $(this).closest(".dropdown");
            $dropdown.find(".dropdown-toggle").removeClass("show");
            $dropdown.find(".dropdown-menu").removeClass("show");
        });
    };

    var progresslevel = function () {
        if ($("div").hasClass("progress-level-bar")) {
            var bars = document.querySelectorAll(".progress-level-bar > span");
            setInterval(function () {
                bars.forEach(function (bar) {
                    var t1 = parseFloat(bar.dataset.progress);
                    var t2 = parseFloat(bar.dataset.max);
                    var getWidth = (t1 / t2) * 100;
                    bar.style.width = getWidth + "%";
                });
            }, 500);
        }
    };

    var collapseMenu = function () {
        $(".button-show-hide").on("click", function () {
            $(".layout-wrap").toggleClass("full-width");
        });
    };

    var fullcheckbox = function () {
        $(".total-checkbox").on("click", function () {
            var $wrap = $(this).closest(".wrap-checkbox");
            $wrap.find(".checkbox-item").prop("checked", this.checked);
        });
    };

    var showPass = function () {
        $(".show-pass").on("click", function () {
            $(this).toggleClass("active");
            var input = $(this).parents(".password").find(".password-input");
            input.attr(
                "type",
                input.attr("type") === "password" ? "text" : "password"
            );
        });
    };

    var preloader = function () {
        $("#preload").fadeOut("slow", function () {
            $(this).remove();
        });
    };

    var toggleFullscreen = function ($elem) {
        $elem = $elem || $(document.documentElement);

        if (
            !document.fullscreenElement &&
            !document.mozFullScreenElement &&
            !document.webkitFullscreenElement &&
            !document.msFullscreenElement
        ) {
            if ($elem[0].requestFullscreen) {
                $elem[0].requestFullscreen();
            } else if ($elem[0].msRequestFullscreen) {
                $elem[0].msRequestFullscreen();
            } else if ($elem[0].mozRequestFullScreen) {
                $elem[0].mozRequestFullScreen();
            } else if ($elem[0].webkitRequestFullscreen) {
                $elem[0].webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    };

    var fullscreenButton = function () {
        $(".button-zoom-maximize").on("click", function () {
            toggleFullscreen();
        });
    };

    // var initDatatable = function () {
    //     var datatable = new DataTable(".data-table", {
    //         language: {
    //             url: "https://cdn.datatables.net/plug-ins/2.1.4/i18n/ar.json",
    //         },
    //     });
    // };

    var fileUpload = function () {
        $(".uploadfile").on("click", function () {
            $(this).find('input[type="file"]').click();
        });

        $(".uploadfile").on("change", 'input[type="file"]', function (event) {
            handleFiles(
                event.target.files,
                $(this).closest(".item.up-load").find(".preview-imgs")
            );
        });

        $(".item.up-load").on("dragover", function (event) {
            event.preventDefault();
            $(this).addClass("drag-over");
        });

        $(".item.up-load").on("dragleave", function (event) {
            event.preventDefault();
            $(this).removeClass("drag-over");
        });

        $(".item.up-load").on("drop", function (event) {
            event.preventDefault();
            $(this).removeClass("drag-over");

            var files = event.originalEvent.dataTransfer.files;
            handleFiles(files, $(this).find(".preview-imgs"));
        });

        function handleFiles(files, previewContainer) {
            previewContainer.empty();
            Array.from(files).forEach(function (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var imgContainer = $("<div>").addClass("img-container");
                    var img = $("<img>").attr("src", e.target.result);
                    var removeBtn = $("<span>").addClass("remove-btn").html(`
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
    <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
</svg>
                  `);

                    removeBtn.on("click", function () {
                        imgContainer.remove();
                    });

                    imgContainer.append(img).append(removeBtn);
                    previewContainer.append(imgContainer);
                };
                reader.readAsDataURL(file);
            });
        }
    };

    var selectSearch = function () {
        $(".select-search").selectpicker();
    };

    var checkall = function () {
        $("#all").on("change", function () {
            var isChecked = $(this).is(":checked");
            $('.wtree input[type="checkbox"]').prop("checked", isChecked);
        });

        $('.wtree input[type="checkbox"]')
            .not("#all")
            .on("change", function () {
                var isChecked = $(this).is(":checked");
                $(this)
                    .closest("li")
                    .find('ul input[type="checkbox"]')
                    .prop("checked", isChecked);

                var allChecked =
                    $('.wtree input[type="checkbox"]').not("#all").length ===
                    $('.wtree input[type="checkbox"]')
                        .not("#all")
                        .filter(":checked").length;
                $("#all").prop("checked", allChecked);

                $(this)
                    .parents("ul")
                    .each(function () {
                        var allSiblingsChecked =
                            $(this).find('input[type="checkbox"]').not(this)
                                .length ===
                            $(this)
                                .find('input[type="checkbox"]:checked')
                                .not(this).length;
                        $(this)
                            .prev("div")
                            .find('input[type="checkbox"]')
                            .prop("checked", allSiblingsChecked);
                    });
            });
    };

    var ckeditor = function () {
        $("textarea.ckeditor").each(function () {
            ClassicEditor.create(this, {
                language: "ar",
            }).catch((error) => {
                console.error(error);
            });
        });
    };

    $(document).ready(function () {
      function convertToArabicNumbers(number) {
        return number.replace(/\d/g, function (digit) {
          return '٠١٢٣٤٥٦٧٨٩'.charAt(digit);
        });
      }

      $('.arabic-num').each(function () {
        var englishNumber = $(this).text();
        var arabicNumber = convertToArabicNumbers(englishNumber);
        $(this).text(arabicNumber);
      });
    });

    // Dom Ready
    $(function () {
        menuleft();
        tabs();
        dropdownMenu();
        closeDropdown();
        progresslevel();
        collapseMenu();
        fullcheckbox();
        showPass();
        preloader();
        fullscreenButton();
        // initDatatable();
        fileUpload();
        selectSearch();
        checkall();
        ckeditor();
    });
})(jQuery);
