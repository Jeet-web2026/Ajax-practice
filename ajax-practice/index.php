<?php require('./configuration/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajx-practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.min.css">
</head>

<body>
    <section id="ajax-form">
        <div class="container p-5 position-relative">
            <form id="ajax-upload-form" class="border border-secondary shadow p-5 rounded">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" id="c-name" name="c-name" class="form-control shadow-none border-secondary" required>
                </div>
                <div class="mb-3">
                    <label for="c-no" class="form-label fw-bold">Contact no.</label>
                    <input type="number" id="c-no" name="c-no" class="form-control shadow-none border-secondary" required>
                </div>
                <div class="mb-3">
                    <label for="c-mail" class="form-label fw-bold">Email address</label>
                    <input type="email" id="c-mail" name="c-mail" class="form-control shadow-none border-secondary">
                </div>
                <button type="submit" class="btn btn-outline-primary" id="sbmit-btn">Submit</button>
                <div class="text-light bg-danger shadow ps-2 py-2 position-absolute rounded z-1" style="top: 3%; right: -8%; width: 25%;" id="show-error"></div>
                <div class="text-light  bg-success shadow ps-2 py-2 position-absolute rounded z-1" style="top: 3%; right: -8%; width: 25%;" id="show-success"></div>
            </form>
            <table class="table">
            </table>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $('#show-error').hide();
        $('#show-success').hide();
        $(document).ready(function() {
            let table = new DataTable('.table');
            $(document).find('.dt-container').addClass('border-dark shadow p-5 mt-5 rounded');
            $('#ajax-upload-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "./operations/create.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response == 1) {
                            $('#show-success').show(function() {
                                $(this).html('<center>Data inserted successfully!</center>');
                            });
                            $('#show-error').hide();
                            $('#ajax-upload-form').trigger('reset');
                            setTimeout(function() {
                                $('#show-success').hide();
                            }, 4000);

                        } else {
                            $('#show-error').show(function() {
                                $(this).html('<center>Something went wrong!</center>');
                            });
                            $('#show-success').hide();
                            setTimeout(function() {
                                $('#show-error').hide();
                            }, 4000);
                        }
                    }

                });

            });
            $('#sbmit-btn').on('click', function() {
                $.ajax({
                    url: "./operations/read.php",
                    type: "POST",
                    success: function(response) {
                        $('.table').html(response);
                    }

                });
            });
        });
    </script>
</body>

</html>