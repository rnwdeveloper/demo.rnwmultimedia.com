 
<?php  

for($k=1;$k<=$n;$k++){ ?>
                                      <div id="new">
                                            <div class="cust-add-block">
                                              <div class="form-group">
                                               <label for="date">Year:*</label>
                                               <select required  name="seat_year[]" id="seat_year" class="form-control" value="<?php if(!empty($select_seat_assign->seat_year)) { echo $select_seat_assign->seat_year; } ?>">
                                                  <option>Select Seat Year</option>

                                                  <?php for($i=2000;$i<=3000;$i++){ ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">No of Seat:*</label>
                                                <input type="text" class="form-control"  name="seat_no[]" value="<?php if(!empty($select_seat_assign->seat_no)) { echo $select_seat_assign->seat_no; } ?>" placeholder="Enter Seat">
                                             </div>     
                                            </div>     

                                          </div> 
                                          

<?php  } ?>
