<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=yes">
    <!-- <link rel="stylesheet" href="./testing/testing.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <p>Check attendance - (Class) - <?php echo date("d/m/y") ?> </p>
        <form action="testing_fixed" method="post">
            <input type="date" name="bday" id="datePicker">
            <input type="button" value="date" id="datebtn">
            <p class="getDate"></p>
        </form>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div id="2022-06-13" class="carousel-item active">
                    <img src="images/Capture.png" class="d-block w-100" alt="...">
                </div>
                <div id="2022-06-21" class="carousel-item">
                    <img src="images/60e717031fc06.jpeg" class="d-block w-100" alt="...">
                </div>
                <div id="2022-06-23" class="carousel-item">
                    <img src="images/60e80905c2db4.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let now = new Date();

            let day = ("0" + now.getDate()).slice(-2);
            let month = ("0" + (now.getMonth() + 1)).slice(-2);

            let today = (day) + "-" + (month) + "-" + now.getFullYear();


            $('#datePicker').val(today);

            $('#datebtn').click(function() {

                testClicked();

            });
        });

        function testClicked() {
            $('.getDate').html($('#datePicker').val());
            $result = $('#datePicker').val();
            var dict = [{
                Key: 'attendance1',
                Value: '2022-06-13'
            }, {
                Key: 'attendance2',
                Value: '2022-06-21'
            }, {
                Key: 'attendance3',
                Value: '2022-06-23'
            }];
            
            for (var i = 0; i < dict.length; i++) 
                if (dict[i].Value == $result) {
                    $('.carousel-inner > .active').removeClass('active');
                    $('.carousel-inner > #' + dict[i].Value).addClass('active');
                    break;
                } 
        }
    </script>
</body>


</html>