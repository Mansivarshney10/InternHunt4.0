
<!-- Modal -->
<div class="modal fade" style="font-family:Arial" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Verify Contact Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td scope="row"><?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></td>                
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $_SESSION['email']; ?></td>
            </tr>
            <tr>
                <th>Contact No.</th>
                <td><?php echo $_SESSION['phone']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td class="d-flex justify-content-between"><button class="btn btn-outline-danger">Edit Details</button><button class="btn btn-outline-success">Update Details</button></td>
            </tr>
        </tbody>
        </thead>
      </table>
      <input type="checkbox" name="covid-desclaimer" id="covid-desclaimer" onclick="processPaymentButton(this)"> 
      <label for="covid-desclaimer" style="font-size:11px;font-weight:bold;display:inline">Please read the desclaimer given below & tick this to proceed further. </label> </br>
      <label for="covid-desclaimer" style="font-size:13px; font-weight: bold; display:inline;">I am well aware of the present conditions of Covid-19. I do understand that Institute will follow all safety guidelines and precautions to keep my safety.
However, incase any contact with Corona virus during this period, I will not hold the Institute responsible for the same. </label>
      <br><br>
      
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" id="payment-btn" disabled=true>Proceed to Payment</button>
      </div>
    </div>
  </div>
</div>