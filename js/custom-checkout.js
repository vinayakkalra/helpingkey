var referral_id = sessionStorage.getItem('referral_id');
        if (referral_id == null) {
            referral_id = "";
        }
        
        //get parameters from url
        var getParams = function (url) {
            var params = {};
            var parser = document.createElement('a');
            parser.href = url;
            var query = parser.search.substring(1);
            var vars = query.split('&');
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split('=');
                params[pair[0]] = decodeURIComponent(pair[1]);
            }
            return params;
        };

        // Get parameters from the current URL
        var params = getParams(window.location.href);
        // console.log(params);
        var valueurl = params.value;
        $('.value').html(params.value);

        if (window.innerWidth >= 960) {

            // Copying value from input fields to another input fields
            function copyTextValue(bf) {
                var country = bf.checked ? document.getElementById("country").value : '';
                var firstName = bf.checked ? document.getElementById("first-name").value : '';
                var lastName = bf.checked ? document.getElementById("last-name").value : '';
                var company = bf.checked ? document.getElementById("company").value : '';
                var address = bf.checked ? document.getElementById("address").value : '';
                var appartment = bf.checked ? document.getElementById("appartment").value : '';
                var towncity = bf.checked ? document.getElementById("towncity").value : '';
                var state = bf.checked ? document.getElementById("state").value : '';
                var zipCode = bf.checked ? document.getElementById("zipCode").value : '';
                var email = bf.checked ? document.getElementById("email").value : '';
                var phone = bf.checked ? document.getElementById("phone").value : '';
                document.getElementById("country1").value = country;
                document.getElementById("first-name1").value = firstName;
                document.getElementById("last-name1").value = lastName;
                document.getElementById("company1").value = company;
                document.getElementById("address1").value = address;
                document.getElementById("appartment1").value = appartment;
                document.getElementById("towncity1").value = towncity;
                document.getElementById("state1").value = state;
                document.getElementById("zipCode1").value = zipCode;
            }

            // hide function for account password field  
            var x = document.getElementById("pass");
            function hide() {                
                if (x.style.visibility === "visible") {
                  x.style.visibility = "hidden";
                } else {
                  x.style.visibility = "visible";
                }
            }
            var result = "";
            result.value = parseInt(result.value)*parseInt(valueurl) + gift_wrap;
            $.ajax({
                type: "POST",
                url: "php/process.php",
                'async': false,
                dataType: "json",
                data: {
                    type: "default"
                },
                success: function (dataResult) {
                    if (dataResult.statusCode == 200) {
                        result = dataResult;
                        $(".applied").css('display', 'block');
                        $('#code').html(result.coupon_code);
                        $('.modaltotal').html(parseInt(result.value)*parseInt(valueurl));
                        $('#discount').html(result.discount);
                        return true;
                    }
                    else if (dataResult.statusCode == 201) {
                        result = dataResult;
                        $('.modaltotal').html(parseInt(result.value)*parseInt(valueurl));
                        $('#discount').html(result.discount);
                        $(".applied").css('display', 'none');
                    }
                }
            });
            // console.log(parseInt(result.value)*parseInt(valueurl));
            result.value = parseInt(result.value)*parseInt(valueurl);
            function validate() {
                // $("#err").attr("disabled","true");    
                if (document.getElementById('in').value != "") {
                    $.ajax({
                        type: "POST",
                        url: "php/process.php",
                        'async': false,
                        dataType: "json",
                        data: {
                            coupon_code: document.getElementById('in').value,
                            type: "coupon"
                        },
                        success: function (dataResult) {
                            if (dataResult.statusCode == 200) {
                                result = dataResult;
                                $(".applied").css('display', 'block');
                                $('#code').html(result.coupon_code);
                                $('.modaltotal').html(parseInt(result.value)*parseInt(valueurl));
                                $('#discount').html(result.discount);
                                alert (result.coupon_code + " has been Successfully Applied");
                                return true;
                            }
                            else if (dataResult.statusCode == 201) {
                                alert("Invalid coupon");
                                $(".applied").css('display', 'none');
                                $(".strike").css('display', 'none');
                                document.getElementById('price').innerHTML = "&#8377;1,997";
                                $("#price").css('color', '#fff');
                            }
                        }
                    });
                } else {
                    alert("Invalid coupon");
                    // result.value = 1997;
                    // result.discount = 0;
                    // document.getElementById('price').innerHTML = "&#8377;1,997";
                    // $("#price").css('color', '#000');
                }   


                $(".coupon-code-applied-cross").on("click", function (e) {
                    e.preventDefault();
                    document.getElementById('err').innerHTML = "Apply";
                    $(".applied").css('display', 'none');
                    $(".strike").css('display', 'none');
                    document.getElementById('price').innerHTML = "&#8377;1,997";
                    $("#price").css('color', '#fff');
                    $("#err").removeClass("disabled");
                    result.value = 2000;
                    result.discount = 0;
                });
            }
            
            // add Gift Wraping
            var gift_wrap ="";
            function wrap_price(){
                if ($('#Checkbox').is(':checked')) {
                    $('.giftPrice').html('50');
                    result.value = parseInt(result.value) + 50;
                    $('.modaltotal').html(result.value);
                }else{
                    $('.giftPrice').html('00');
                    result.value = parseInt(result.value) - 50;
                    $('.modaltotal').html(result.value);
                }
            }            

            // validation razorpay 
            $("#razorpaycheckout").on("click", function () {
                var error = "";
                function validateEmail() {
                    var email = $("#email").val();
                    var emailReg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
                    if (emailReg.test(email)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                if ($("#country").val() == 0) {
                    $("#country").css("cssText", "border-color: red !important;");
                    $("#country").css('border-width', '2px');
                    error = error + 'country';
                } else {
                    $("#country").css('border-color', 'black');
                    $("#country").css('border-width', '1px');
                }

                if ($("#first-name").val() == "") {
                    $("#first-name").css("cssText", "border-color: red !important;");
                    $("#first-name").css('border-width', '2px');
                    error = error + 'first-name';
                } else {
                    $("#first-name").css('border-color', 'black');
                    $("#first-name").css('border-width', '1px');
                }
                if ($("#last-name").val() == "") {
                    $("#last-name").css("cssText", "border-color: red !important;");
                    $("#last-name").css('border-width', '2px');
                    error = error + 'last-name';
                } else {
                    $("#last-name").css('border-color', 'black');
                    $("#last-name").css('border-width', '1px');
                }

                if ($("#address").val() == "") {
                    $("#address").css("cssText", "border-color: red !important;");
                    $("#address").css('border-width', '2px');
                    error = error + 'address';
                } else {
                    $("#address").css('border-color', 'black');
                    $("#address").css('border-width', '1px');
                }

                if ($("#appartment").val() == "") {
                    $("#appartment").css("cssText", "border-color: red !important;");
                    $("#appartment").css('border-width', '2px');
                    error = error + 'appartment';
                } else {
                    $("#appartment").css('border-color', 'black');
                    $("#appartment").css('border-width', '1px');
                }
                if ($("#towncity").val() == "") {
                    $("#towncity").css("cssText", "border-color: red !important;");
                    $("#towncity").css('border-width', '2px');
                    error = error + 'towncity';
                } else {
                    $("#towncity").css('border-color', 'black');
                    $("#towncity").css('border-width', '1px');
                }
                if ($("#state").val() == "") {
                    $("#state").css("cssText", "border-color: red !important;");
                    $("#state").css('border-width', '2px');
                    error = error + 'state';
                } else {
                    $("#state").css('border-color', 'black');
                    $("#state").css('border-width', '1px');
                }
                if ($("#zipCode").val() == "") {
                    $("#zipCode").css("cssText", "border-color: red !important;");
                    $("#zipCode").css('border-width', '2px');
                    error = error + 'zipCode';
                } else {
                    $("#zipCode").css('border-color', 'black');
                    $("#zipCode").css('border-width', '1px');
                }
                
                if (validateEmail()) {
                    $("#email").css('border-color', 'black');
                    $("#email").css('border-width', '1px');

                } else {
                    $("#email").css("cssText", "border-color: red !important;");
                    $("#email").css('border-width', '2px');
                    error = error + 'email';
                }
                if ($("#phone").val() == "") {
                    $("#phone").css("cssText", "border-color: red !important;");
                    $("#phone").css('border-width', '2px');
                    error = error + 'phone';
                } else {
                    $("#phone").css('border-color', 'black');
                    $("#phone").css('border-width', '1px');
                }
                if ($("#country1").val() == 0) {
                    $("#country1").css("cssText", "border-color: red !important;");
                    $("#country1").css('border-width', '2px');
                    error = error + 'country1';
                } else {
                    $("#country1").css('border-color', 'black');
                    $("#country1").css('border-width', '1px');
                }

                if ($("#first-name1").val() == "") {
                    $("#first-name1").css("cssText", "border-color: red !important;");
                    $("#first-name1").css('border-width', '2px');
                    error = error + 'first-name1';
                } else {
                    $("#first-name1").css('border-color', 'black');
                    $("#first-name1").css('border-width', '1px');
                }
                if ($("#last-name1").val() == "") {
                    $("#last-name1").css("cssText", "border-color: red !important;");
                    $("#last-name1").css('border-width', '2px');
                    error = error + 'last-name1';
                } else {
                    $("#last-name1").css('border-color', 'black');
                    $("#last-name1").css('border-width', '1px');
                }

                if ($("#address1").val() == "") {
                    $("#address1").css("cssText", "border-color: red !important;");
                    $("#address1").css('border-width', '2px');
                    error = error + 'address1';
                } else {
                    $("#address1").css('border-color', 'black');
                    $("#address1").css('border-width', '1px');
                }

                if ($("#appartment1").val() == "") {
                    $("#appartment1").css("cssText", "border-color: red !important;");
                    $("#appartment1").css('border-width', '2px');
                    error = error + 'appartment1';
                } else {
                    $("#appartment1").css('border-color', 'black');
                    $("#appartment1").css('border-width', '1px');
                }
                if ($("#towncity1").val() == "") {
                    $("#towncity1").css("cssText", "border-color: red !important;");
                    $("#towncity1").css('border-width', '2px');
                    error = error + 'towncity1';
                } else {
                    $("#towncity1").css('border-color', 'black');
                    $("#towncity1").css('border-width', '1px');
                }
                if ($("#state1").val() == "") {
                    $("#state1").css("cssText", "border-color: red !important;");
                    $("#state1").css('border-width', '2px');
                    error = error + 'state1';
                } else {
                    $("#state1").css('border-color', 'black');
                    $("#state1").css('border-width', '1px');
                }
                if ($("#zipCode1").val() == "") {
                    $("#zipCode1").css("cssText", "border-color: red !important;");
                    $("#zipCode1").css('border-width', '2px');
                    error = error + 'zipCode1';
                } else {
                    $("#zipCode1").css('border-color', 'black');
                    $("#zipCode1").css('border-width', '1px');
                }
                if (x.style.visibility === "visible") {
                    if ($("#confirm_password").val() == "") {
                        $("#confirm_password").css("cssText", "border-color: red !important;");
                        $("#confirm_password").css('border-width', '2px');
                        error = error + 'confirm password';
                    } else {
                        if ($("#confirm_password").val() != $("#password").val()) {
                            $("#confirm_password").css("cssText", "border-color: red !important;");
                            $("#confirm_password").css('border-width', '2px');
                            error = error + 'confirm password failure';
                            alert("Password and Confirm password fields do not match");
                        } else {
                            $("#confirm_password").css('border-color', '#BCE0FD');
                            $("#confirm_password").css('border-width', '1px');
                        }
                    }

                    if ($("#password").val() == "") {
                        $("#password").css("cssText", "border-color: red !important;");
                        $("#password").css('border-width', '2px');
                        error = error + 'confirm password';
                    } else {
                        $("#password").css('border-color', '#BCE0FD');
                        $("#password").css('border-width', '1px');
                    }
                }else{
                    error =="";
                }
                if (error == "") {
                    
                } else{
                    alert("There are errors in your form. Please check");
                }



                // if(error == ""){
                //     if ($('#chkterms').is(':checked')) {
                //     alert('you agreed conditions')
                //     } else{
                //     alert('please check terms & conditions');
                //     error = error +"chkterms";
                //     }	
                // }
                // console.log(dataResult);
                coupon_code = result.coupon_code;	
                // var coupon_code = "";                
                if (error == "") {
                    // ajax call
                    $.ajax({
                        type: 'POST',
                        url: 'php/checkout-form.php',
                        dataType: "json",
                        data: {
                            country: $("#country").val(),
                            fname: $("#first-name").val(),
                            lname: $("#last-name").val(),
                            company:$("#company").val(),
                            address: $("#address").val(),
                            appartment: $("#appartment").val(),
                            towncity: $("#towncity").val(),
                            state: $("#state").val(),
                            zipCode: $("#zipCode").val(),
                            email: $("#email").val(),
                            phone: $("#phone").val(),
                            password:$("#password").val(),
                            country1: $("#country1").val(),
                            fname1: $("#first-name1").val(),
                            lname1: $("#last-name1").val(),
                            company1:$("#company1").val(),
                            address1: $("#address1").val(),
                            appartment1: $("#appartment1").val(),
                            towncity1: $("#towncity1").val(),
                            state1: $("#state1").val(),
                            zipCode1: $("#zipCode1").val(),
                            special_note:$("#special-note").val(),
                            giftWrap:$("#giftWrap").val(),        
                            productName: "helping-Key",                    
                            amount: parseInt(result.value)*parseInt(valueurl),
                            'referral_id': referral_id,
                            discount: result.discount,
                            'coupon_code': coupon_code
                        },
                        success: function (data) {
                            if (data.status == 201) {
                                window.dataLayer = window.dataLayer || [];
                                window.dataLayer.push({ 'event': 'payment initiated' });
                                // alert("checked out");
                                var order_id = data.id;
                                var options = {
                                    "key": "rzp_test_Deii5btTqdfYUu", // rzp_live_LSedTe83FzVuTe, rzp_test_BAnreND3t2AMOK test key // Enter the Key ID generated from the Dashboard rzp_test_Deii5btTqdfYUu rzp_live_LSedTe83FzVuTe
                                    "amount": parseInt(parseInt(result.value)*parseInt(valueurl) * 100), // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.    
                                    "currency": "INR",
                                    "name": "helpingKey",
                                    "description": "Gift your Loved Ones the KEY to Safety",
                                    "image": "images/logo.png",
                                    //"order_id": "order_9A33XWu170gUtm",//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below    
                                    "handler": function (response) {
                                        // alert(response.razorpay_payment_id);
                                        var razorpay_payment_id = response.razorpay_payment_id;
                                        // console.log(response);
                                        $.ajax({
                                            type: 'POST',
                                            url: 'php/checkout-update-form.php',
                                            dataType: "json",
                                            data: {
                                                id: data.id,
                                                productName: "helping-Key",
                                                razorpay_payment_id: razorpay_payment_id,
                                                amount: parseInt(result.value)*parseInt(valueurl),
                                                email: $("#email").val()
                                            },
                                            success: function (data) {
                                                if (data.status == 'ok') {
                                                    //window.location = "thankyou.html";
                                                    alert("Your payment has been successful");
                                                    // $("#checkout-form").css('display','none');
                                                    // $("#order-success").css('display','block');
                                                    // $("#order-id").html('#'+ data.id);
                                                    // window.scrollTo(0,0);
                                                    sessionStorage.useremail = $("#email").val();
                                                    window.dataLayer = window.dataLayer || [];
                                                    window.dataLayer.push({ 'event': 'payment success' });

                                                    // window.location = "user-dashboard";
                                                } else {
                                                    console.log("error");
                                                }
                                            }
                                        });


                                    }, "prefill": {
                                        "name": $("#name").val(),
                                        "email": $("#email").val(),
                                        "contact": $("#phone").val()
                                    }, "notes": {
                                        "country": $("#country").val(),
                                        "address": $("#Address").val(),
                                        "state": $("#state").val(),
                                        "postcode": $("#postcode").val(),
                                        "productName": "helping-Key",

                                    }, "theme": {
                                        "color": "#dc3545"
                                    }
                                };

                                var rzp1 = new Razorpay(options);
                                rzp1.open();


                            }else if (data.status == 601) {
                                console.log(data.error);
                                // alert("problem with query");
                            
                            }else if (data.status == 701){
                                $(".order-success").css('display', 'block');
                                $(".checkout-form").css('display', 'none');
                            
                            }else{

                            }
                        }
                    });
                } else {
                    return true;
                }
            });

            $("#razorpay").on('show.bs.modal', function (e) {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ 'event': 'buy ticket' });
            })
        } else {

            //open mobile drawer
            $("#drawer").css('display', 'none');
            $("#open-drawer").on("click", function () {
                if ($("#drawer").css('display') == 'none') {
                    $("#drawer").css('display', 'block');
                } else {
                    $("#drawer").css('display', 'none');
                }
            });
            $("#cross").on("click", function () {
                $("#drawer").css('display', 'none');
            });

            // Copying value from input fields to another input fields
            function copyTextValue(bf) {
                var country = bf.checked ? document.getElementById("country-mobile").value : '';
                var firstName = bf.checked ? document.getElementById("first-name-mobile").value : '';
                var lastName = bf.checked ? document.getElementById("last-name-mobile").value : '';
                var company = bf.checked ? document.getElementById("company-mobile").value : '';
                var address = bf.checked ? document.getElementById("address-mobile").value : '';
                var appartment = bf.checked ? document.getElementById("appartment-mobile").value : '';
                var towncity = bf.checked ? document.getElementById("towncity-mobile").value : '';
                var state = bf.checked ? document.getElementById("state-mobile").value : '';
                var zipCode = bf.checked ? document.getElementById("zipCode-mobile").value : '';
                var email = bf.checked ? document.getElementById("email-mobile").value : '';
                var phone = bf.checked ? document.getElementById("phone-mobile").value : '';
                document.getElementById("country1-mobile").value = country;
                document.getElementById("first-name1-mobile").value = firstName;
                document.getElementById("last-name1-mobile").value = lastName;
                document.getElementById("company1-mobile").value = company;
                document.getElementById("address1-mobile").value = address;
                document.getElementById("appartment1-mobile").value = appartment;
                document.getElementById("towncity1-mobile").value = towncity;
                document.getElementById("state1-mobile").value = state;
                document.getElementById("zipCode1-mobile").value = zipCode;
            }

            // hide function for account password field  
            var x = document.getElementById("pass-mobile");
            function hide() {                
                if (x.style.visibility === "visible") {
                  x.style.visibility = "hidden";
                } else {
                  x.style.visibility = "visible";
                }
            }
            var result = "";
            result.value = result.value + gift_wrap;
            $.ajax({
                type: "POST",
                url: "php/process.php",
                'async': false,
                dataType: "json",
                data: {
                    type: "default"
                },
                success: function (dataResult) {
                    if (dataResult.statusCode == 200) {
                        result = dataResult;
                        $('#price-mobile').html('&#8377; ' + result.value);
                        $(".applied-mobile").css('display', 'block');
                        $('#code-mobile').html(result.coupon_code);
                        $('.modaltotal').html(result.value);
                        $('#discount-mobile').html(result.discount);
                        return true;
                    }
                    else if (dataResult.statusCode == 201) {
                        result = dataResult;
                        $('.modaltotal').html(result.value);
                        $('#discount-mobile').html(result.discount);
                        $(".applied-mobile").css('display', 'none');
                    }
                }
            });
            function validate() {
                // $("#err").attr("disabled","true");    
                if (document.getElementById('in-mobile').value != "") {
                    $.ajax({
                        type: "POST",
                        url: "php/process.php",
                        'async': false,
                        dataType: "json",
                        data: {
                            coupon_code: document.getElementById('in-mobile').value,
                            type: "coupon"
                        },
                        success: function (dataResult) {
                            if (dataResult.statusCode == 200) {
                                result = dataResult;
                                $(".applied").css('display', 'block');
                                $('#code-mobile').html(result.coupon_code);
                                $('.modaltotal').html(result.value);
                                $('#discount-mobile').html(result.discount);
                                alert (result.coupon_code + " has been Successfully Applied");
                                return true;
                            }
                            else if (dataResult.statusCode == 201) {
                                alert("Invalid coupon");
                                $(".applied").css('display', 'none');
                                $(".strike").css('display', 'none');
                                document.getElementById('price-mobile').innerHTML = "2000";
                                $("#price").css('color', '#fff');
                            }
                        }
                    });
                } else {
                    alert("Invalid coupon");
                    // result.value = 1997;
                    // result.discount = 0;
                    // document.getElementById('price').innerHTML = "&#8377;1,997";
                    // $("#price").css('color', '#000');
                }   


                $(".coupon-code-applied-cross-mobile").on("click", function (e) {
                    e.preventDefault();
                    document.getElementById('err-mobile').innerHTML = "Apply";
                    $(".applied").css('display', 'none');
                    $(".strike").css('display', 'none');
                    document.getElementById('price').innerHTML = "&#8377;1,997";
                    $("#price").css('color', '#fff');
                    $("#err-mobile").removeClass("disabled");
                    result.value = 2000;
                    result.discount = 0;
                });
            }
            
            // add Gift Wraping
            var gift_wrap ="";
            function wrap_price(){
                if ($('#Checkbox-mobile').is(':checked')) {
                    $('.giftPrice').html('50');
                    result.value = (parseInt(result.value) + 50);
                    $('.modaltotal').html(result.value);
                }else{
                    $('.giftPrice').html('00');
                    result.value = result.value - 50;
                    $('.modaltotal').html(result.value);
                }
            }
            // validation razorpay 
            $("#razorpaycheckout-mobile").on("click", function () {
                var error = "";
                function validateEmail() {
                    var email = $("#email-mobile").val();
                    var emailReg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
                    if (emailReg.test(email)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                if ($("#country-mobile").val() == 0) {
                    $("#country-mobile").css("cssText", "border-color: red !important;");
                    $("#country-mobile").css('border-width', '2px');
                    error = error + 'country';
                } else {
                    $("#country-mobile").css('border-color', 'black');
                    $("#country-mobile").css('border-width', '1px');
                }

                if ($("#first-name-mobile").val() == "") {
                    $("#first-name-mobile").css("cssText", "border-color: red !important;");
                    $("#first-name-mobile").css('border-width', '2px');
                    error = error + 'first-name';
                } else {
                    $("#first-name-mobile").css('border-color', 'black');
                    $("#first-name-mobile").css('border-width', '1px');
                }
                if ($("#last-name-mobile").val() == "") {
                    $("#last-name-mobile").css("cssText", "border-color: red !important;");
                    $("#last-name-mobile").css('border-width', '2px');
                    error = error + 'last-name';
                } else {
                    $("#last-name-mobile").css('border-color', 'black');
                    $("#last-name-mobile").css('border-width', '1px');
                }

                if ($("#address-mobile").val() == "") {
                    $("#address-mobile").css("cssText", "border-color: red !important;");
                    $("#address-mobile").css('border-width', '2px');
                    error = error + 'address';
                } else {
                    $("#address-mobile").css('border-color', 'black');
                    $("#address-mobile").css('border-width', '1px');
                }

                if ($("#appartment-mobile").val() == "") {
                    $("#appartment-mobile").css("cssText", "border-color: red !important;");
                    $("#appartment-mobile").css('border-width', '2px');
                    error = error + 'appartment';
                } else {
                    $("#appartment-mobile").css('border-color', 'black');
                    $("#appartment-mobile").css('border-width', '1px');
                }
                if ($("#towncity-mobile").val() == "") {
                    $("#towncity-mobile").css("cssText", "border-color: red !important;");
                    $("#towncity-mobile").css('border-width', '2px');
                    error = error + 'towncity';
                } else {
                    $("#towncity-mobile").css('border-color', 'black');
                    $("#towncity-mobile").css('border-width', '1px');
                }
                if ($("#state-mobile").val() == "") {
                    $("#state-mobile").css("cssText", "border-color: red !important;");
                    $("#state-mobile").css('border-width', '2px');
                    error = error + 'state';
                } else {
                    $("#state-mobile").css('border-color', 'black');
                    $("#state-mobile").css('border-width', '1px');
                }
                if ($("#zipCode-mobile").val() == "") {
                    $("#zipCode-mobile").css("cssText", "border-color: red !important;");
                    $("#zipCode-mobile").css('border-width', '2px');
                    error = error + 'zipCode';
                } else {
                    $("#zipCode-mobile").css('border-color', 'black');
                    $("#zipCode-mobile").css('border-width', '1px');
                }
                
                if (validateEmail()) {
                    $("#email-mobile").css('border-color', 'black');
                    $("#email-mobile").css('border-width', '1px');

                } else {
                    $("#email-mobile").css("cssText", "border-color: red !important;");
                    $("#email-mobile").css('border-width', '2px');
                    error = error + 'email';
                }
                if ($("#phone-mobile").val() == "") {
                    $("#phone-mobile").css("cssText", "border-color: red !important;");
                    $("#phone-mobile").css('border-width', '2px');
                    error = error + 'phone';
                } else {
                    $("#phone-mobile").css('border-color', 'black');
                    $("#phone-mobile").css('border-width', '1px');
                }
                if ($("#country1-mobile").val() == 0) {
                    $("#country1-mobile").css("cssText", "border-color: red !important;");
                    $("#country1-mobile").css('border-width', '2px');
                    error = error + 'country1';
                } else {
                    $("#country1-mobile").css('border-color', 'black');
                    $("#country1-mobile").css('border-width', '1px');
                }

                if ($("#first-name1-mobile").val() == "") {
                    $("#first-name1-mobile").css("cssText", "border-color: red !important;");
                    $("#first-name1-mobile").css('border-width', '2px');
                    error = error + 'first-name1';
                } else {
                    $("#first-name1-mobile").css('border-color', 'black');
                    $("#first-name1-mobile").css('border-width', '1px');
                }
                if ($("#last-name1-mobile").val() == "") {
                    $("#last-name1-mobile").css("cssText", "border-color: red !important;");
                    $("#last-name1-mobile").css('border-width', '2px');
                    error = error + 'last-name1';
                } else {
                    $("#last-name1-mobile").css('border-color', 'black');
                    $("#last-name1-mobile").css('border-width', '1px');
                }

                if ($("#address1-mobile").val() == "") {
                    $("#address1-mobile").css("cssText", "border-color: red !important;");
                    $("#address1-mobile").css('border-width', '2px');
                    error = error + 'address1';
                } else {
                    $("#address1-mobile").css('border-color', 'black');
                    $("#address1-mobile").css('border-width', '1px');
                }

                if ($("#appartment1-mobile").val() == "") {
                    $("#appartment1-mobile").css("cssText", "border-color: red !important;");
                    $("#appartment1-mobile").css('border-width', '2px');
                    error = error + 'appartment1';
                } else {
                    $("#appartment1-mobile").css('border-color', 'black');
                    $("#appartment1-mobile").css('border-width', '1px');
                }
                if ($("#towncity1-mobile").val() == "") {
                    $("#towncity1-mobile").css("cssText", "border-color: red !important;");
                    $("#towncity1-mobile").css('border-width', '2px');
                    error = error + 'towncity1';
                } else {
                    $("#towncity1-mobile").css('border-color', 'black');
                    $("#towncity1-mobile").css('border-width', '1px');
                }
                if ($("#state1-mobile").val() == "") {
                    $("#state1-mobile").css("cssText", "border-color: red !important;");
                    $("#state1-mobile").css('border-width', '2px');
                    error = error + 'state1';
                } else {
                    $("#state1-mobile").css('border-color', 'black');
                    $("#state1-mobile").css('border-width', '1px');
                }
                if ($("#zipCode1-mobile").val() == "") {
                    $("#zipCode1-mobile").css("cssText", "border-color: red !important;");
                    $("#zipCode1-mobile").css('border-width', '2px');
                    error = error + 'zipCode1';
                } else {
                    $("#zipCode1-mobile").css('border-color', 'black');
                    $("#zipCode1-mobile").css('border-width', '1px');
                }
                if (x.style.visibility === "visible") {
                    if ($("#confirm_password-mobile").val() == "") {
                        $("#confirm_password-mobile").css("cssText", "border-color: red !important;");
                        $("#confirm_password-mobile").css('border-width', '2px');
                        error = error + 'confirm password';
                    } else {
                        if ($("#confirm_password-mobile").val() != $("#password").val()) {
                            $("#confirm_password-mobile").css("cssText", "border-color: red !important;");
                            $("#confirm_password-mobile").css('border-width', '2px');
                            error = error + 'confirm password failure';
                            alert("Password and Confirm password fields do not match");
                        } else {
                            $("#confirm_password-mobile").css('border-color', '#BCE0FD');
                            $("#confirm_password-mobile").css('border-width', '1px');
                        }
                    }

                    if ($("#password-mobile").val() == "") {
                        $("#password-mobile").css("cssText", "border-color: red !important;");
                        $("#password-mobile").css('border-width', '2px');
                        error = error + 'confirm password';
                    } else {
                        $("#password-mobile").css('border-color', '#BCE0FD');
                        $("#password-mobile").css('border-width', '1px');
                    }
                }else{
                    error =="";
                }
                if (error == "") {
                    
                } else{
                    alert("There are errors in your form. Please check");
                }



                // if(error == ""){
                //     if ($('#chkterms').is(':checked')) {
                //     alert('you agreed conditions')
                //     } else{
                //     alert('please check terms & conditions');
                //     error = error +"chkterms";
                //     }	
                // }
                // console.log(dataResult);
                coupon_code = result.coupon_code;	
                // var coupon_code = "";                
                if (error == "") {
                    // ajax call
                    $.ajax({
                        type: 'POST',
                        url: 'php/checkout-form.php',
                        dataType: "json",
                        data: {
                            country: $("#country-mobile").val(),
                            fname: $("#first-name-mobile").val(),
                            lname: $("#last-name-mobile").val(),
                            company:$("#company-mobile").val(),
                            address: $("#address-mobile").val(),
                            appartment: $("#appartment-mobile").val(),
                            towncity: $("#towncity-mobile").val(),
                            state: $("#state-mobile").val(),
                            zipCode: $("#zipCode-mobile").val(),
                            email: $("#email-mobile").val(),
                            phone: $("#phone-mobile").val(),
                            password:$("#password-mobile").val(),
                            country1: $("#country1-mobile").val(),
                            fname1: $("#first-name1-mobile").val(),
                            lname1: $("#last-name1-mobile").val(),
                            company1:$("#company1-mobile").val(),
                            address1: $("#address1-mobile").val(),
                            appartment1: $("#appartment1-mobile").val(),
                            towncity1: $("#towncity1-mobile").val(),
                            state1: $("#state1-mobile").val(),
                            zipCode1: $("#zipCode1-mobile").val(),
                            special_note:$("#special-note-mobile").val(),
                            giftWrap:$("#giftWrap-mobile").val(),        
                            productName: "helping-Key",                    
                            amount: result.value,
                            'referral_id': referral_id,
                            discount: result.discount,
                            'coupon_code': coupon_code
                        },
                        success: function (data) {
                            if (data.status == 201) {
                                window.dataLayer = window.dataLayer || [];
                                window.dataLayer.push({ 'event': 'payment initiated' });
                                // alert("checked out");
                                var order_id = data.id;
                                var options = {
                                    "key": "rzp_test_Deii5btTqdfYUu", // rzp_live_LSedTe83FzVuTe, rzp_test_BAnreND3t2AMOK test key // Enter the Key ID generated from the Dashboard rzp_test_Deii5btTqdfYUu rzp_live_LSedTe83FzVuTe
                                    "amount": parseInt(result.value * 100), // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.    
                                    "currency": "INR",
                                    "name": "helpingKey",
                                    "description": "Gift your Loved Ones the KEY to Safety",
                                    "image": "images/logo.png",
                                    //"order_id": "order_9A33XWu170gUtm",//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below    
                                    "handler": function (response) {
                                        // alert(response.razorpay_payment_id);
                                        var razorpay_payment_id = response.razorpay_payment_id;
                                        // console.log(response);
                                        $.ajax({
                                            type: 'POST',
                                            url: 'php/checkout-update-form.php',
                                            dataType: "json",
                                            data: {
                                                id: data.id,
                                                productName: "helping-Key",
                                                razorpay_payment_id: razorpay_payment_id,
                                                amount: result.value,
                                                email: $("#email").val()
                                            },
                                            success: function (data) {
                                                if (data.status == 'ok') {
                                                    //window.location = "thankyou.html";
                                                    alert("Your payment has been successful");
                                                    // $("#checkout-form").css('display','none');
                                                    // $("#order-success").css('display','block');
                                                    // $("#order-id").html('#'+ data.id);
                                                    // window.scrollTo(0,0);
                                                    sessionStorage.useremail = $("#email").val();
                                                    window.dataLayer = window.dataLayer || [];
                                                    window.dataLayer.push({ 'event': 'payment success' });

                                                    // window.location = "user-dashboard";
                                                } else {
                                                    console.log("error");
                                                }
                                            }
                                        });


                                    }, "prefill": {
                                        "name": $("#name-mobile").val(),
                                        "email": $("#email-mobile").val(),
                                        "contact": $("#phone-mobile").val()
                                    }, "notes": {
                                        "country": $("#country-mobile").val(),
                                        "address": $("#Address-mobile").val(),
                                        "state": $("#state-mobile").val(),
                                        "postcode": $("#postcode-mobile").val(),
                                        "productName": "helping-Key",

                                    }, "theme": {
                                        "color": "#dc3545"
                                    }
                                };

                                var rzp1 = new Razorpay(options);
                                rzp1.open();


                            }else if (data.status == 601) {
                                console.log(data.error);
                                // alert("problem with query");
                            
                            }else if (data.status == 701){
                                $(".order-success").css('display', 'block');
                                $(".checkout-form").css('display', 'none');
                            
                            }else{

                            }
                        }
                    });
                } else {
                    return true;
                }
            });

            $("#razorpay").on('show.bs.modal', function (e) {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ 'event': 'buy ticket' });
            })
        }