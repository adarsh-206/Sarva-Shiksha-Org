
<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  line-height: 1.5;
  background: lightblue;
  display: flex;
  height: 100vh;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.wrapper {
  width: 90%;
  padding: 2rem;
  background: #fff;
  box-shadow: 0 0px 2.2px rgba(0, 0, 0, 0.028), 0 0px 5.3px rgba(0, 0, 0, 0.04),
    0 0px 10px rgba(0, 0, 0, 0.05), 0 0px 17.9px rgba(0, 0, 0, 0.06),
    0 0px 33.4px rgba(0, 0, 0, 0.072), 0 0px 80px rgba(0, 0, 0, 0.1);
}

.submit {
  font-weight: bold;
  margin-top: 2rem;
  padding: 1rem 1.5rem;
  border: none;
  background: rgba(173, 216, 230, 0.7);
  cursor: pointer;
  transition: background 0.15s;
}


.submit:hover {
  background: rgba(173, 216, 230, 1);
}

@media screen and (min-width: 576px) {
  .wrapper {
    width: 70%;
  }
}
@media screen and (min-width: 768px) {
  .wrapper {
    width: 55%;
  }
}
@media screen and (min-width: 992px) {
  .wrapper {
    width: 45%;
  }
}
@media screen and (min-width: 1200px) {
  .wrapper {
    width: 35%;
  }
}


</style>
<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div class="container wrapper">
<h2>Payment Successfully Done !!</h2>
<form class="form-inline" method="post" action="generate_pdf.php">
<button type="submit" id="pdf" name="generate_pdf" class="submit btn"><i class="fa fa-pdf"" aria-hidden="true"></i>
Generate Invoice</button>
</form>
</div>

</body>
</html>