<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btn1").click(function(){
          $(".price").parents('div').parents('li').parents('div.fight-table-list').hide();
          
          $('.price').each( function(  ){
  


  var s = parseInt($(this).text().trim());
  if(s>2500 && s<20000)
          $(this).parents('div').parents('li').parents('div.fight-table-list').show();
});
   
  });
  $("#btn2").click(function(){
    alert("HTML: " + $(".test").html());
  });
});
</script>
</head>
<body>
<div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/G8.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">GoAir</p>
                                                      <small>G8-291</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">09:35</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:25 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>11:00</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">2401</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">291</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="0">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                                                             
                                   
                                          
                                            <div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/G8.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">GoAir</p>
                                                      <small>G8-291</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">09:35</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:25 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>11:00</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">6001</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">291</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="1">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                                                             
                                   
                                          
                                            <div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/I5.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">Air</p>
                                                      <small>I5-1583</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">07:05</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:10 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>08:15</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">2383</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">1583</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="2">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                                                             
                                   
                                          
                                            <div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/I5.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">Air</p>
                                                      <small>I5-513</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">11:20</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:15 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>12:35</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">2383</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">513</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="3">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                                                             
                                   
                                          
                                            <div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/I5.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">Air</p>
                                                      <small>I5-1543</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">14:10</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:10 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>15:20</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">2383</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">1543</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="4">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                                                             
                                   
                                          
                                            <div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/I5.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">Air</p>
                                                      <small>I5-1519</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">19:25</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:10 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>20:35</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">2383</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">1519</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="5">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                                                             
                                   
                                          
                                            <div  class="bg-white fight-table-list">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               


                                                                                                     <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in/Images/airline_logos/G8.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName">GoAir</p>
                                                      <small>G8-291</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase">09:35</p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p>01:25 hrs</p>
                                                        Non Stop                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p>11:00</p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">2598</h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">291</span>
                                                     
                                                     </div> -->
                                                     <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="6">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>


 <input class="i-check" type="checkbox" id="price1000" onchange="changeprice1000()" />
<button id="btn1">Show Text</button>
<button id="btn2">Show HTML</button>

</body>
</html>
