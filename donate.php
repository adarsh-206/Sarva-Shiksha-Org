<!DOCTYPE html>
<html>
<head>
    <title>Donation form</title>
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

.donateformtext{
    text-align : center;
}

.submit {
  font-weight: bold;
  margin-top: 1rem;
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
<h3 class="donateformtext">Donation Form</h3>
<form>
    <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="tel" name="phone" class="form-control" id="phone" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" class="form-control" id="amount" required>
        </div>
        <div class="form-group">
            <!-- <button class="btn btn-success" type="submit">Pay Now</button> -->
            <input class="submit" type="button" name="button" value="Pay Now" onclick="MakePayment()"><br><br>
        </div>
</form>
</div>
<script>
    function MakePayment() {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var amount = $("#amount").val();
        var options = {
    "key": "rzp_test_mmO3XVlatbJXhW", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Test Transaction",
    "image": "https://thumbs.dreamstime.com/b/money-transaction-vector-logo-icon-design-buying-cash-symbol-illustration-illustrations-152825421.jpg",
    // "order_id": "order_Ef80WJDPBmAeNt", //Pass the `id` obtained in the previous step
    // "account_id": "acc_Ef7ArAsdU5t0XL",
    "handler": function (response){
       jQuery.ajax({
           type: "POST",
           url:"payment.php",
           data:"pay_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name+"&phone="+phone+"&email="+email,
           success:function(result){
               window.location.href="success.php";
           } 
       })
    }
    };
   var rzp1 = new Razorpay(options);
    rzp1.open();
    }
</script>


</body>
</html>