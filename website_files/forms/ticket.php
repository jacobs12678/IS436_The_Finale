<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMBC Lost & Found Ticket Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://umbc.edu/wp-content/uploads/2022/02/umbc-primary-logo-250x58.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.html">Home</a>
        <a class="nav-link" href="login.html">Login/Sign Up</a>
        <a class= "nav-link active" aria-current="page" href = "ticket.html">Submit Ticket</a>
        <a class="nav-link" href= "dashboard.html">Dashboard </a>
        <a class="nav-link" href= "search_bar.html">Search Item</a>
      </div>
    </div>
  </div>
</nav>

  <div class="row" style="margin-top: 10px; text-align: center;">
   <h2>Submit Lost Item Ticket Below!</h2>
    </div>

   <div class="container py-4">
    <form id="contactForm" action="ticket_submit.php" method="get">
  
        <div class="mb-3">
        <label class="form-label" for="iname">Item Name:</label>
        <input class="form-control" id="iname" type="text" placeholder="Example: Airpods Case" required/>
       </div>

        <div class="mb-3">
           <label class="form-label" for="location">Location Lost: </label>
           <input class="form-control" id="location" type="text" placeholder="Example: Commons" required>
       </div>

        <div class="mb-3">
           <label class="form-label" for="location">Item Type: </label>
           <input class="form-control" id="itype" type="text" placeholder="Example: Electronics" required>
       </div>

       <div class="mb-3">
        <label class="form-label" for="description">Description:</label>
        <textarea class="form-control" id="description" type="text" placeholder="Example: Star pattern on the case, some stars worn out and not visible. The case includes both airpods." style="height: 10rem;" required></textarea>
       </div>

       <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Add a picture below of the lost item if you have one (Optional): </label>
        <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>

       
       <div class="d-grid">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit Ticket!</button>
      </div>
  
    </form>
  
  </div>


</body>
</html>


