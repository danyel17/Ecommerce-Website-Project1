<section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold" style="color: #333; font-size: 2.5rem;">Payment</h2>
            <hr style="width: 100px; border: 2px solid #007bff; margin: 20px auto;">
        </div>
        <div class="mx-auto container text-center" style="max-width: 600px;">
            <p><?php echo $_GET['order_status'];?></p>
            <p>Total Payment: ₱<?php echo $_SESSION['total'];?></p>
            <input class="btn btn-primary" type="submit" value="Pay Now"/>
             
           
        </div>
    </section>
    







