
$(document).ready(function () {

    // Add special class to minimalize page elements when screen is less than 768px
    setBodySmall();

    toastr.options = {
        "closeButton": true,
         "debug": false,
         "newestOnTop": false,
         "progressBar": true,
         "positionClass": "toast-top-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "200",
         "hideDuration": "800",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
    };

    // Handle minimalize sidebar menu
    $('.hide-menu').on('click', function (event) {
        event.preventDefault();
        if ($(window).width() < 769) {
            $("body").toggleClass("show-sidebar");
        } else {
            $("body").toggleClass("hide-sidebar");
        }
    });

    // Initialize metsiMenu plugin to sidebar menu
    $('#side-menu').metisMenu();

    // Initialize animate panel function
    $('.animate-panel').animatePanel();

    // Function for collapse hpanel
    $('.showhide').on('click', function (event) {
        event.preventDefault();
        var hpanel = $(this).closest('div.hpanel');
        var icon = $(this).find('i:first');
        var body = hpanel.find('div.panel-body');
        var footer = hpanel.find('div.panel-footer');
        body.slideToggle(300);
        footer.slideToggle(200);

        // Toggle icon from up to down
        icon.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        hpanel.toggleClass('').toggleClass('panel-collapse');
        setTimeout(function () {
            hpanel.resize();
            hpanel.find('[id^=map-]').resize();
        }, 50);
    });

    // Function for close hpanel
    $('.closebox').on('click', function (event) {
        event.preventDefault();
        var hpanel = $(this).closest('div.hpanel');
        hpanel.remove();
        if ($('body').hasClass('fullscreen-panel-mode')) {
            $('body').removeClass('fullscreen-panel-mode');
        }
    });

    // Fullscreen for fullscreen hpanel
    $('.fullscreen').on('click', function () {
        var hpanel = $(this).closest('div.hpanel');
        var icon = $(this).find('i:first');
        $('body').toggleClass('fullscreen-panel-mode');
        icon.toggleClass('fa-expand').toggleClass('fa-compress');
        hpanel.toggleClass('fullscreen');
        setTimeout(function () {
            $(window).trigger('resize');
        }, 100);
    });

    // Open close right sidebar
    $('.right-sidebar-toggle').on('click', function () {
        $('#right-sidebar').toggleClass('sidebar-open');
    });

    // Function for small header
    $('.small-header-action').on('click', function (event) {
        event.preventDefault();
        var icon = $(this).find('i:first');
        var breadcrumb = $(this).parent().find('#hbreadcrumb');
        $(this).parent().parent().parent().toggleClass('small-header');
        breadcrumb.toggleClass('m-t-lg');
        icon.toggleClass('fa-arrow-up').toggleClass('fa-arrow-down');
    });

    // Set minimal height of #wrapper to fit the window
    setTimeout(function () {
        fixWrapperHeight();
    });

    // Sparkline bar chart data and options used under Profile image on left navigation panel
    $("#sparkline1").sparkline([5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 11, 4], {
        type: 'bar',
        barWidth: 7,
        height: '30px',
        barColor: '#62cb31',
        negBarColor: '#53ac2a'
    });

    // Initialize tooltips
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]"
    });

    // Initialize popover
    $("[data-toggle=popover]").popover();

    // Move modal to body
    // Fix Bootstrap backdrop issu with animation.css
    $('.modal').appendTo("body")

});

$(window).bind("load", function () {
    // Remove splash screen after load
    $('.splash').css('display', 'none')
});

$(window).bind("resize click", function () {

    // Add special class to minimalize page elements when screen is less than 768px
    setBodySmall();

    // Waint until metsiMenu, collapse and other effect finish and set wrapper height
    setTimeout(function () {
        fixWrapperHeight();
    }, 300);
});

