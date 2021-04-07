<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFME Polibatam</title>
    <link rel="icon" href="images/TFME.jpg">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="fa/css/all.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar p-1">
        <a class="navbar-brand text-white" href="#">
            <img src="images/TFME.jpg" width="150" height="80" class="d-inline-block align-top" alt="">
        </a>
        <label class="text-white">Teaching Factory Manufacturing of Electronics</label>
    </nav>

    <div class="container d-flex flex-column">

        <h5 style="text-align: center;">Contact Us</h5>
        <div class="alert d-none alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation</strong> Thank you for your comment,we'll read your comment
        </div>

        <form name="tfme-contact">
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="fullname"
                    aria-describedby="emailHelp" placeholder="Enter name" required>
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>

            <div class="form-group mt-2">
                <label for="exampleInputEmail1">Comment</label>
                <textarea type="text" class="form-control" rows="5" name="comment" placeholder="Your comment..."
                    required></textarea>
            </div>

            <button type="submit" class="btn btn-warning mt-4 btn-kirim">Submit</button>

            <button class="btn btn-warning btn-loading mt-3 d-none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>
        </form>
    </div>


    <script>
        const scriptURL =
            'https://script.google.com/macros/s/AKfycbz-tslnidQPIEEojRHRFep4CP5cIw2VuCW0Wxrno8fadc7YO2rtElTbu1dcR9opbxRp/exec'
        const form = document.forms['tfme-contact']

        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.alert');

        form.addEventListener('submit', e => {
            // ketika tombol submit di-klik
            // tampilkan tombol loading
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');
                    // menampilkan alert
                    myAlert.classList.toggle('d-none');

                    // reset formulirnya
                    form.reset();

                    console.log('Success!', response)

                })
                .catch(error => console.error('Error!', error.message))
        })
    </script>
</body>

</html>