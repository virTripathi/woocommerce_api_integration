<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Woocommerce Coupon Redeem System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="antialiased">
    @csrf
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @include('partials/payment_form')
    </div>


    @include('partials/redeem_coupon_modal')
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#redeem_coupon_btn').on('click', function() {
                var coupon_code = $('input[name="coupon_code"]').val();
                var csrf_token = $('input[name="_token"]').val();
                if (!coupon_code || coupon_code == '') {
                    alert("Please enter a valid coupon code");
                    return false;
                }
                $('#error_message').html('');
                $('#spinner').show();
                $('#spinner').css('display', 'grid');
                $.ajax({
                    url: "{{ route('payment.redeem_coupon') }}",
                    method: 'post',
                    data: {
                        'coupon_code': coupon_code,
                        '_token': csrf_token
                    },
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        balance = response.data.balance;
                        unmountDialog();
                        $('#showBalance').html(balance);
                        $('#spinner').hide();
                        $('#try_again_modal').show();
                        $('#trigger_modal').html('Submit');
                        $('#trigger_modal').removeAttr('data-dialog-target');
                        $('#trigger_modal').attr('onclick','saveUserData()');
                    },
                    complete: function() {
                        $('#spinner').hide();
                    },
                    error: function(err) {
                        $('#try_again_modal').hide();
                        $('#trigger_modal').html('Proceed');
                        $('#trigger_modal').attr('onclick','validate_phone()');
                        $('#spinner').hide();
                        $('#error_message').html(err.responseJSON.message);
                    }
                });
            });
        });

        function validate_phone() {
            $('#phonenumber_error_message').html('');
            $('#trigger_modal').removeAttr('data-dialog-target');
            var x = $("#phonenumber").val();
            var regex = /^\d{10}$/;
            if (!regex.test(x)) {
                $('#phonenumber_error_message').html('Please Enter A Valid Phone Number With 10 Digits');
                return false;
            }
            $('#trigger_modal').prop('data-dialog-target', 'dialog');
            mountDialog();
        }

        function mountDialog() {
            var dialog = $("[data-dialog-backdrop='dialog']");
            var backdrop = $("[data-dialog-backdrop-close='true']");

            dialog.removeClass("opacity-0 -translate-y-14");
            backdrop.removeClass("pointer-events-none opacity-0");
        }

        function unmountDialog() {
            var dialog = $("[data-dialog-backdrop='dialog']");
            var backdrop = $("[data-dialog-backdrop-close='true']");

            dialog.addClass("opacity-0 -translate-y-14");
            backdrop.addClass("pointer-events-none opacity-0");
        }

        function saveUserData() {
            var coupon_code = $('input[name="coupon_code"]').val();
            var phonenumber = $('input[name="phonenumber"]').val();
            var csrf_token = $('input[name="_token"]').val();
            if (!coupon_code || coupon_code == '') {
                alert("Please enter a valid coupon code");
                return false;
            }
            $('#main_success_message').html('');
            $('#main_error_message').html('');
            $('#spinner2').show();
            $('#spinner2').css('display', 'grid');
            $.ajax({
                url: "{{ route('payment.store_coupon_data') }}",
                method: 'post',
                data: {
                    'coupon_code': coupon_code,
                    'number':phonenumber,
                    '_token': csrf_token
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    balance = response.data.balance;
                    $('#showBalance').html(balance);
                    $('#main_success_message').html(response.message);
                    $('#spinner2').hide();
                    $('#try_again_modal').hide();
                    $('#trigger_modal').html('Thanks');
                    $('#trigger_modal').css('cursor-pointer','none');
                    setTimeout(() => {
                        location.reload();
                    });
                },
                complete: function() {
                    $('#spinner2').hide();
                },
                error: function(err) {
                    $('#try_again_modal').show();
                    $('#trigger_modal').html('Submit');
                    $('#spinner2').hide();
                    $('#main_error_message').html(err.responseJSON.message);
                }
            });
        }
    </script>
</body>

</html>