function fixWrapperHeight() {

    // Get and set current height
    var headerH = 62;
    var navigationH = $("#navigation").height();
    var contentH = $(".content").height();

    // Set new height when contnet height is less then navigation
    if (contentH < navigationH) {
        $("#wrapper").css("min-height", navigationH + 'px');
    }

    // Set new height when contnet height is less then navigation and navigation is less then window
    if (contentH < navigationH && navigationH < $(window).height()) {
        $("#wrapper").css("min-height", $(window).height() - headerH + 'px');
    }

    // Set new height when contnet is higher then navigation but less then window
    if (contentH > navigationH && contentH < $(window).height()) {
        $("#wrapper").css("min-height", $(window).height() - headerH + 'px');
    }

}


function setBodySmall() {
    if ($(this).width() < 769) {
        $('body').addClass('page-small');
    } else {
        $('body').removeClass('page-small');
        $('body').removeClass('show-sidebar');
    }
}

// Animate panel function
$.fn['animatePanel'] = function () {

    var element = $(this);
    var effect = $(this).data('effect');
    var delay = $(this).data('delay');
    var child = $(this).data('child');

    // Set default values for attrs
    if (!effect) {
        effect = 'zoomIn'
    }
    if (!delay) {
        delay = 0.06
    } else {
        delay = delay / 10
    }
    if (!child) {
        child = '.row > div'
    } else {
        child = "." + child
    }

    //Set defaul values for start animation and delay
    var startAnimation = 0;
    var start = Math.abs(delay) + startAnimation;

    // Get all visible element and set opacity to 0
    var panel = element.find(child);
    panel.addClass('opacity-0');

    // Get all elements and add effect class
    panel = element.find(child);
    panel.addClass('stagger').addClass('animated-panel').addClass(effect);

    var panelsCount = panel.length + 10;
    var animateTime = (panelsCount * delay * 10000) / 10;

    // Add delay for each child elements
    panel.each(function (i, elm) {
        start += delay;
        var rounded = Math.round(start * 10) / 10;
        $(elm).css('animation-delay', rounded + 's');
        // Remove opacity 0 after finish
        $(elm).removeClass('opacity-0');
    });

    // Clear animation after finish
    setTimeout(function () {
        $('.stagger').css('animation', '');
        $('.stagger').removeClass(effect).removeClass('animated-panel').removeClass('stagger');
    }, animateTime)

};

function visualizar_Contatos_Email_Ramal_usuarios(BUSCA, INICIO, FIM, DIV) {
    var data = 'param1=' + BUSCA + '&param2=' + INICIO + '&param3=' + FIM
    $.ajax({
        url: "../../../../../../../INTRANET/INTRANET2/genericas/ContatoMenuSuperior3.php", data: data, cache: false, type: 'GET', async: true, success: function (html) {
            $('#' + DIV).html(html);
        }
    });
}
function visualizar_contato_especifico(CD_FUNC) {
    $('#Xmod_titulo').html('');
    $('#XModal').modal('show');
    var data2 = 'param1=' + CD_FUNC;
    $.ajax({
        url: "../../../../../../../../../../INTRANET/PARAMETROS/PHP/PAGINA/ProfileUnico4.php", data: data2, cache: false, type: 'GET',
        success: function (html) {
            $('#Xmod_corpo').html(html);
        }
    });
}
function mother_alert(title, text, type, CancelButon, CancelBtn, OkBtn, ActionYes, ActionYesDescribe, ActionNo, ActionNoDescribe, URL,funcao=false) {

    swal({
        title: title,
        text: text,
        type: type,
        showCancelButton: CancelButon,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: OkBtn,
        cancelButtonText: CancelBtn,
        closeOnConfirm: false,
        closeOnCancel: false,
        closeOnClickOutside: false
    },

        function (isConfirm) {
            if (isConfirm) {
                listaJS('', URL,'POST');
                swal(ActionYes, ActionYesDescribe, "success");
                setTimeout(function () {
                     if(funcao){
                         reccarega_dados();
                     }
                }, 1500);
            } else {
                swal(ActionNo, ActionNoDescribe, "error");
            }
        });
}




