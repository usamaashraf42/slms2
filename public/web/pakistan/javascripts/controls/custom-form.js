(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        define([], factory);
    } else {
        root.swCustomForm = factory();
    }
}(typeof self !== 'undefined' ? self : this, function () {

    var swCustomForm = function (opts) {
        var $ = opts.jQuery;
        var _ = opts._;
        
        opts = _.extend({
            debug: false,
            pagePartId: '',
            siteId: '',
            username: '',
            submitBtnName: '',
            validationGroup: ''
        }, opts);


        var cf = _.extend(this, opts);

        cf.infowindow = null;

        // Change interpolation for Underscore.js templates from <%= ... %> to {%= ... %}
        // and evaluation from <% ... %> to {% ... %} so it plays nice w/ aspx pages
        _.templateSettings = {
            evaluate: /\{%(.+?)%\}/g, interpolate: /\{\%=(.+?)%\}/g
        };
        if (cf.debug === true) {
            console.log('Using jQuery ' + $.fn.jquery);
        }
        /* --------------------- 
        ---------------------- */

        cf.container = $('#customform_' + cf.pagePartId);

        cf.Utils = {};
        cf.init = function () {
            cf.container.find(".formmodule-default-present").on('click', function () {
                $(this).removeClass("formmodule-default-present");
                $(this).val("");
            });
            cf.container.find(".formmodule-default-present").on('focus', function () {
                $(this).removeClass("formmodule-default-present");
                $(this).val("");
            });
            var form_action = $("form").first().attr("action");
            if (form_action && form_action.indexOf("default.aspx") > -1 && window.location.pathname.lastIndexOf("/") > 0) {
                $("form").attr("action", "/" + $("form").attr("action"));
            }
            cf.times = cf.container.find(".formmodule-timepicker");
            if (cf.times.length > 0) {
                cf.times.timePicker({ show24Hours: false, step: 15 });
            }
            cf.dates = cf.container.find(".formmodule-datepicker");
            if (cf.dates.length > 0) {
                cf.dates.datepicker();
            }


            cf.checkForValidationErrorsAndClear = function (btn) {
                var errorsVisible = cf.container.find('.formmodule-errors div').is(":visible");
                if (errorsVisible) {
                    cf.submitting = false;
                    btn.removeAttr('disabled');
                }
            }

            cf.submitting = false;

            cf.paymentForm = cf.container.find(".billing-form");
            cf.requiredPayementFields = cf.paymentForm.find(".required")


            cf.validateSubmit = function () {
                if (!cf.checkForClientValidateFnAndRun() || (cf.submitting === true) || !cf.validateBilling()) {
                    return false;
                } else {
                    cf.submitting = true;
                    var btn = cf.container.find("input[id*='btnSubmit']");
                    btn.attr('disabled', 'disabled');
                    cf.checkForValidationErrorsAndClear(btn);
                    __doPostBack(cf.submitBtnName, "");
                    return true;
                }
            }

            cf.checkForClientValidateFnAndRun = function () {
                return (typeof Page_ClientValidate === 'undefined') || Page_ClientValidate(cf.validationGroup);
            }

            // price updaters
            cf.container.find(".formmodule-form input").change(function () {
                updatePrice();
            });
            cf.container.find(".formmodule-form select").change(function () {
                updatePrice();
            });
            cf.container.find('.formmodule-form input[data-affects-price="true"]').keyup(function () {
                updatePrice();
            });

            // allow unckecking radio button groups
            // http://stackoverflow.com/questions/19895073/radio-button-uncheck-on-second-click
            cf.container.find('input[type="radio"]').click(function () {
                var $radio = $(this);

                if ($radio.data('waschecked') == true) {
                    try { $radio.attr('checked', false); } catch (jQVersionError) { }
                    try { $radio.prop('checked', false); } catch (jQVersionError) { }
                    $radio.trigger('change');
                    $radio.data('waschecked', false);
                } else {
                    $radio.data('waschecked', true);
                }

                // remove data-waschecked from other radios
                $radio
                    .parents('.formmodule-radiobuttonlist')
                    .find('input[name="' + $radio.attr('name') + '"]')
                    .not($radio)
                    .data('waschecked', false);
            });


            cf.validateBilling = function () {
                if (cf.requiredPayementFields.length === 0) {
                    return true;
                }
                var isValid = true;
                cf.requiredPayementFields.each(function () {
                    // will need to deal with different element types
                    var errLabel = $(this).next();
                    errLabel.text("");
                    if ($(this).val() == "") {

                        // allow empty state outside US/CA
                        if ($(this).hasClass('js-custom-form-payment-state')) {
                            var country = $('.js-custom-form-payment-country').val();
                            if (country != "" &&
                                country != "0" &&
                                country != "US" &&
                                country != "CA") {
                                return isValid;
                            }
                        }

                        errLabel.text("Required.");
                        isValid = false;
                    }
                });

                return isValid;
            }

            var parsePriceFromValue = function (val) {
                var dIndex = val.indexOf("(+$") + 3;
                var dEndIndex = val.lastIndexOf(")");
                var p = val.substring(dIndex, dEndIndex);
                p = p.replace(/,/g, '');
                return p;
            }



            var updatePrice = function () {
                var costLabel = cf.container.find(".formmodule-payment .payment-cost");
                var costField = cf.container.find(".formmodule-payment input[name*='hfTransPrice']");
                var customForm = cf.container.find(".formmodule-form");
                var runningTotal = cf.runningTotal;
                var fields1 = customForm.find("[value*='$']");
                var fields2 = customForm.find("input[type='checkbox']");
                var fields3 = customForm.find('input[data-affects-price="true"]');
                var fieldCount = fields1.length + fields2.length;
                var ticker = 0;
                fields1.each(function () {
                    // need to determine element type and how to get the selected'ness of it
                    if ($(this).is("option")) {
                        if ($(this).is(":selected")) {
                            var v = $(this).val();
                            var p = parsePriceFromValue(v);
                            runningTotal += parseFloat(p);
                        }
                    }
                    else {
                        // only dropdowns have the 'data' attr right on the element,
                        // the others have it on their parent
                        // _child = $(this).children()[0];
                        if ($(this).is(":checked")) {
                            var v = $(this).val();
                            var p = parsePriceFromValue(v);
                            runningTotal += parseFloat(p);
                        }
                    }
                    ticker++;
                });
                fields2.each(function () {
                    var t = $(this);
                    if (t.is(":checked")) {
                        var id = t.attr("id");
                        var l = customForm.find("label[for='" + id + "']");
                        if (l && l.length > 0) {
                            if (l.html().indexOf("$") > 0) {
                                var v = l.html();
                                var p = parsePriceFromValue(v);
                                runningTotal += parseFloat(p);
                            }
                        }
                    }
                    ticker++;
                });

                fields3.each(function () {
                    var t = $(this);
                    var p = t.val();
                    p = (p == null || p == '')
                        ? '0'
                        : p;

                    var parsedNum = parseFloat(p);
                    if (isNaN(parsedNum)) {
                        parsedNum = 0;
                    }

                    runningTotal += parsedNum;
                });

                $.waitForIntAmount(
                    function () {
                        return ticker;
                    },
                    function () {
                        return fieldCount;
                    },
                    3000
                ).then(function () {
                    costField.val(runningTotal);
                    costLabel.text(util.format_currency(runningTotal));
                });
            }
            updatePrice();

        };

        $.waitForIntAmount = function (getCount, getFinalCount, thresh) {
            var d = $.Deferred(),
                start = +new Date(),
                threshold = thresh || 1000,
                _document = document,
                _setTimeout = setTimeout;

            function pollElement() {
                if (checkTime(d)) {
                    if (getCount() < getFinalCount()) {
                        _setTimeout(pollElement, 0);
                    } else {
                        d.resolve();
                    }
                }
            }

            function checkTime(d) {
                if (((+new Date()) - start) > threshold) {
                    d.reject();
                    return false;
                } else {
                    return true;
                }
            }

            pollElement();

            return d.promise();
        };
    }

    return swCustomForm;
}));