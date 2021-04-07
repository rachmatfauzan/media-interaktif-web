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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar ">
        <a class="navbar-brand text-white" href="#">
            <img src="images/TFME.jpg" width="150" height="80" class="d-inline-block align-top" alt="">
        </a>
        <label class="text-white">Teaching Factory Manufacturing of Electronics</label>
    </nav>

    <div class="container d-flex flex-column">

        <h5 style="text-align: center;">Contact Us</h5>

        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Comment</label>
                <textarea type="text" class="form-control" rows="5"
                    placeholder="Your comment..." required></textarea>
            </div>

            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>

</body>

</html>