function mother_lister(DIV, FOLDER, PAGINA, METHOD, PARAM1, PARAM2, PARAM3, PARAM4, PARAM5) {

    $.ajax({
        url: FOLDER + "/" + PAGINA + ".php",
        type: METHOD,
        data: {
            'param1': PARAM1,
            'param2': PARAM2,
            'param3': PARAM3,
            'param4': PARAM4,
            'param5': PARAM5
        },
        dataType: 'html',
        beforeSend: function () {
            if (DIV == 'Xmod_corpo') {
                $('#XModal').modal('show');
            }
            $('#' + DIV).show();
            $('#' + DIV).html("<div class='dvLoading'>&nbsp;</div>");

        },
        success: function (retorno) {
            // Atribui o retorno HTML para a div correspondente
            $('#' + DIV).html(retorno);

        },
        error: function (erro, er) {
            // Se houver um erro durante o processamento, exibe a mensagem na div correspondente
            $('#' + DIV).html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</p>');

        }
    });
}

function mother_save(FOLDER, PAGINA, METHOD, PARAM1, PARAM2, PARAM3, PARAM4, PARAM5, EXIBE) {

    
    $.ajax({
        url: FOLDER + "/" + PAGINA + ".php",
        type: METHOD,
        data: {
            'param1': PARAM1,
            'param2': PARAM2,
            'param3': PARAM3,
            'param4': PARAM4,
            'param5': PARAM5
        },
        dataType: 'html',

        beforeSend: function () {

        },
        success: function (retorno) {
            // Atribui o retorno HTML para a div correspondente
            var res_mother = retorno.split('$55555$');
            if (res_mother[1] == 'OK') {
                if (EXIBE) {
                    alert('Dados Alterados');
                }

            } else {
                alert('Dados n�o Alterados ' + res_mother[1]);

            }


        },
        error: function (erro, er) {
            alert('Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er);



        }
    });
}

function listaJS(DIV, ROTA, METHOD, PARAM1, PARAM2, PARAM3, PARAM4, PARAM5, Functioncall = false) {
window.retorno = '';
var ResponseStatusOK = [200,201];
    $.ajax({
        url: ROTA,
        type: METHOD,
        data: {          
            '_token': $('meta[name="csrf-token"]').attr('content'),          
            'param1': PARAM1,
            'param2': PARAM2,
            'param3': PARAM3,
            'param4': PARAM4,
            'param5': PARAM5
        },
        dataType: 'html',
        beforeSend: function () {

            if (DIV == 'Xmod_corpo') {
                $('#XModal').modal('show');
            }
            $('#' + DIV).show();
            $('#' + DIV).html("<div class='dvLoading'>&nbsp;</div>");
            
        },
        success: function (retorno, textStatus, xhr) {
            window.retorno = retorno;

            if(ResponseStatusOK.indexOf(xhr.status) != -1){  
                $('#' + DIV).html(retorno);
              
            }

        }, complete: function (data) {

            if (Functioncall) {
                Completou();
            }

        },
        error: function (erro, er) {
            // Se houver um erro durante o processamento, exibe a mensagem na div correspondente
            $('#' + DIV).html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</p>');

        }
    });

}


function salvarJS(ROTA, METHOD, PARAM1, PARAM2, PARAM3, PARAM4, PARAM5) {

    // alert(PARAM2);
    $.ajax({
        url: ROTA,
        type: METHOD,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'param1': PARAM1,
            'param2': PARAM2,
            'param3': PARAM3,
            'param4': PARAM4,
            'param5': PARAM5
        },
        dataType: 'html',

        beforeSend: function () {

        },
        success: function (retorno) {
            aviso(retorno);


        },
        error: function (erro, er) {
            alert('Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er);



        }
    });
}

async function requisicao(ROTA, METHOD, PARAM1, PARAM2, PARAM3, PARAM4, PARAM5) {
       const result =  $.ajax({
                       url: ROTA,
                       type: METHOD,
                       data: {          
                            '_token': $('meta[name="csrf-token"]').attr('content'),          
                            'param1': PARAM1,
                            'param2': PARAM2,
                            'param3': PARAM3,
                            'param4': PARAM4,
                            'param5': PARAM5
                        },
                        dataType: 'html'
          });
          return result; 
}




