<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../Documents/GitHub/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body>
  <div class="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Make a donation</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="">
            <div class="form-group">
              <label>Owner name</label>
              <input type="text" class="form-control" placeholder="Owner name"> </div>
            <div class="form-group">
              <label>Owner surname</label>
              <input type="text" class="form-control" placeholder="Owner surname"> </div>
            <div class="form-group">
              <label>Credit Card number</label>
              <input type="number" class="form-control" placeholder="Credit card number"> </div>
          </form>
          <form class="">
            <div class="form-group">
              <label>Expiration date</label>
              <input type="date" class="form-control" placeholder="Expiration date"> </div>
            <div class="form-group d-flex">
              <label>CVV &nbsp; &nbsp;</label>
              <input type="number" class="form-control w-25" placeholder="CVV">
              <label class="d-flex">&nbsp; &nbsp; &nbsp; Amount of donation</label>
              <input type="number" class="form-control w-25 ml-auto d-flex" placeholder="00,00"> </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>