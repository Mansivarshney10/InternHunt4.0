
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
            <p class="text-center"><span class="font-weight-bold">NOTE: </span> <small>First Year students of colleges affiliated to IP University are not eligible to apply due to academic calender restrictions. </small></p>
            <center>
                <div class="error-notification"></div>
            </center>
            <tr>
                <th scope="row">Name</th>
                <td>
                    <input class='form-control' type="text" id="s-name" disabled=true value="<?php echo $_SESSION['fname']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input class='form-control' type="email" id="s-email" disabled=true value="<?php echo $_SESSION['email']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Contact No.</th>
                <td>
                    <input class='form-control' type="text" id="s-phone" disabled=true value="<?php echo $_SESSION['phone']; ?>" />
                </td>
            </tr>
            <?php if($_SESSION['college'] == "IITM" || $_SESSION['college'] == "IINTM"){ ?>
            <tr>
                <th>Section [M, E]</th>
                <td style="display:flex; flex-direction:column;">
                    <select class='form-control' id="s-section" disabled=true>
                        <option value="None" selected>None</option>
                        <option value="M1">M1</option>
                        <option value="M2">M2</option>
                        <option value="E1">E1</option>
                        <option value="E2">E2</option>
                    </select>
                    <small>
                        BCA and B.Com(H) students are requested to select M1 or M2 which will be considered as Morning Shift and similarly, E1 or E2 for Evening Shift
                    </small>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <th>Alternate Number</th>
                <td>
                    <input class='form-control' type="text" id="s-phone-2" disabled=true placeholder="Optional" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="d-flex justify-content-between">
                    <button class="btn btn-outline-danger" id="edit-btn">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button class="btn btn-outline-success" id="update-btn" onclick="updateDetails('<?php echo $_SESSION['s_id'] ?>')">Update <i class="fa fa-check-circle" aria-hidden="true"></i></button>
                </td>
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
        <button type="button" class="btn btn-primary" id="payment-btn" disabled=true>Proceed to Payment  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>
</div>